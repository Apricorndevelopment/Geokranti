@extends('userlayouts.layouts')
@section('title', 'View Stock')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Stock Inventory</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User Ulid</th>
                            <th>User Name</th>
                            <th>Location</th>
                            <th>Phone Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                            <tr> 
                                <td>{{ $stock->user_ulid }} </td>
                                <td>{{ $stock->user->name }} </td>
                                <td>{{ $stock->location }}</td>
                                <td>{{ $stock->user->phone }}</td>
                                <td>{{ $stock->product->product_name }}</td>
                                <td>{{ $stock->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection