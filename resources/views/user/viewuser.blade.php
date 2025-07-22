@extends('userlayouts.layouts')

@section('title', 'Network Explorer')

@section('container')
    <div class="container mt-4">
        <h3 class="mb-4">Network Explorer</h3>

        <div class="row">
            <!-- Left: Tree -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        Network Tree
                    </div>
                    <div class="card-body tree-container" style="max-height: 600px; overflow-y: auto;">
                        {!! $treeHtml !!}
                    </div>
                </div>
            </div>

            <!-- Right: User Details -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        User Details
                    </div>
                    <div class="card-body">
                        {{-- <form id="userDetailsForm">
                            <div class="mb-3">
                                <label>ID</label>
                                <input type="text" id="detail_id" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" id="detail_name" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>ULID</label>
                                <input type="text" id="detail_ulid" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" id="detail_email" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" id="detail_address" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" id="detail_phone" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="text" id="detail_status" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Points Balance</label>
                                <input type="text" id="detail_points" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Royalty Balance</label>
                                <input type="text" id="detail_royalty" class="form-control" readonly>
                            </div>
                        </form> --}}
                        <form id="userDetailsForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>ID</label>
                                    <input type="text" id="detail_id" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" id="detail_name" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>ULID</label>
                                    <input type="text" id="detail_ulid" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="text" id="detail_email" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Royalty Balance</label>
                                    <input type="text" id="detail_royalty" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" id="detail_phone" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Status</label>
                                    <input type="text" id="detail_status" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Points Balance</label>
                                    <input type="text" id="detail_points" class="form-control" readonly>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
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

                    document.getElementById('detail_id').value = data.id;
                    document.getElementById('detail_name').value = data.name;
                    document.getElementById('detail_ulid').value = data.ulid;
                    document.getElementById('detail_email').value = data.email;
                    // document.getElementById('detail_address').value = data.address;
                    document.getElementById('detail_phone').value = data.phone;
                    document.getElementById('detail_status').value = data.status;
                    document.getElementById('detail_points').value = data.points_balance;
                    document.getElementById('detail_royalty').value = data.royalty_balance;
                })
                .catch(err => console.error(err));
        }
    </script>
@endpush
