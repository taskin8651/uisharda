<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_kicker',
        'story_title',
        'story_highlight',
        'story_description',

        'panel_title',
        'panel_subtitle',
        'panel_badge',

        'mission_title',
        'mission_description',

        'vision_title',
        'vision_description',

        'values_kicker',
        'values_title',
        'values_description',

        'process_kicker',
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