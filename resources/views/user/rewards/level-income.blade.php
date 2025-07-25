@extends('userlayouts.layouts')
@section('title', 'Dashboard')
@section('container')

<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-gradient-info text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-layer-group me-2"></i>Level Income Report
                </h4>
                <div>
                    <span class="badge bg-white text-info">Total: ₹{{ number_format($totalIncome, 2) }}</span>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Level</th>
                            <th>From User</th>
                            <th>Package</th>
                            <th>Purchase Amt</th>
                            <th>Percentage</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($incomes as $key => $income)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge bg-{{ $income->level <= 4 ? 'primary' : ($income->level <= 25 ? 'success' : 'warning') }}">
                                    @if($income->level <= 4)
                                        Level {{ $income->level }}
                                    @else
                                        Level {{ $income->level }} ({{ $income->level <= 25 ? '5-25' : '26-50' }})
                                    @endif
                                </span>
                            </td>
                            <td>{{ $income->from_user_name }}</td>
                            <td>{{ $income->package_name ?? 'N/A' }}</td>
                            <td>₹{{ number_format($income->purchase_amount, 2) }}</td>
                            <td>{{ $income->percentage }}%</td>
                            <td class="fw-bold text-success">₹{{ number_format($income->amount, 2) }}</td>
                            <td>{{ $income->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="fas fa-info-circle me-2"></i>No level income records found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Showing {{ $incomes->count() }} of {{ $totalRecords }} records
                </div>
                <div>
                    {{ $incomes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
