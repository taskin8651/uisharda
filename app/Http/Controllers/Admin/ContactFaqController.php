<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFaq;
use Illuminate\Http\Request;

class ContactFaqController extends Controller
{
    public function index()
    {
        $faqs = ContactFaq::orderBy('sort_order', 'asc')->get();

        return view('admin.contact-faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.contact-faqs.create');
    }

    public function store(Request $request)
    {
        ContactFaq::create([
            'question'   => $request->question,
            'answer'     => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.contact-faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit(ContactFaq $contactFaq)
    {
        return view('admin.contact-faqs.edit', compact('contactFaq'));
    }

    public function update(Request $request, ContactFaq $contactFaq)
    {
        $contactFaq->update([
            'question'   => $request->question,
            'answer'     => $request->answer,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.contact-faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(ContactFaq $contactFaq)
    {
        $contactFaq->delete();

        return redirect()
            ->route('admin.contact-faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }
}