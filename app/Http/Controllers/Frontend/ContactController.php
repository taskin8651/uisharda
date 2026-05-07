<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        $industries = Industry::active()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.contact', compact('industries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'user_type' => 'required|string|max:255',
            'preferred_location' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'message' => 'required|string',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:4096',
        ]);

        $resumeName = null;

        if ($request->hasFile('resume')) {
            $uploadPath = public_path('uploads/resumes');

            if (! File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $file = $request->file('resume');
            $resumeName = 'resume-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $resumeName);
        }

        ContactInquiry::create([
            'full_name' => $request->full_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'preferred_location' => $request->preferred_location,
            'industry' => $request->industry,
            'message' => $request->message,
            'resume' => $resumeName,
            'status' => 'new',
        ]);

        return back()->with('success', 'Your details submitted successfully. Our team will contact you soon.');
    }
}