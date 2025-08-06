@extends('userlayouts.layouts')

@section('title', 'Network Explorer')

@section('container')
    <div class="container mt-4">
        <h3 class="mb-4">Network Explorer</h3>

        <div class="row">
            <!-- Left: Tree -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        My Network
                    </div>
                    <div class="card-body tree-container p-2 p-sm-3 p-md-4" style="max-height: 600px; overflow-y: auto;">
                        {!! $treeHtml !!}
                    </div>
                </div>
            </div>

            <!-- Right: User Details -->
            <div class="col-md-6 mt-2 mt-md-0">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white py-2">
                        <h6 class="mb-0">User Details</h6>
                    </div>
                    <div class="card-body p-0 p-md-2">
                        <form id="userDetailsForm" class="user-details-form p-2 p-md-3">
                            <!-- Row 1 -->
                            <div class="row mb-1 g-3 g-md-4">
                                <div class="col-6">
                                    <div class="form-group mb-1">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">Name</label>
                                        <input type="text" id="detail_name"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-1">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">ULID</label>
                                        <input type="text" id="detail_ulid"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="row mb-1 g-3 g-md-4">
                                <div class="col-6">
                                    <div class="form-group mb-1">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">Registered Date</label>
                                        <input type="text" id="detail_doa"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-1">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">Rank</label>
                                        <input type="text" id="detail_rank"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="row mb-1 g-3 g-md-4">
                                <div class="col-6">
                                    <div class="form-group mb-1">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">Points Balance</label>
                                        <input type="text" id="detail_points"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-1">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">Loyalty Balance</label>
                                        <input type="text" id="detail_loyalty"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Business -->
                            <div class="row justify-content-center mt-1">
                                <div class="col-12 col-md-8">
                                    <div class="form-group mb-0">
                                        <label class="detail-label small text-muted mb-0 mb-md-2">Total Team Business</label>
                                        <input type="text" id="detail_business"
                                            class="form-control form-control-sm detail-input" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .user-details-form {
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .detail-row {
            padding: 12px 0;
            margin: 0;
            border-radius: 4px;
        }

        .dark-row {
            background-color: #e9ecef;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .detail-input {
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 5px 12px;
            height: calc(1.5em + 0.5rem + 2px);
            font-size: 14px;
        }

        .card-header {
            font-size: 0.9rem;
        }

        .detail-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-group {
            margin-bottom: 0;
        }
    </style>
@endsection
{{-- @push('styles')
    <style>
        .tree,
        .tree ul {
            list-style-type: none;
            margin: 0;
            padding-left: 20px;
        }

        .tree li {
            margin: 5px 0;
        }

        .tree-node {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .toggle-icon {
            width: 20px;
            display: inline-block;
        }

        .node-label {
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
            margin-left: 5px;
        }

        .nested {
            display: none;
        }

        /* Scrollbar for tree panel */
        .tree-container {
            max-height: 600px;
            overflow-y: auto;
        }

        .card {
            border-radius: 10px;
        }

        .card-header {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
@endpush --}}


@push('scripts')
    <script>
        function toggleNode(el) {
            const li = el.closest('li');
            const nested = li.querySelector('ul.nested');
            const icon = el.querySelector('.toggle-icon');
            // icon.textContentt = li.classList.contains("active") ? "📂" : "📁";

            if (nested) {
                nested.style.display = nested.style.display === "none" || nested.style.display === "" ? "block" : "none";
                icon.textContent = nested.style.display === "block" ? "➖📂" : "➕📁";
            }
        }

        function loadUserDetails(ulid) {
            fetch('/get-user-details/' + ulid)
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Calculate total business
                    const leftBusiness = parseFloat(data.left_business) || 0;
                    const rightBusiness = parseFloat(data.right_business) || 0;
                    const totalBusiness = (leftBusiness + rightBusiness).toFixed(2);

                    // Update form fields
                    document.getElementById('detail_name').value = data.name || 'N/A';
                    document.getElementById('detail_ulid').value = data.ulid || 'N/A';
                    document.getElementById('detail_doa').value = data.user_doa || 'N/A';
                    document.getElementById('detail_rank').value = data.rank || 'N/A';
                    document.getElementById('detail_points').value = data.points_balance || '0';
                    document.getElementById('detail_loyalty').value = data.loyalty_balance || '0';
                    document.getElementById('detail_business').value = totalBusiness;
                })
                .catch(err => {
                    console.error('Error:', err);
                    alert('Failed to load user details');
                });
        }
    </script>
@endpush