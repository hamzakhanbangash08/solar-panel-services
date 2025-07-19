@extends('layouts.master') {{-- Adjust layout as per your project --}}
@section('title', 'Team Members')

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Team</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->
    <div class="ms-auto">

        <a href="{{ route('teams.create') }}" class="text-decoration-none addtocart rounded p-1 text-white">Create Team</a>

    </div>
</nav>
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($team as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="Profile" width="60" height="60" class="rounded-circle" style="object-fit: cover;">
                            @else
                            <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->designation }}</td>
                        <td>
                            <a href="{{ route('teams.edit', $member->id) }}" class="btn btn-sm btn-primary me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('teams.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No team members found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



</div>
@endsection