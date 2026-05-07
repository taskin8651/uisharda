@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">
            Manage logo, favicon, contact details, social links, footer, map and SEO
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.website-settings.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- BRANDING --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div>
                    <p class="form-card-title">Branding</p>
                    <p class="form-card-subtitle">Website name, logo and favicon</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Site Name</label>
                    <input type="text" name="site_name" class="field-input"
                           value="{{ old('site_name', $setting->site_name) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Site Tagline</label>
                    <input type="text" name="site_tagline" class="field-input"
                           value="{{ old('site_tagline', $setting->site_tagline) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Logo</label>
                    <input type="file" name="logo" class="field-input" accept="image/*">

                    <div style="margin-top:12px;">
                        <img src="{{ $setting->logo_url }}"
                             alt="Logo"
                             style="height:55px; background:#f8fafc; padding:8px; border-radius:10px;">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Favicon</label>
                    <input type="file" name="favicon" class="field-input" accept="image/*">

                    <div style="margin-top:12px;">
                        <img src="{{ $setting->favicon_url }}"
                             alt="Favicon"
                             style="height:42px; width:42px; object-fit:contain; background:#f8fafc; padding:6px; border-radius:10px;">
                    </div>
                </div>

            </div>
        </div>

        {{-- CONTACT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <div>
                    <p class="form-card-title">Contact Details</p>
                    <p class="form-card-subtitle">Topbar, footer and contact page details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Phone</label>
                    <input type="text" name="phone" class="field-input"
                           value="{{ old('phone', $setting->phone) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Email</label>
                    <input type="email" name="email" class="field-input"
                           value="{{ old('email', $setting->email) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" class="field-input"
                           value="{{ old('whatsapp_number', $setting->whatsapp_number) }}"
                           placeholder="919939010504">
                </div>

                <div class="field-group">
                    <label class="field-label">Short Location</label>
                    <input type="text" name="location_short" class="field-input"
                           value="{{ old('location_short', $setting->location_short) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Office Hours</label>
                    <input type="text" name="office_hours" class="field-input"
                           value="{{ old('office_hours', $setting->office_hours) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Full Address</label>
                    <textarea name="address" rows="4" class="field-input">{{ old('address', $setting->address) }}</textarea>
                </div>

            </div>
        </div>

        {{-- SOCIAL --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-share-alt"></i>
                </div>
                <div>
                    <p class="form-card-title">Social Links</p>
                    <p class="form-card-subtitle">Topbar and footer social icons</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Facebook URL</label>
                    <input type="text" name="facebook_url" class="field-input"
                           value="{{ old('facebook_url', $setting->facebook_url) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Instagram URL</label>
                    <input type="text" name="instagram_url" class="field-input"
                           value="{{ old('instagram_url', $setting->instagram_url) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" class="field-input"
                           value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp URL</label>
                    <input type="text" name="whatsapp_url" class="field-input"
                           value="{{ old('whatsapp_url', $setting->whatsapp_url) }}">
                </div>

            </div>
        </div>

        {{-- HEADER BUTTONS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-mouse-pointer"></i>
                </div>
                <div>
                    <p class="form-card-title">Header Buttons</p>
                    <p class="form-card-subtitle">Topbar CTA and navbar buttons</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Topbar Button Text</label>
                    <input type="text" name="topbar_button_text" class="field-input"
                           value="{{ old('topbar_button_text', $setting->topbar_button_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Topbar Button Link</label>
                    <input type="text" name="topbar_button_link" class="field-input"
                           value="{{ old('topbar_button_link', $setting->topbar_button_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Navbar Button 1 Text</label>
                    <input type="text" name="nav_button_1_text" class="field-input"
                           value="{{ old('nav_button_1_text', $setting->nav_button_1_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Navbar Button 1 Link</label>
                    <input type="text" name="nav_button_1_link" class="field-input"
                           value="{{ old('nav_button_1_link', $setting->nav_button_1_link) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Navbar Button 2 Text</label>
                    <input type="text" name="nav_button_2_text" class="field-input"
                           value="{{ old('nav_button_2_text', $setting->nav_button_2_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Navbar Button 2 Link</label>
                    <input type="text" name="nav_button_2_link" class="field-input"
                           value="{{ old('nav_button_2_link', $setting->nav_button_2_link) }}">
                </div>

            </div>
        </div>

        {{-- FOOTER --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <div>
                    <p class="form-card-title">Footer Content</p>
                    <p class="form-card-subtitle">Footer about, newsletter and copyright</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Footer About Text</label>
                    <textarea name="footer_about_text" rows="5" class="field-input">{{ old('footer_about_text', $setting->footer_about_text) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Newsletter Title</label>
                    <input type="text" name="newsletter_title" class="field-input"
                           value="{{ old('newsletter_title', $setting->newsletter_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Newsletter Text</label>
                    <textarea name="newsletter_text" rows="4" class="field-input">{{ old('newsletter_text', $setting->newsletter_text) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Newsletter Placeholder</label>
                    <input type="text" name="newsletter_placeholder" class="field-input"
                           value="{{ old('newsletter_placeholder', $setting->newsletter_placeholder) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Privacy Text</label>
                    <input type="text" name="privacy_text" class="field-input"
                           value="{{ old('privacy_text', $setting->privacy_text) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Copyright Text</label>
                    <input type="text" name="copyright_text" class="field-input"
                           value="{{ old('copyright_text', $setting->copyright_text) }}">
                </div>

            </div>
        </div>

        {{-- MAP + SEO --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div>
                    <p class="form-card-title">Map & SEO</p>
                    <p class="form-card-subtitle">Google map embed and default SEO</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Google Map Embed</label>
                    <textarea name="google_map_embed" rows="5" class="field-input"
                              placeholder="<iframe ...></iframe>">{{ old('google_map_embed', $setting->google_map_embed) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Default Meta Title</label>
                    <input type="text" name="default_meta_title" class="field-input"
                           value="{{ old('default_meta_title', $setting->default_meta_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Default Meta Description</label>
                    <textarea name="default_meta_description" rows="4" class="field-input">{{ old('default_meta_description', $setting->default_meta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Default Meta Keywords</label>
                    <textarea name="default_meta_keywords" rows="3" class="field-input">{{ old('default_meta_keywords', $setting->default_meta_keywords) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $setting->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1"
                               {{ old('status', $setting->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Enable Website Settings</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            Save Settings
        </button>
    </div>
</form>

@endsection