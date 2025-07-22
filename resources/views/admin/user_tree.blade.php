<!-- @extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')
    <div class="container mt-4">
        <h2>User Tree for: {{ $admin->name }}</h2>
        <pre style="background: #f9f9f9; padding: 10px; font-family: monospace; white-space: pre-wrap;">
            {{ $treeText }}
        </pre>
    </div>
@endsection -->

@extends('layouts.layout')
@section('title', 'User Tree')

@section('container')


    <style>
        .tree,
        .tree ul {
            list-style-type: none;
            padding-left: 20px;
        }

        .tree li {
            margin: 5px 0;
        }

        .toggle-icon {
            width: 20px;
            display: inline-block;
            cursor: pointer;
            color: #6c63ff;
        }

        .node-label {
            background: #007bff;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
            margin-left: 5px;
            cursor: pointer;
        }

        .nested {
            display: none;
        }

        .tree-container {
            max-height: 600px;
            overflow-y: auto;
        }
    </style>

    <div class="container mt-4">
        <h2>User Tree for: {{ $admin->name }}</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        Network Tree
                    </div>
                    <div class="card-body tree-container">
                        {!! $treeText !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        User Details
                    </div>
                    <div class="card-body">
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


    <script>
        function toggleNode(el) {
            const li = el.closest('li');
            const nested = li.querySelector('ul.nested');

            if (nested) {
                if (nested.style.display === "block") {
                    nested.style.display = "none";
                    el.textContent = "➕";
                } else {
                    nested.style.display = "block";
                    el.textContent = "➖";
                }
            }
        }

        function loadUserDetails(ulid) {
            fetch('/admin/get-user-details/' + ulid)
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
                    document.getElementById('detail_address').value = data.address;
                    document.getElementById('detail_phone').value = data.phone;
                    document.getElementById('detail_status').value = data.status;
                    document.getElementById('detail_points').value = data.points_balance;
                    document.getElementById('detail_royalty').value = data.royalty_balance;
                });
        }
    </script>

@endsection