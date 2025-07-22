@extends('layouts.layout')
@section('title', 'Create Package 2')
@section('container')

<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Create Package Type 2</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.package2.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                   
                    <div class="col-md-6">
                        <label for="package_name" class="form-label required">Package Name</label>
                        <input type="text" class="form-control" id="package_name" name="package_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="package_quantity" class="form-label required">Quantity</label>
                        <input type="text" class="form-control" id="package_quantity" name="package_quantity" required>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label required">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <!-- Rate Details Group -->
                    <div class="col-12">
                        <label class="form-label required">Rate Details</label>
                        <div id="rate-details-wrapper">
                            <div class="row g-3 rate-group">
                                <div class="col-md-2">
                                    <input type="number" step="0.01" name="rates[]" class="form-control" placeholder="Rate (%)" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="times[]" class="form-control" placeholder="Time (Years)">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="capitals[]" class="form-control" placeholder="Capital Return(%)">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="profit_shares[]" class="form-control" placeholder="Profit Share '0' for No & '1' for Yes ">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="button" class="btn btn-danger remove-rate">X</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success mt-2" id="add-rate-btn">+ Add Rate</button>
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-info">
                            <i class="bi bi-save"></i> Create Package
                        </button>
                        <a href="{{ route('admin.package') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-label.required:after {
        content: " *";
        color: red;
    }
</style>

<script>
    document.getElementById('add-rate-btn').addEventListener('click', function () {
        const wrapper = document.getElementById('rate-details-wrapper');
        const html = `
            <div class="row g-3 rate-group mt-2">
                <div class="col-md-2">
                    <input type="number" step="0.01" name="rates[]" class="form-control" placeholder="Rate (%)" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="times[]" class="form-control" placeholder="Time (years)">
                </div>
                <div class="col-md-3">
                    <input type="text" name="capitals[]" class="form-control" placeholder="Capital Return(%)">
                </div>
                <div class="col-md-3">
                    <input type="text" name="profit_shares[]" class="form-control" placeholder="Profit Share '0' for No & '1' for Yes ">
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-rate">X</button>
                </div>
            </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', html);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-rate')) {
            e.target.closest('.rate-group').remove();
        }
    });
</script>

@endsection
