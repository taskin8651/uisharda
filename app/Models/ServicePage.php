<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge_icon',
        'hero_badge_text',
        'hero_title',
        'hero_highlight',
        'hero_description',
        'hero_breadcrumb_title',
        'hero_card_title',
        'hero_card_subtitle',
        'hero_stat_1_value',
        'hero_stat_1_label',
        'hero_stat_2_value',
        'hero_stat_2_label',
        'hero_support_title',
        'hero_support_text',
        'hero_button_text',
        'hero_button_link',

        'featured_badge_icon',
        'featured_badge_text',
        'featured_title',
        'featured_description',
        'featured_button_1_text',
        'featured_button_1_link',
        'featured_button_2_text',
        'featured_button_2_link',
        'featured_stat_1_value',
        'featured_stat_1_label',
        'featured_stat_2_value',
        'featured_stat_2_label',
        'featured_stat_3_value',
        'featured_stat_3_label',

        'process_eyebrow',
        'process_title',
        'process_description',

        'cta_title',
        'cta_description',
        'cta_button_1_text',
        'cta_button_1_link',
        'cta_button_2_text',
        'cta_button_2_link',

        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}