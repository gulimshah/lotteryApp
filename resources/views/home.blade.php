@extends('layouts.master')

@section('contents')
    @include('partials.header_admin')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header alert alert-success">{{ __('Lottery Status') }}</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Lot No</th>
                                    <th scope="col">Lootery Ticket No</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Buyer Email</th>
                                    <th scope="col">Buy At</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lotteries as $lottery)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $lottery->ticket_lot_number }}</td>
                                        <td>{{ $lottery->ticket_no }}</td>
                                        <td>{{ $lottery->buyer_name }}</td>
                                        <td>{{ $lottery->buyer_email }}</td>
                                        <td>@if ($lottery->is_booked){{ $lottery->booked_at }}@else{{ 'Not Booked Yet' }}@endif</td>
                                        <td>{{ $lottery->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th scope="row" colspan="6">No Records!</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
