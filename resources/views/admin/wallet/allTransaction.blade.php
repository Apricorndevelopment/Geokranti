@extends('layouts.layout')
@section('title', 'Wallet Management')
@section('container')

<div class="container-fluid py-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white py-2">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0">
                    <i class="fas fa-exchange-alt me-2"></i> Points Transactions
                </h5>
                <div class="d-flex flex-column flex-md-row align-items-center w-100 w-md-auto">
                    <form method="GET" action="{{ route('admin.wallet-transactions') }}" class="w-100 me-md-3 mb-2 mb-md-0">
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
                    <div class="badge bg-white d-none d-md-block text-primary ms-md-2">
                        Total: {{ $pointsTransactions->total() }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Date</th>
                            <th>ULID</th>
                            <th>User</th>
                            <th class="text-end pe-3">Points</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pointsTransactions as $transaction)
                        <tr>
                            <td class="ps-3">
                                {{ $transaction->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $transaction->user->ulid }}</span>
                            </td>
                            <td>{{ $transaction->user->name }}</td>
                            <td class="text-end pe-3 {{ $transaction->points >= 0 ? 'text-success fw-bold' : 'text-info fw-bold' }}">
                                {{ $transaction->points >= 0 ? '+' : '' }}{{ $transaction->points }}
                            </td>
                            <td class="text-wrap" style="max-width: 200px; min-width:180px;" title="{{ $transaction->notes ? $transaction->notes : 'N/A' }}">
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
            <div class="d-flex justify-content-center mt-3">
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

<style>
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .table {
        width: 100%;
    }
    
    .table td, .table th {
        padding: 0.75rem;
        vertical-align: middle;
    }
    
    .text-truncate {
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    @media (max-width: 768px) {
        .table td, .table th {
            padding: 0.5rem;
            font-size: 0.875rem;
        }
        
        .badge {
            font-size: 0.75rem;
        }
    }
</style>

@endsection