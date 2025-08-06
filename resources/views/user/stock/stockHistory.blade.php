@extends('userlayouts.layouts')
@section('title', 'Stock Transfer History')

@section('container')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-exchange-alt me-2"></i> My Stock Transfers</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Type</th>
                            <th>User Ulid</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>From Location</th>
                            <th>To Location</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transfers as $transfer)
                        <tr>
                            <td>
                                @if($transfer->sender_id == Auth::user()->ulid)
                                    <span class="badge bg-danger">Sent</span>
                                @else
                                    <span class="badge bg-success">Received</span>
                                @endif
                            </td>
                           <td>
                                @if($transfer->sender_id == Auth::user()->ulid)
                                    To: {{ $transfer->receiver_ulid }}
                                @else
                                    From: {{ $transfer->sender_id==1 ? 'Admin' : $transfer->sender_id }}
                                @endif 
                            </td>
                            <td>{{ $transfer->product->product_name }}</td>
                            <td class="fw-bold">
                                @if($transfer->sender_id == Auth::user()->ulid)
                                    <span class="text-danger">-{{ $transfer->quantity }}</span>
                                @else
                                    <span class="text-success">+{{ $transfer->quantity }}</span>
                                @endif
                            </td>
                            <td>{{ $transfer->created_at->format('d M Y, h:i A') }}</td>
                            <td>{{ $transfer->from_location }} </td>
                            <td>{{ $transfer->to_location }} </td>
                            {{-- <td>
                                <span class="badge bg-{{ 
                                    $transfer->status == 'completed' ? 'success' : 
                                    ($transfer->status == 'pending' ? 'warning' : 'danger') 
                                }}">
                                    {{ ucfirst($transfer->status) }}
                                </span>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No stock transfers found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($transfers->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $transfers->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection