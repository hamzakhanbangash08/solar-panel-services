@extends('layouts.master')
@section('title', 'Faqs')

@section('pageTitle')
<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
    <ol class="breadcrumb flex-grow-1">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Faqs</li>
    </ol>
    <!-- Optional: Right-aligned content (e.g., a button) -->
    <div class="ms-auto">

        <a href="{{ route('faqs.create') }}" class="text-decoration-none addtocart rounded p-1 text-white">Create Faqs</a>
    </div>
</nav>
@endsection
@section('content')
<div class="container">
    <h3>FAQs</h3>
    <div id="faqTableContainer">
        @include('admin.faqs.partials.table')
    </div>
</div>
@endsection

@section('scripts')
<script>
    function loadFaqs(page = 1) {
        $.get(`{{ route('faqs.index') }}?page=${page}`, function(data) {
            $('#faqTableContainer').html(data);
        });
    }

    // Handle pagination click
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const page = $(this).attr('href').split('page=')[1];
        loadFaqs(page);
    });
</script>
@endsection