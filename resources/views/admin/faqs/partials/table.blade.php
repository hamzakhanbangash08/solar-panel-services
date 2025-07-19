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
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Faq?');">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No FAQs found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- <div class="d-flex justify-content-center">
    {{ $faqs->links() }}
</div> -->