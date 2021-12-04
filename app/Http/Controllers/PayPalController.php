<?php

namespace App\Http\Controllers;

use App\Models\LotteryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return redirect()
                ->route('landingPage')
                ->with('success', 'Your Transaction for purchasing Lottery Ticket No '.session('ticket_no').' is completed successfully.');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request, LotteryModel $lottery)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        session(['ticket_no' => $lottery->ticket_no]);
        session(['lottery_id' => $lottery->id]);
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $lottery->ticket_price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // payer Info
            $payer_name = $response['payer']['name']['given_name'].' '.$response['payer']['name']['surname'];
            $payer_id = $response['payer']['payer_id'];
            $payer_email = $response['payer']['email_address'];
            // transaction Info
            $transaction_id = $response['id'];
            $transaction_link = $response['links'][0]['href'];
            //update the lottery info in database
            $id = session('lottery_id');
            $lottery = LotteryModel::where('id',$id)->update([
                'buyer_name'=>$payer_name,
                'buyer_email' =>$payer_email,
                'is_booked' =>true,
                'is_deleted' =>true,
                'booked_at'=>now(),
            ]);
            // Send Email to Payer
            $details = [
                'title' => 'Order Confirmation',
                'body' => 'Hi '.$payer_name.',\r\n Your order is successfully completed against TRX ID: '.$transaction_id
            ];
           
            \Mail::to($payer_email)->send(new \App\Mail\SendConfirmationMail($details));

            // Send Email to Admin
            $details = [
                'title' => 'Order Confirmation',
                'body' => 'Hi Admin, \r\n and order from '.$payer_name.' is successfully completed against TRX ID: '.$transaction_id
            ];
           
            \Mail::to('testlottery@yandex.com')->send(new \App\Mail\SendConfirmationMail($details));
            return redirect()
                ->route('createTransaction')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('landingPage')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}