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
                    <div class="card-body tree-container" style="max-height: 600px; overflow-y: auto;">
                        {!! $treeHtml !!}
                    </div>
                </div>
            </div>

            <!-- Right: User Details -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        User Details
                    </div>
                    <div class="card-body">
                       
                        <form id="userDetailsForm" class="user-details-form">
                    
                            <!-- Row 2 (Dark) -->
                            <div class="row detail-row dark-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="detail-label">Name</label>
                                        <input type="text" id="detail_name" class="form-control detail-input" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="detail-label">ULID</label>
                                        <input type="text" id="detail_ulid" class="form-control detail-input" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3 (Light) -->
                            <div class="row detail-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="detail-label">Registered Date</label>
                                        <input type="text" id="detail_doa" class="form-control detail-input" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="detail-label">Rank</label>
                                        <input type="text" id="detail_rank" class="form-control detail-input" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4 (Dark) -->
                            <div class="row detail-row dark-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="detail-label">Points Balance</label>
                                        <input type="text" id="detail_points" class="form-control detail-input" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="detail-label">Royalty Balance</label>
                                        <input type="text" id="detail_royalty" class="form-control detail-input"
                                            readonly>
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
            font-size: 14px;
        }

        .detail-input {
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
        }

        .detail-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-group {
            margin-bottom: 0;
        }
    </style>
@endsection
@push('styles')
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
            background: #007bff;
            color: white;
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
@endpush


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

                    // document.getElementById('detail_id').value = data.id;
                    document.getElementById('detail_name').value = data.name;
                    document.getElementById('detail_ulid').value = data.ulid;
                    // document.getElementById('detail_email').value = data.email;
                    document.getElementById('detail_doa').value = data.user_doa ?? 'N/A';
                    document.getElementById('detail_rank').value = data.rank || 'N/A';
                    document.getElementById('detail_points').value = data.points_balance || '0';
                    document.getElementById('detail_royalty').value = data.royalty_balance || '0';
                })

                .catch(err => console.error(err));
        }
    </script>
@endpush
