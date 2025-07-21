<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($faqs as $faq)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $faq->question }}</td>
            <td>{{ Str::limit($faq->answer, 100) }}</td>
            <td>
                <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form id="delete-form-{{ $faq->id }}" action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                <button onclick="confirmDelete({{ $faq->id }})" class="btn btn-danger">Delete</button>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No FAQs found.</td>
        </tr>
        @endforelse
    </tbody>
</table>


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

<!-- <div class="d-flex justify-content-center">
    {{ $faqs->links() }}
</div> -->