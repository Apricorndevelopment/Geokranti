@extends('layouts.layout')
@section('title', 'Package Management')
@section('container')

    <div class="container-fluid p-4">
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0">Package Management</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-primary">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title mb-0">Package Type 1</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Basic packages with essential features</p>
                                <!-- <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item">Simple pricing structure</li>
                                        <li class="list-group-item">Basic package details</li>
                                        <li class="list-group-item">Quick setup</li>
                                    </ul> -->
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('admin.package1.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add Package 1
                                </a>
                            </div>
                        </div>
                    </div>

                  
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-info">
                            <div class="card-header bg-info text-white">
                                <h5 class="card-title mb-0">Package Type 2</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Advanced packages with additional features</p>
                                <!-- <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item">Rate-based calculations</li>
                                        <li class="list-group-item">Time-bound options</li>
                                        <li class="list-group-item">Profit sharing details</li>
                                    </ul> -->
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('admin.package2.create') }}" class="btn btn-info ">
                                    <i class="bi bi-plus-circle"></i> Add Package 2
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Existing Packages Tables -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h4 class="mb-3">Existing Packages</h4>

                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Package Type 1 List</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($package1 as $package)
                                                <tr>
                                                    <td>{{ $package->package_name }}</td>
                                                    <td>{{ $package->package_quantity }}</td>
                                                    <td>{{ $package->price }}</td>
                                                    <td>{{ $package->discount_per }}%</td>
                                                    <td>{{ $package->description ?? 'N/A' }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.package1.edit', $package->id) }}"
                                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <form action="{{ route('admin.package1.destroy', $package->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this package?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-4 text-muted">No Package 1 items found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Package Type 2 List</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Rate</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($package2 as $package)
                                                <tr>
                                                    <td>{{ $package->package_name }}</td>
                                                    <td>{{ $package->package_quantity }}</td>
                                                    <td>{{ $package->price }}</td>
                                                    <td>{{ $package->description }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.package2.edit', $package->id) }}"
                                                            class="btn btn-sm btn-outline-info">Edit</a>
                                                        <form action="{{ route('admin.package2.destroy', $package->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this package?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-4 text-muted">No Package 2 items found
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
        </div>
    </div>

@endsection