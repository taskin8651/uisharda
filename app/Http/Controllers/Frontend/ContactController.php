<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\Industry;
use App\Models\WebsiteSetting;
use App\Models\ContactFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ContactController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::where('status', 1)->first();

        if (! $websiteSetting) {
            $websiteSetting = WebsiteSetting::firstOrCreate(
                ['id' => 1],
                [
                    'site_name' => 'Sharda Placement',
                    'site_tagline' => 'Preparing your experience…',
                    'phone' => '+91 99390 10504',
                    'email' => 'info@shardaplacement.in',
                    'whatsapp_number' => '919939010504',
                    'address' => 'F-17, 1st floor, Pushpanjali Complex, Boring Road, Patna, Bihar - 800004',
                    'location_short' => 'Patna',
                    'office_hours' => 'Mon–Sat: 10:00 AM – 7:00 PM',
                    'status' => 1,
                ]
            );
        }

        $industries = Industry::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

            $faqs = ContactFaq::active()
        ->orderBy('sort_order', 'asc')
        ->get();

        return view('frontend.contact', compact(
            'websiteSetting',
            'industries',
            'faqs'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'          => 'required|string|max:255',
            'mobile_number'      => 'required|string|max:30',
            'email'              => 'nullable|email|max:255',
            'user_type'          => 'required|string|max:255',
            'preferred_location' => 'nullable|string|max:255',
            'industry'           => 'nullable|string|max:255',
            'message'            => 'required|string',
            'resume'             => 'nullable|mimes:pdf,doc,docx|max:4096',
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
            'full_name'          => $request->full_name,
            'mobile_number'      => $request->mobile_number,
            'email'              => $request->email,
            'user_type'          => $request->user_type,
            'preferred_location' => $request->preferred_location,
            'industry'           => $request->industry,
            'message'            => $request->message,
            'resume'             => $resumeName,
            'status'             => 'new',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your details submitted successfully. Our team will contact you soon.');
    }
}