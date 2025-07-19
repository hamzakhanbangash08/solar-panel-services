@extends('layouts.master') {{-- ya aapka admin layout file --}}

@section('title')
Complaints Box
@endsection

@section('styles')
<style>

</style>
@endsection

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Complaint Box</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->

</nav>
@endsection
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped align-middle text-center">
                    <thead class="bg-secondary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Phone</th>
                            <th>Complaint</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complain as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>

                        </tr>
                        @endforeach

                        @if($complain->isEmpty())
                        <tr>
                            <td colspan="7" class="text-muted">No complaints found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection