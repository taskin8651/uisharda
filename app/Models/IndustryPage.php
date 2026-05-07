<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'grid_eyebrow',
        'grid_title',
        'grid_description',
        'grid_button_1_text',
        'grid_button_1_link',
        'grid_button_2_text',
        'grid_button_2_link',

        'detail_eyebrow',
        'detail_title',
        'detail_description',

        'process_eyebrow',
        'process_title',
        'process_description',

        'cta_title',
        'cta_description',
        'cta_button_1_text',
        'cta_button_1_link',
        'cta_button_2_text',
        'cta_button_2_link',

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