@extends('layouts.layout')
@section('title', 'Wallet Management')
@section('container')

<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-exchange-alt me-2"></i> Points Transactions
                </h5>
                <div class="d-flex align-items-center">
                    <form method="GET" action="{{ route('admin.wallet-transactions') }}" class="me-3">
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Search by ULID..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-light" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            @if(request('search'))
                            <a href="{{ route('admin.wallet-transactions') }}" class="btn btn-outline-light">
                                <i class="fa fa-times"></i>
                            </a>
                            @endif
                        </div>
                    </form>
                    <div class="badge bg-white text-primary">
                        Total: {{ $pointsTransactions->total() }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" style="table-layout: fixed;">
                    <colgroup>
                        <col style="width: 12%">
                        <col style="width: 13%">
                        <col style="width: 17%">
                        <col style="width: 10%">
                        <col style="width: 48%">
                    </colgroup>
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Date</th>
                            <th>ULID</th>
                            <th>User Name</th>
                            <th>Points</th>
                            <th class="pe-4">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pointsTransactions as $transaction)
                        <tr>
                            <td class="ps-4">
                                {{ $transaction->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $transaction->user->ulid }}</span>
                            </td>
                            <td>{{ $transaction->user->name }}</td>
                            <td class="{{ $transaction->points >= 0 ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                {{ $transaction->points >= 0 ? '+' : '' }}{{ $transaction->points }}
                            </td>
                            <td class="pe-4 text-wrap">
                                @if($transaction->notes)
                                <div style="white-space: normal; word-wrap: break-word;">
                                    {{ $transaction->notes }}
                                </div>
                                @else
                                <span class="text-muted">N/A</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="fas fa-exchange-alt fa-2x text-muted mb-3"></i>
                                <p class="text-muted">
                                    @if(request('search'))
                                    No transactions found for ULID "{{ request('search') }}"
                                    @else
                                    No transactions found
                                    @endif
                                </p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($pointsTransactions->hasPages())
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        {{-- Previous Page Link --}}
                        @if ($pointsTransactions->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $pointsTransactions->previousPageUrl() }}" rel="prev">&laquo;</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($pointsTransactions->getUrlRange(1, $pointsTransactions->lastPage()) as $page => $url)
                            @if ($page == $pointsTransactions->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($pointsTransactions->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $pointsTransactions->nextPageUrl() }}" rel="next">&raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection