@extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
        <h4 class="mb-0">Add New Product</h4>
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="form-label fw-medium">Product Name</label>
                    <input type="text" class="form-control border-secondary p-2" name="product_name" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-medium">Price</label>
                    <input type="number" step="0.01" class="form-control border-secondary p-2" name="price" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-medium">Description</label>
                    <textarea class="form-control border-secondary p-2" name="description" rows="4"></textarea>
                </div>
                
                <div class="mt-4 pt-2">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection