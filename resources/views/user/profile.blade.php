@extends('userlayouts.layouts')
@section('title', 'Dashboard')
@section('container')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Hello, {{ $user->name }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                <!-- Profile picture display -->
                                @if ($user->profile_picture)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                            class="profile-pic img-thumbnail rounded-circle" alt="Profile Picture">
                                    </div>
                                @else
                                    <div class="profile-pic-placeholder mb-3">
                                        <i class="fa fa-user-circle fa-5x text-secondary"></i>
                                    </div>
                                @endif

                                <p class="badge bg-{{ $user->status == 'active' ? 'success' : 'danger' }}">
                                    Status: {{ ucfirst($user->status) }}
                                </p>
                            </div>

                            <div class="col-md-8">
                                <div class="row g-3">
                                    <!-- Personal Info -->
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Personal Information</h5>
                                        <p><strong>ULID:</strong> {{ $user->ulid }}</p>
                                        <p><strong>Name:</strong> {{ $user->name }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                        <p><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>
                                    </div>

                                    <!-- Address Info -->
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Address Information</h5>
                                        <p><strong>Address:</strong> {{ $user->address ?? 'Not provided' }}</p>
                                        <p><strong>State:</strong> {{ $user->state ?? 'Not provided' }}</p>
                                    </div>

                                    <!-- Network Info -->
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Network Information</h5>
                                        <p><strong>Sponsor ID:</strong> {{ $user->sponsor_id ?? 'None' }}</p>
                                        <p><strong>Parent ID:</strong> {{ $user->parent_id ?? 'None' }}</p>
                                    </div>

                                    <!-- Balance Info -->
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Balance Information</h5>
                                        <p><strong>Points Balance:</strong>
                                            <span class="badge bg-info">{{ $user->points_balance ?? 0 }}</span>
                                        </p>
                                        <p><strong>Loyalty Balance:</strong>
                                            <span class="badge bg-success">{{ $user->loyalty_balance ?? 0 }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Bank Information</h5>
                                        <p><strong>Account No:</strong> {{ $user->account_no ?? 'Not provided' }}</p>
                                        <p><strong>IFSC Code:</strong> {{ $user->ifsc_code ?? 'Not provided' }}</p>
                                        <p><strong>UPI ID:</strong> {{ $user->upi_id ?? 'Not provided' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($user->passbook_photo)
                                            <div class="col-12">
                                                <h5 class="text-muted">Passbook Proof</h5>
                                                <img src="{{ asset('storage/' . $user->passbook_photo) }}"
                                                    class="img-thumbnail" style="max-width: 200px; max-height: 200px;"
                                                    alt="Passbook Photo">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">
                                <i class="fa fa-edit me-2"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #dee2e6;
        }

        .profile-pic-placeholder {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f8f9fa;
            border: 3px solid #dee2e6;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            border-radius: 10px 10px 0 0 !important;
        }
    </style>
@endsection
