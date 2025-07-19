@extends('layouts.master')
@section('title')
All Login User
@endsection

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Login User</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->

</nav>
@endsection
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped align-middle">
                    <thead class="bg-secondary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($totaluser as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->dob)->format('d-M-Y') }}</td>
                            <td>{{ $user->city }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection