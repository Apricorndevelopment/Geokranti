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
                            <td class="text-center">{{ $dist->distribution_date }}</td>
                            <td class="text-center">{{ $dist->user->name }}({{ $dist->user_ulid}})</td>
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
    @if ($distributions->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center m-0">
                {{-- Previous Page Link --}}
                @if ($distributions->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-light border-light text-muted">
                            <i class="fa fa-angle-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link bg-light border-light text-primary" href="{{ $distributions->previousPageUrl() }}" rel="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($distributions->getUrlRange(1, $distributions->lastPage()) as $page => $url)
                    @if ($page == $distributions->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link bg-primary border-primary">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link bg-light border-light text-primary" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($distributions->hasMorePages())
                    <li class="page-item">
                        <a class="page-link bg-light border-light text-primary" href="{{ $distributions->nextPageUrl() }}" rel="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link bg-light border-light text-muted">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
    </div>
</div>

@endsection
