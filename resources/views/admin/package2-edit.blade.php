@extends('layouts.layout')
@section('title', 'Edit Package 2')
@section('container')

<div class="container-fluid p-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Edit Package Type 2</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.package2.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="package_name" class="form-label required">Package Name</label>
                        <input type="text" class="form-control" name="package_name" value="{{ $package->package_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="package_quantity" class="form-label required">Quantity</label>
                        <input type="text" class="form-control" name="package_quantity" value="{{ $package->package_quantity }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label required">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $package->price }}" required>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{ $package->description }}</textarea>
                    </div>


                    <div class="col-12">
                        <label class="form-label required">Rate Details</label>
                        <div id="rate-details-wrapper">
                            @foreach($package->details as $detail)
                            <div class="row g-3 rate-group mt-2">
                                <div class="col-md-2">
                                    <input type="number" step="0.01" name="rates[]" class="form-control" value="{{ $detail->rate }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="times[]" class="form-control" value="{{ $detail->time }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="capitals[]" class="form-control" value="{{ $detail->capital }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="profit_shares[]" class="form-control" value="{{ $detail->profit_share }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="button" class="btn btn-danger remove-rate">X</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success mt-2" id="add-rate-btn">+ Add Rate</button>
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-info">Update Package</button>
                        <a href="{{ route('admin.package') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
