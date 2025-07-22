@extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')

@session('success')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endsession

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-3 fs-3" style="font-weight: 500;">All Registered Members</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-2" style="width: 10px;">#</th>
                            <th class="py-2">Full Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">ulid</th>
                            <th class="py-2">Phone</th>
                            <th class="py-2">sponsor id</th>
                            <th class="py-2">Registered At</th>
                            <th class="py-2">Status</th>
                            <th class="py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $index => $user)
                        <tr>
                            <td class="align-middle" style="width: 10px;">{{ $index + 1 }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ $user->ulid ?? '-' }}</td>
                            <td class="align-middle">{{ $user->phone ?? '-' }}</td>
                            <td class="align-middle">{{ $user->sponsor_id ?? '-' }}</td>
                            <td class="align-middle">
                                {{ $user->created_at ? $user->created_at->format('d-m-Y h:i A') : '-' }}
                            </td>
                            <td class="align-middle">
                                <span class="badge 
                                                    @if($user->status == 'active') bg-success
                                                    @elseif($user->status == 'pending') bg-warning text-dark
                                                    @elseif($user->status == 'inactive') bg-secondary
                                                    @else bg-info @endif">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.editmember', $user->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.deletemember', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this member?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-3 py-3">
                {{ $member->links('vendor.pagination.custom-bootstrap') }}
            </div>

        </div>
    </div>
</div>

<style>
    .table {
    font-size: 14px;
    min-width: 1000px; 
}

    .table th {
        font-weight: 500;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.5px;
    }

    .badge {
        padding: 5px 8px;
        font-weight: 500;
        font-size: 12px;
    }

    .card {
        border: none;
        border-radius: 8px;
    }

    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 8px 8px 0 0 !important;
    }

    .pagination .page-item .page-link {
        color: #0d6efd;
        border: 1px solid #dee2e6;
        margin: 0 2px;
        border-radius: 4px;
    }

    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        color: white;
        border-color: #0d6efd;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }
    .table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    display: block;
}

</style>
@endsection