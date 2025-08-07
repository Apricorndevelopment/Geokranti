@extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')

<div class="container py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h4 class="mb-0 text-primary">
            <i class="bi bi-pencil-square me-2"></i>Edit Product
        </h4>
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-arrow-left me-1"></i> Back to Products
        </a>
    </div>

    <!-- Form Card -->
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-header bg-light py-3">
            <h5 class="mb-0 text-dark">
                <i class="bi bi-box-seam me-2"></i>Product Details
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row g-3">
                    <!-- Product Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-medium text-dark">Product Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control p-2 border-secondary @error('product_name') is-invalid @enderror" 
                               name="product_name" value="{{ old('product_name', $product->product_name) }}">
                        @error('product_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <!-- Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-medium text-dark">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                            <input type="number" step="0.01" class="form-control p-2 border-secondary @error('price') is-invalid @enderror" 
                                   name="price" value="{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="col-12 mb-3">
                        <label class="form-label fw-medium text-dark">Description</label>
                        <textarea class="form-control p-2 border-secondary @error('description') is-invalid @enderror" 
                                  name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="d-flex justify-content-between align-items-center pt-4 mt-3 border-top">
                    <button type="reset" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-check-circle me-2"></i>Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection