@extends('userlayouts.layouts')
@section('title', 'Dashboard')
@section('container')

<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-coins me-2"></i>Network Commissions
                </h4>
                <span class="badge bg-white text-primary">Latest 10 Records</span>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                           <th>#</th>
                            <th>From User Name</th>
                            <th>From User ID</th>
                            <th>Purchase Amount</th>
                            <th>Commission</th>
                            <th>Level</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($commissions as $key => $commission)
                        <tr>
                             <td>{{ $key + 1 }}</td>
                            <td>{{ $commission->from_name }}</td>
                            <td>{{ $commission->from_ulid }}</td>
                            <td class="text-success">₹{{ number_format($commission->purchase_amount, 2) }}</td>
                            <td class="text-primary fw-bold">₹{{ number_format($commission->commission, 2) }}</td>
                            <td class="text-secondary">{{ $commission->level }}</td>
                            <td>{{ $commission->created_at->format('d M Y h:i a') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-info-circle me-2"></i>No commission records found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Showing {{ $commissions->count() }} records
                </div>
                <a href="{{ route('user.commissions.level1') }}" class="btn btn-sm btn-outline-primary">
                    View Referral Commissions <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection