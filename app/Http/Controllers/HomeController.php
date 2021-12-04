<?php

namespace App\Http\Controllers;

use App\Models\LotteryModel;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
                                // LotteryModel::where('ticket_lot_number',101)->where('ticket_no',10)->update(
                                //     [
                                //         'buyer_name'=>'test buyer 10',
                                //         'buyer_email' =>'test10@gmail.com',
                                //         'is_booked' =>true,
                                //         'is_deleted' =>true,
                                //         'booked_at'=>now(),
                                //     ]);
            // dd('ok');
        $lotNumber = LotteryModel::latest()->first()->ticket_lot_number;
        if(!$lotNumber)
        {
            $lotNumber = 100;
        }else{
            $lotNumber++;
        }
        $this->createNewLotteryLot($lotNumber);
        $lotteries = LotteryModel::orderByDesc('id')->limit(10)->get();
        return view('home',compact('lotteries'));
    }

    private function createNewLotteryLot($latsLott)
    {
        $previousLott = LotteryModel::where('ticket_lot_number',$latsLott)->where('is_deleted',false)->count();
        if($previousLott == 0)
        {
            $newLottNumber = $latsLott +1;
            for($i=1; $i<=10; $i++)
            {
                LotteryModel::create(
                    [
                        'ticket_no' =>$i,
                        'ticket_price' =>'100',
                        'ticket_lot_number' =>$newLottNumber,
                        'created_at'=>now(),
                    ]);
            }

            return true;
        }else{
            return false;
        }
    }
}
