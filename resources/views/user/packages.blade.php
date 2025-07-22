@extends('userlayouts.layouts')
@section('title', 'Dashboard')
@section('container')

<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">My Packages</h4>
        </div>
        <div class="card-body">
            @if($packages->isEmpty())
                <div class="alert alert-info">You don't have any packages yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>Package Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Rate</th>
                                <th>Time</th>
                                <th>Capital</th>
                                <th>Profit Share</th>
                                <th>Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1
                            ?>
                            @foreach($packages as $transaction)
                            <tr>
                                <td>{{ $index }} </td>
                                <td>{{ $transaction->package_name }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>₹{{ number_format($transaction->final_price, 2) }}</td>
                                <td>{{ $transaction->rate }}%</td>
                                <td>{{ $transaction->time ?? '0' }} years</td>
                                <td>{{ $transaction->capital ?? '0' }}%</td>
                                <td>{{ $transaction->profit_share == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $transaction->purchased_at }}</td>
                            </tr>
                            <?php
                            $index++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection