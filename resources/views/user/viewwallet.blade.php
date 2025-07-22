@extends('userlayouts.layouts')
@section('title', 'Network Explorer')
@section('container')

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="fs-3 p-1 mb-0">Welcome, {{ Auth::user()->name }}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-3 display-5">Your Current Balance : </h6>

                <div class="row">
                    <!-- Points Balance -->
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <h5 class="card-title text-success">
                                    <i class="bi bi-coin"></i> Points Balance
                                </h5>
                                <p class="display-5 fw-bold text-success">
                                    {{ $points }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-info h-100">
                            <div class="card-body">
                                <h5 class="card-title text-info">
                                    <i class="bi bi-gem"></i> Royalty Balance
                                </h5>
                                <p class="display-5 fw-bold text-info">
                                    {{ $royalty }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="h5 mb-0">Recent Points Transactions</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-3">Date</th>
                                        <th>Points</th>
                                        <th class="pe-3">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pointsTransactions as $transaction)
                                        <tr>
                                            <td class="ps-3">{{ $transaction->created_at->format('j M, Y') }}</td>
                                            <td class="{{ $transaction->points >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $transaction->points >= 0 ? '+' : '' }}{{ $transaction->points }}
                                            </td>
                                            <td class="pe-3">{{ $transaction->notes ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-muted">No points transactions found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h3 class="h5 mb-0">Recent Royalty Transactions</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-3">Date</th>
                                        <th>Royalty</th>
                                        <th class="pe-3">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($royaltyTransactions as $transaction)
                                        <tr>
                                            <td class="ps-3">{{ $transaction->created_at->format('j M, Y') }}</td>
                                            <td class="{{ $transaction->royalty >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $transaction->royalty >= 0 ? '+' : '' }}{{ $transaction->royalty }}
                                            </td>
                                            <td class="pe-3">{{ $transaction->notes ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-muted">No royalty transactions found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection