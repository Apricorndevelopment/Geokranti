@extends('layouts.layout')
@section('title', 'Dashboard')
@section('container')

    <div class="container mt-4">
        <h2 class="mb-3">Edit Member details</h2>
        <form action="{{ route('admin.updatemember', $member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control p-3" id="name" name="name" value="{{ old('name', $member->name)}}"
                    required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control p-3" id="email" name="email" value="{{ old('email', $member->email)}}"
                    required>
                     @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control p-3" id="phone" name="phone" value="{{ old('phone', $member->phone)}}">
                @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control p-3" id="address" name="address" value="{{ old('address', $member->address)}}">
                @error('address')
                         <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="state" class="form-label">City/State</label>
                <input type="text" class="form-control p-3" id="state" name="state" value="{{ old('state', $member->state)}}">
                @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="sponsor_id" class="form-label">Sponsor ID</label>
                <input type="text" class="form-control p-3" id="sponsor_id" name="sponsor_id"
                    value="{{ old('sponsor_id', $member->sponsor_id)}}">
            </div>
            <div class="mb-2">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" {{ $member->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $member->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Member</button>
            <a href="{{ route('admin.viewmember') }}" class="btn btn-secondary">Back to Members</a>
        </form>
    </div>

@endsection