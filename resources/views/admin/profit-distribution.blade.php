@extends('layouts.layout')
@section('title', 'Profit Distribution')
@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- Profit Distribution Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i> Profit Distribution</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.profit.distribute') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.01" class="form-control" id="profit" name="profit" required>
                                    <label for="profit">Total Profit (₹)</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" step="0.01" class="form-control" id="expenditure" name="expenditure" required>
                                    <label for="expenditure">Expenditure (₹)</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" step="0.01" class="form-control" id="profit_share" name="profit_share" required>
                                    <label for="profit_share">Profit Share % (for users with profit_share=yes)</label>
                                </div>
                                <small class="text-muted">This percentage will be distributed among eligible package buyers</small>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="fa fa-share-alt me-2"></i> Distribute Profit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Royalty Levels Table -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-header bg-info text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-layer-group me-2"></i> Royalty Level Profit Shares</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Level</th>
                                    <th class="text-end pe-4">Profit Share</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($royaltyLevels as $level)
                                <tr>
                                    <td class="ps-4">{{ $level->level }}</td>
                                    <td class="text-end pe-4">{{ $level->profit }}%</td>
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
    .card {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .form-floating label {
        color: #6c757d;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
    }
</style>

@endsection