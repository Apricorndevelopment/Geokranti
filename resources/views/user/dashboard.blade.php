@extends('userlayouts.layouts')
@section('title', 'Dashboard')
@section('container')

<div class="container py-4">
    <div class="mb-4">
        <h2 class="fw-bold">Hello, Welcome {{ Auth::user()->name }}!</h2>
        <h5 class="mt-3 d-flex align-items-center gap-1">
            Status:
            <span class="badge bg-{{ Auth::user()->status == 'active' ? 'success' : 'danger' }}">
                {{ ucfirst(Auth::user()->status) }}
            </span>
        </h5>
    </div>

    @session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endsession

    @session('error')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endsession

    @if(Auth::user()->status == 'inactive')
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning text-dark fw-semibold text-center">
            Account Activation Required
        </div>
        <div class="card-body">
            <div id="activateSection" class="text-center">
                <button id="activateBtn" class="btn btn-primary btn-lg px-4">
                    Activate Account
                </button>
            </div>

            <div id="packageSelection" style="display: none;" class="mt-4">
                <h5 class="mb-3">Select a Package to Activate Your Account</h5>

                <form id="packageForm" action="{{ route('user.purchase-package') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Available Packages</label>
                                <select class="form-select" name="package_id" required>
                                    <option value="">-- Select Package --</option>
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}" 
                                        data-price="{{ $package->price }}" 
                                        data-discount="{{ $package->discount_per }}">
                                        {{ $package->package_name }} - ₹{{ $package->price }} + {{ $package->discount_per }}% off Discount Coupon
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p><strong>Your Wallet Balance:</strong> ₹{{ Auth::user()->points_balance }}</p>
                    </div>

                    <button type="submit" class="btn btn-success mt-2">
                        Purchase Package
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="text-center">
        <img src="images/geokranti.jpg" width="320" height="380" class="img-fluid rounded shadow-sm mt-3" alt="GeoKranti">
    </div>
</div>

<script>
    document.getElementById('activateBtn').addEventListener('click', function() {
        document.getElementById('packageSelection').style.display = 'block';
        this.style.display = 'none';
    });

    const packageSelect = document.querySelector('select[name="package_id"]');
    const quantityInput = document.querySelector('input[name="quantity"]');
    
    function calculateTotal() {
        if(packageSelect.value) {
            const price = parseFloat(packageSelect.selectedOptions[0].dataset.price);
            const discount = parseFloat(packageSelect.selectedOptions[0].dataset.discount);
            const quantity = parseInt(quantityInput.value);

            const discountAmount = price * discount / 100 ;
            const total = price - discountAmount;

            document.getElementById('totalCost').textContent = `Total Cost: ₹${total.toFixed(2)}`;
        }
    }

    packageSelect.addEventListener('change', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);
</script>

@endsection
