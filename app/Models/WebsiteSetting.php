<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'site_tagline',

        'phone',
        'email',
        'whatsapp_number',
        'address',
        'location_short',
        'office_hours',

        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'whatsapp_url',

        'topbar_button_text',
        'topbar_button_link',

        'nav_button_1_text',
        'nav_button_1_link',
        'nav_button_2_text',
        'nav_button_2_link',

        'footer_about_text',
        'newsletter_title',
        'newsletter_text',
        'newsletter_placeholder',
        'privacy_text',
        'copyright_text',

        'google_map_embed',

        'default_meta_title',
        'default_meta_description',
        'default_meta_keywords',

        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('website_logo')->singleFile();
        $this->addMediaCollection('website_favicon')->singleFile();
    }

    public function getLogoUrlAttribute()
    {
        return $this->getFirstMediaUrl('website_logo') ?: asset('assets/img/logo.png');
    }

    public function getFaviconUrlAttribute()
    {
        return $this->getFirstMediaUrl('website_favicon') ?: asset('assets/img/logo.png');
    }

    public function getPhoneLinkAttribute()
    {
        return $this->phone
            ? 'tel:' . preg_replace('/\s+/', '', $this->phone)
            : '#';
    }

    public function getEmailLinkAttribute()
    {
        return $this->email ? 'mailto:' . $this->email : '#';
    }

    public function getWhatsappLinkAttribute()
    {
        if ($this->whatsapp_url) {
            return $this->whatsapp_url;
        }

        if ($this->whatsapp_number) {
            $number = preg_replace('/\D+/', '', $this->whatsapp_number);
            return 'https://wa.me/' . $number;
        }

        return '#';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}