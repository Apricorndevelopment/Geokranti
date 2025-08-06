@extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')

<style>
    .product-table {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    }
    .table thead th {
        background-color: #f8f9fa;
        border-bottom-width: 1px;
        font-weight: 600;
        color: #495057;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
    .action-btns .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        margin-right: 0.25rem;
    }
    .empty-state {
        background-color: #f8f9fa;
        border-radius: 8px;
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
    }
</style>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">
                    <i class="bi bi-box-seam me-2"></i>Products Management
                </h2>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Add Product
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                            <th width="50">#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Created Date</th>
                           
                            <th width="120" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $product->product_name }}</strong>
                            </td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="text-muted" title="{{ $product->description }}">
                                    {{ Str::limit($product->description, 50) }}
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
                                <i class="bi bi-box-open fs-1 text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">No products found</h5>
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