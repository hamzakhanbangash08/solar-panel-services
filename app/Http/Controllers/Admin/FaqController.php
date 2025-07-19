<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;


class FaqController extends Controller
{
    protected $request;
    protected $faq;

    public function __construct(Request $request, Faqs $faq)
    {
        $this->request = $request;
        $this->faq = $faq;
    }

    // List all FAQs (admin panel or AJAX response)
    public function index(Request $request)
    {
        $faqs = $this->faq::latest()->paginate(5);

        // If AJAX, return partial view only
        if ($request->ajax()) {
            return view('admin.faqs.partials.table', compact('faqs'))->render();
        }

        // Otherwise load full view
        return view('admin.faqs.index', compact('faqs'));
    }



    function create()
    {
        return view('admin.faqs.create');
    }

    // Create new FAQ
    public function store()
    {
        $data = $this->request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq = $this->faq->create($data);

        if ($this->request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('faqs.index')
            ]);
        }

        return redirect()->route('faqs.index')->with('success', 'FAQ created.');
    }


    public function edit($id)
    {
        $faq = $this->faq::findOrFail($id);
        return view('admin.faqs.create', compact('faq'));
    }
    // Update FAQ
    // update()
    public function update($id)
    {
        $faq = $this->faq::findOrFail($id);

        $data = $this->request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $faq->update($data);

        if ($this->request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('faqs.index')
            ]);
        }

        return redirect()->route('faqs.index')->with('success', 'FAQ updated.');
    }
    // Delete FAQ
    public function destroy($id)
    {
        $this->faq::destroy($id);

        if ($this->request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('faqs.index')
            ]);
        }

        return redirect()->route('faqs.index')->with('success', 'FAQ Deleted Successfully.');
    }

    // Search FAQ (public side, live search)
    public function search()
    {
        $query = $this->request->get('q');
        $faqs =  $this->faq::where('question', 'like', "%{$query}%")->get();

        return response()->json($faqs);
    }
}
