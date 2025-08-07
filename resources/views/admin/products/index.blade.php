@extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')

<style>
    .product-table {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        overflow: hidden;
    }
    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
        font-weight: 600;
        color: #495057;
        padding: 1rem;
    }
    .table tbody td {
        padding: 0.75rem 1rem;
        vertical-align: middle;
        border-top: 1px solid #f1f3f5;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.03);
    }
    .action-btns .btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 6px;
    }
    .empty-state {
        padding: 2rem;
        background-color: #f8fafc;
    }
    .empty-state i {
        font-size: 2.5rem;
        color: #adb5bd;
    }
    .pagination {
        justify-content: center;
        margin-top: 1.5rem;
    }
    .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    .page-link {
        color: #0d6efd;
        margin: 0 3px;
        border-radius: 6px !important;
    }
</style>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">
                    <i class="bi bi-box-seam me-2"></i>Products Management
                </h3>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Add Product
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card product-table">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th width="140" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $product->product_name }}</strong>
                            </td>
                            <td>₹{{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="text-muted" title="{{ $product->description }}">
                                   {{$product->description }}
                                </span>
                            </td>
                            <td>{{ $product->created_at->format('d M Y') }}</td>
                            <td class="action-btns text-end">
                                <a href="{{ route('admin.products.edit', $product->id) }}" 
                                   class="btn btn-sm btn-outline-primary" 
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 empty-state">
                                <i class="bi bi-box-open"></i>
                                <h5 class="text-muted mt-2">No products found</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($products->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>
    @endif
</div>

@endsection