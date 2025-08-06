@extends('layouts.layout')
@section('title', 'View Stock')
@section('container')
    <div class="container">
        <div class="row py-3">
            <div class="col-md-12 shadow-sm">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Stock Inventory</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
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
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td class="text-nowrap">{{ $stock->user_ulid }}</td>
                                            <td>{{ $stock->user->name }}</td>
                                            <td>{{ $stock->location }}</td>
                                            <td class="text-nowrap">{{ $stock->user->phone }}</td>
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
        </div>
    </div>

    <style>
        /* Simple responsive adjustments */
        @media (max-width: 768px) {
            .card-header h3 {
                font-size: 1.25rem;
            }
            .table {
                font-size: 0.85rem;
            }
             .table th, .table td {
                font-size: 0.75rem;
                padding: 0.6rem; 
            }
        }
    </style>
@endsection