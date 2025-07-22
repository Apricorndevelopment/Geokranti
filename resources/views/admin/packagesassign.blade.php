@extends('layouts.layout')
@section('title', 'Package Management')
@section('container')


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="mt-3">Assign Package</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.packages.search') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="ulid">Search by ULID</label>
                            <input type="text" class="form-control" id="ulid" name="ulid" 
                                   placeholder="Enter user's ULID" required>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary" style="height: 50px;">Search</button>
                    </div>
                </div>
            </form>

            @isset($user)
                <div class="user-info mb-4 p-3 border rounded">
                    <h6>User Information</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Status:</strong> 
                                <span class="badge bg-{{ $user->status === 'active' ? 'success' : 'warning' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Package Assignment Form -->
                <form action="{{ route('admin.packages.assign') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    
                    <div class="form-group mb-3">
                        <label for="package_id">Select Package</label>
                        <select class="form-control" id="package_id" name="package_id" required>
                            <option value="">-- Select Package --</option>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}" data-price="{{ $package->price }}" data-discount="{{ $package->discount_per }}">
                                    {{$package->package_quantity}} {{ $package->package_name }} - ₹{{ $package->price }} 
                                    @if($package->discount_per)
                                        ({{ $package->discount_per }}% off)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="package-details mb-3 p-3 border rounded" style="display: none;">
                        <h6>Package Details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Original Price:</strong> ₹<span id="original-price">0</span></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Discount:</strong> <span id="discount-percentage">0</span>%</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Final Price:</strong> ₹<span id="final-price">0</span></p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Assign Package</button>
                </form>
            @endisset
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('package_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const discount = parseFloat(selectedOption.getAttribute('data-discount')) || 0;
        const discountAmount = (price * discount) / 100;
        const finalPrice = price - discountAmount;

        document.getElementById('original-price').textContent = price.toFixed(2);
        document.getElementById('discount-percentage').textContent = discount;
        document.getElementById('final-price').textContent = finalPrice.toFixed(2);
        
        document.querySelector('.package-details').style.display = 'block';
    });
</script>
@endpush
@endsection