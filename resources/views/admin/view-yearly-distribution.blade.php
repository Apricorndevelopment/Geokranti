@extends('layouts.layout')
@section('title', 'Yearly Profit Distribution')
@section('container')

<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white p-3">
            <h5 class="m-0">Yearly Profit Distribution</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover m-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center p-3">Year</th>
                            <th class="text-center p-3">Profit</th>
                            <th class="text-center p-3">Expenses</th>
                            <th class="text-center p-3">Net Profit</th>
                            <th class="text-center p-3">Distribution Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($distributions as $dist)
                        <tr>
                            <td class="text-center">{{ $dist->year }}</td>
                            <td class="text-center">₹{{ number_format($dist->profit, 2) }}</td>
                            <td class="text-center">₹{{ number_format($dist->expenditure, 2) }}</td>
                            <td class="text-center">₹{{ number_format($dist->final_profit, 2) }}</td>
                            <td class="text-center">{{ $dist->created_at }} </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center p-3">No profit distributions found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table {
        font-size: 14px;
    }
    .table th {
        padding: 8px;
    }
    .table td {
        padding: 8px;
        vertical-align: middle;
    }
</style>

@endsection