@extends('layouts.users')
@section('title', 'Team - Card View')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Team Members (Card View)</h3>

    <div class="row">
        @forelse($team as $member)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" class="card-img-top" alt="{{ $member->name }}" style="height: 250px; object-fit: cover;">
                @else
                <img src="https://via.placeholder.com/300x250" class="card-img-top" alt="No Image">
                @endif

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $member->name }}</h5>
                    <p class="card-text text-muted">{{ $member->designation }}</p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('teams.edit', $member->id) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                    <form action="{{ route('teams.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No team members found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection