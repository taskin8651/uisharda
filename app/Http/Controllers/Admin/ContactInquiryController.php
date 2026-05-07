<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    public function index()
    {
        $inquiries = ContactInquiry::latest()->get();

        return view('admin.contact-inquiries.index', compact('inquiries'));
    }

    public function show(ContactInquiry $contactInquiry)
    {
        return view('admin.contact-inquiries.show', compact('contactInquiry'));
    }

    public function update(Request $request, ContactInquiry $contactInquiry)
    {
        $contactInquiry->update([
            'status' => $request->status,
            'admin_note' => $request->admin_note,
        ]);

        return redirect()
            ->route('admin.contact-inquiries.show', $contactInquiry->id)
            ->with('success', 'Inquiry updated successfully.');
    }

    public function destroy(ContactInquiry $contactInquiry)
    {
        $contactInquiry->delete();

        return redirect()
            ->route('admin.contact-inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }
}