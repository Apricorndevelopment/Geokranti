@extends('layouts.layout')
@section('title', 'Create Package 1')
@section('container')

<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Create Package Type 1</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.package1.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="package_name" class="form-label">Package Name</label>
                        <input type="text" class="form-control @error('package_name') is-invalid @enderror" id="package_name" name="package_name" value="{{ old('package_name') }}" required>
                        @error('package_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="package_quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control @error('package_quantity') is-invalid @enderror" id="package_quantity" name="package_quantity" value="{{ old('package_quantity') }}" required>
                        @error('package_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="discount" class="form-label">Discount(%)</label>
                        <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount') }}">
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Create Package</button>
                        <a href="{{ route('admin.package') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection