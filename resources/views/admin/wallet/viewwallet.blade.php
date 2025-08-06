@extends('layouts.layout')
@section('title', 'Wallet Management')
@section('container')

    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#pointsTab">Points Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#rewardsTab">Loyalty Rewards</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <!-- Points Tab -->
                    <div class="tab-pane fade show active" id="pointsTab">
                        <form action="{{ route('admin.addPoints') }}" method="POST" id="pointsForm">
                            @csrf
                            <input type="hidden" name="ulid" id="pointsULIDHidden">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <label for="pointsULID" class="form-label">Enter User ULID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="pointsULID"
                                            placeholder="Search by ULID">
                                        <button class="btn btn-primary" type="button" id="searchPointsUser">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div id="pointsUserDetails" class="mb-4 p-3 border rounded" style="display: none;">
                                <h5>User Information</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Name:</strong> <span id="pointsUserName"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Email:</strong> <span id="pointsUserEmail"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Current Points:</strong> <span id="pointsUserBalance">0</span></p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="pointsAmount" class="form-label">Points to Add/Deduct</label>
                                        <input type="number" class="form-control" id="pointsAmount" name="points"
                                            placeholder="Enter amount">
                                        <small class="text-muted">Use negative value to deduct points</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pointsNotes" class="form-label">Notes</label>
                                        <input type="text" class="form-control" id="pointsNotes" name="notes"
                                            placeholder="Transaction notes">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">Submit Points</button>
                                </div>
                            </div>
                        </form>


                        <div class="mt-4">
                            <h5>Recent Points Transactions</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>ULID/Name</th>
                                            <th>Debit/Credit</th>
                                            <th>Balance</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pointsTransactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                                <td>{{ optional($transaction->user)->name }}
                                                    ({{ optional($transaction->user)->ulid }})</td>

                                                <td
                                                    class="{{ $transaction->points >= 0 ? 'text-success' : 'text-danger' }}">
                                                    {{ $transaction->points >= 0 ? '+' : '' }}{{ $transaction->points }}
                                                </td>
                                                <td>{{ $transaction->balance ?? 'N/A' }} </td>
                                                <td
                                                    style="width: 500px; max-width: 500px; white-space: normal; word-wrap: break-word;">
                                                    {{ $transaction->notes ? $transaction->notes : 'N/A' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="rewardsTab">
                        <form action="{{ route('admin.addLoyalty') }}" method="post" id="rewardsForm">
                            @csrf
                            <input type="hidden" name="ulid" id="rewardsULIDHidden">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <label for="rewardsULID" class="form-label">Enter User ULID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="rewardsULID"
                                            placeholder="Search by ULID">
                                        <button class="btn btn-primary" type="button"
                                            id="searchRewardsUser">Search</button>
                                    </div>
                                </div>
                            </div>

                            <!-- User Details Section (hidden by default) -->
                            <div id="rewardsUserDetails" class="mb-4 p-3 border rounded" style="display: none;">
                                <h5>User Information</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>Name:</strong> <span id="rewardsUserName"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Email:</strong> <span id="rewardsUserEmail"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Current Loyalty:</strong> <span id="rewardsUserBalance">0</span></p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="rewardsAmount" class="form-label">Loyalty to Add/Deduct</label>
                                        <input type="number" class="form-control" id="rewardsAmount" name="loyalty"
                                            placeholder="Enter amount">
                                        <small class="text-muted">Use negative value to deduct loyalty</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rewardsNotes" class="form-label">Notes</label>
                                        <input type="text" class="form-control" id="rewardsNotes" name="notes"
                                            placeholder="Transaction notes">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">Submit Loyalty</button>
                                </div>
                            </div>
                        </form>

                        <!-- Rewards Transaction History -->
                        <div class="mt-4">
                            <h5>Recent Loyalty Transactions</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>ULID</th>
                                            <th>Name</th>
                                            <th>Loyalty</th>
                                            <th>Notes</th>
                                            <th>Admin Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($loyaltyTransactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                                <td>{{ optional($transaction->user)->ulid }}</td>
                                                <td>{{ optional($transaction->user)->name }}</td>
                                                <td
                                                    class="{{ $transaction->loyalty >= 0 ? 'text-success' : 'text-danger' }}">
                                                    {{ $transaction->loyalty >= 0 ? '+' : '' }}{{ $transaction->loyalty }}
                                                </td>
                                                <td>{{ $transaction->notes ? $transaction->notes : 'N/A' }}</td>
                                                <td>{{ optional($transaction->admin)->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for AJAX functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('searchPointsUser').addEventListener('click', function() {
                const ulid = document.getElementById('pointsULID').value;
                if (ulid) {
                    fetch('/admin/get-user-by-ulid', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            },
                            body: JSON.stringify({
                                ulid: ulid
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('pointsUserName').textContent = data.user.name;
                                document.getElementById('pointsUserEmail').textContent = data.user
                                .email;
                                document.getElementById('pointsUserBalance').textContent = data.user
                                    .points_balance;
                                document.getElementById('pointsUserDetails').style.display = 'block';
                            } else {
                                alert('User not found');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });

            document.getElementById('pointsForm').addEventListener('submit', function() {
                const ulid = document.getElementById('pointsULID').value;
                document.getElementById('pointsULIDHidden').value = ulid;
            });

            document.getElementById('searchRewardsUser').addEventListener('click', function() {
                const ulid = document.getElementById('rewardsULID').value;
                if (ulid) {
                    fetch('/admin/get-user-by-ulid', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            },
                            body: JSON.stringify({
                                ulid: ulid
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('rewardsUserName').textContent = data.user.name;
                                document.getElementById('rewardsUserEmail').textContent = data.user
                                    .email;
                                document.getElementById('rewardsUserBalance').textContent = data.user
                                    .loyalty_balance;
                                document.getElementById('rewardsUserDetails').style.display = 'block';
                            } else {
                                alert('User not found');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });

            document.getElementById('rewardsForm').addEventListener('submit', function() {
                const ulid = document.getElementById('rewardsULID').value;
                document.getElementById('rewardsULIDHidden').value = ulid;
            });
        });
    </script>


    <style>
        .nav-tabs .nav-link {
            font-weight: 500;
            color: #495057;
        }

        .nav-tabs .nav-link.active {
            font-weight: 600;
            color: #0d6efd;
        }

        .table th {
            font-size: 13px;
            font-weight: 500;
        }

        .table td {
            font-size: 13px;
            vertical-align: middle;
        }

        .text-success {
            font-weight: 500;
        }

        .text-danger {
            font-weight: 500;
        }
    </style>
@endsection
