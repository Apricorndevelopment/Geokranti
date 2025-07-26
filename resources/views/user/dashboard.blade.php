@extends('userlayouts.layouts')
@section('title', 'Dashboard')
@section('container')
    <style>
        .card-tale {
            background: linear-gradient(135deg, #a29bfe, #6c5ce7);
            color: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(108, 92, 231, 0.3);
        }

        .card-dark-blue {
            background: linear-gradient(135deg, #0984e3, #74b9ff);
            color: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(9, 132, 227, 0.3);
        }

        .fs-30 {
            font-size: 2rem;
            font-weight: 700;
        }

        .transparent {
            background-color: transparent !important;
        }

        .shadow-inset {
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .avatar-lg {
            height: 160px;
            width: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.2);
             border-radius: 50%;
    overflow: hidden;
        }

        .avatar-lg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}


        .bg-gradient-primary {
            background: linear-gradient(135deg, #6c5ce7, #341f97) !important;
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #fdcb6e, #e17055) !important;
        }

        .rounded-pill {
            border-radius: 50rem !important;
        }

        .badge {
            font-size: 0.85rem;
        }

        select.form-select {
            border-radius: 0.5rem;
        }

        .btn-lg {
            font-size: 1.1rem;
        }

        .fw-medium {
            font-weight: 500;
        }

        .custom-card {
            border-radius: 16px;
            color: white;
            border: none;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .custom-card hr {
            border-color: rgba(255, 255, 255, 0.3);
        }

        .custom-card .small {
            opacity: 0.8;
        }
    </style>

    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="row mb-2">
            <div class="col-12">
                <div class="card bg-gradient-primary shadow-inset border-0">
                    <div class="card-body py-3 px-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex align-items-center gap-3">
                                    <h2 class="fw-bold text-white mb-1">Welcome back, {{ Auth::user()->name }}!</h2>
                                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill">
                                        <i class="fas fa-circle me-1 small"></i>
                                        {{ ucfirst(Auth::user()->status) }}
                                    </span>
                                </div>
                                <div class="d-flex flex-column mt-2 gap-2">
                                    <span class="text-white">
                                        <i class="fas fa-user me-1"></i> User Name:
                                        {{ Auth::user()->ulid }}
                                    </span>
                                    <span class="text-white">
                                        <i class="fas fa-trophy me-1"></i> Rank:
                                        {{ Auth::user()->current_rank ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                            <div class="avatar avatar-lg rounded-circle shadow">
                               <img src="abcd.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerts Section -->
        <div class="row mb-2">
            <div class="col-12">
                @session('success')
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession

                @session('error')
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endsession
            </div>
        </div>

        <!-- Activation Card (Conditional) -->
        @if (Auth::user()->status == 'inactive')
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-gradient-warning text-white border-0 py-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <h5 class="mb-0 fw-semibold">Account Activation Required</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div id="activateSection" class="text-center py-3">
                                <button id="activateBtn" class="btn btn-primary btn-lg px-4 rounded-pill">
                                    <i class="fas fa-bolt me-2"></i>Activate Account
                                </button>
                                <p class="text-muted mt-2">Activate your account to access all features</p>
                            </div>

                            <div id="packageSelection" style="display: none;" class="mt-3">
                                <h5 class="mb-4 fw-semibold border-bottom pb-2">
                                    <i class="fas fa-box-open me-2"></i>Select a Package
                                </h5>

                                <form id="packageForm" action="{{ route('user.purchase-package') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <select class="form-select" name="package_id" id="packageSelect" required>
                                                    <option value="">-- Select Package --</option>
                                                    @foreach ($packages as $package)
                                                        <option value="{{ $package->id }}"
                                                            data-price="{{ $package->price }}"
                                                            data-discount="{{ $package->discount_per }}">
                                                            {{ $package->package_name }} - ₹{{ $package->price }}
                                                            ({{ $package->discount_per }}% off)
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="packageSelect">Available Packages</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card bg-light p-3 h-100">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span class="fw-medium">Wallet Balance:</span>
                                                    <span class="badge bg-success rounded-pill px-3">
                                                        ₹{{ Auth::user()->points_balance }}
                                                    </span>
                                                </div>
                                                <div id="totalCost" class="fw-bold text-primary fs-5">Select a package
                                                    to see details</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" class="btn btn-success px-4 rounded-pill">
                                            <i class="fas fa-shopping-cart me-1"></i> Purchase Package
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @php
            function formatInLakhsCrores($number)
            {
                if ($number >= 10000000) {
                    return number_format($number / 10000000, 2) . ' Cr';
                } elseif ($number >= 100000) {
                    return number_format($number / 100000, 2) . ' Lakh';
                } else {
                    return number_format($number);
                }
            }
        @endphp


        <div class="row">
            <!-- Power Leg Points Card -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm"
                    style="background: linear-gradient(135deg, #00c9ff, #92fe9d); color: #fff; border-radius: 16px;">
                    <div class="card-body">
                        <p class="mb-1 fs-6 text-uppercase fw-semibold">Power Leg Points</p>
                        <h2 class="fw-bold mb-1">{{ formatInLakhsCrores(Auth::user()->left_business) }}</h2>
                        <hr class="opacity-100 my-2" style="border-color: rgba(255,255,255,0.4      );">
                        <p class="mb-0 small opacity-75">Your stronger leg’s accumulated business volume</p>
                    </div>
                </div>
            </div>

            <!-- Weaker Leg Points Card -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm"
                    style="background: linear-gradient(135deg, #f093fb, #f5576c); color: #fff; border-radius: 16px;">
                    <div class="card-body">
                        <p class="mb-1 fs-6 text-uppercase fw-semibold">Weaker Leg Points</p>
                        <h2 class="fw-bold mb-1">{{ formatInLakhsCrores(Auth::user()->right_business) }}</h2>
                        <hr class="opacity-50 my-2" style="border-color: rgba(255,255,255,0.4);">
                        <p class="mb-0 small opacity-75">Your weaker leg's total business volume</p>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-sm-6 col-xl-4 mx-auto">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="card-body p-0">
                        <img src="images/geokranti.jpg" class="img-fluid w-100"
                            style="max-height: 450px; object-fit: cover;" alt="GeoKranti">
                        <div class="p-3 bg-light text-center">
                            <h5 class="fw-bold mb-0">GeoKranti - Empowering Your Journey</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    </div>

    <script>
        document.getElementById('activateBtn').addEventListener('click', function() {
            document.getElementById('packageSelection').style.display = 'block';
            this.style.display = 'none';
        });

        const packageSelect = document.querySelector('select[name="package_id"]');

        packageSelect.addEventListener('change', function() {
            if (this.value) {
                const price = parseFloat(this.selectedOptions[0].dataset.price);
                const discount = parseFloat(this.selectedOptions[0].dataset.discount);
                const discountAmount = price * discount / 100;
                const total = price - discountAmount;

                document.getElementById('totalCost').innerHTML = `
                <span class="text-decoration-line-through text-muted me-2">₹${price.toFixed(2)}</span>
                ₹${total.toFixed(2)} 
                <span class="badge bg-danger ms-2">${discount}% OFF</span>
            `;
            } else {
                document.getElementById('totalCost').textContent = 'Select a package to see details';
            }
        });
    </script>

@endsection
