@extends('layouts.master')

@section('title', 'Manage FAQs')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form id="faqForm" action="{{ isset($faq) ? route('faqs.update', $faq) : route('faqs.store') }}" method="POST">
                @csrf
                @if(isset($faq)) @method('PUT') @endif

                <input type="hidden" name="is_edit" value="{{ isset($faq) ? '1' : '0' }}">
                <input type="hidden" id="faq_id" value="{{ $faq->id ?? '' }}">

                <div class="mb-3">
                    <label>Question</label>
                    <input type="text" name="question" id="question" value="{{ $faq->question ?? '' }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Answer</label>
                    <textarea name="answer" id="answer" class="form-control" rows="5">{{ $faq->answer ?? '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($faq) ? 'Update' : 'Save' }}</button>
            </form>

            <div id="messageBox" class="mt-3"></div>
        </div>
    </div>
</div>


</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('scripts')
<script>
    $(document).ready(function() {
        $('#faqForm').submit(function(e) {
            e.preventDefault();

            let isEdit = $('input[name="is_edit"]').val() === '1';
            let url = isEdit ? "{{ url('faqs') }}/" + $('#faq_id').val() : "{{ route('faqs.store') }}";
            let method = isEdit ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: method,
                    question: $('#question').val(),
                    answer: $('#answer').val()
                },
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        $('#messageBox').html('<div class="alert alert-success">Saved successfully!</div>');
                        $('#faqForm')[0].reset();
                    }
                },

                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorHtml = '<div class="alert alert-danger"><ul>';
                    $.each(errors, function(key, value) {
                        errorHtml += '<li>' + value + '</li>';
                    });
                    errorHtml += '</ul></div>';
                    $('#messageBox').html(errorHtml);
                }
            });
        });
    });
</script>

@endsection