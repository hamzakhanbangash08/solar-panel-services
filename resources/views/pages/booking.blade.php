@extends('layouts.master')

@section('title', 'Book Consultation - Solar Panel Services')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Book a Consultation</h1>
    <p>Please fill in the form below and we will contact you to schedule a free consultation.</p>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Full Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Your Name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="service" class="form-label">Interested Service:</label>
            <select class="form-control" id="service">
                <option>Residential Installation</option>
                <option>Commercial Setup</option>
                <option>System Maintenance</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection