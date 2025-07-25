@extends('layouts.layout')
@section('title', 'Package Profit Distributions')
@section('container')

<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white p-3">
            <h5 class="m-0">Monthly Package Profit Distributions</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover m-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Package</th>
                            <th class="text-center">Purchase Amt</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Profit</th>
                            <th class="text-center">Months Left</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($distributions as $dist)
                        <tr>
                            <td class="text-center">{{ $dist->distribution_date->format('M Y') }}</td>
                            <td class="text-center">{{ $dist->user->name }}</td>
                            <td class="text-center">{{ $dist->packagePurchase->package_name }}</td>
                            <td class="text-center">₹{{ number_format($dist->purchase_amount, 2) }}</td>
                            <td class="text-center">{{ $dist->rate_percentage }}%</td>
                            <td class="text-center">₹{{ number_format($dist->distributed_amount, 2) }}</td>
                            <td class="text-center">
                                @if(is_null($dist->months_remaining))
                                    Lifetime
                                @else
                                    {{ $dist->months_remaining }}
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No distributions found for this month.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-2">
            {{ $distributions->links() }}
        </div>
    </div>
</div>

@endsection
