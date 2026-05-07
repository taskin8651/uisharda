<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPage extends Model
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
        'hero_tip_title',
        'hero_tip_text',
        'hero_button_text',
        'hero_button_link',

        'filter_title_placeholder',
        'filter_location_placeholder',
        'filter_button_text',
        'filter_chips',

        'sidebar_badge_icon',
        'sidebar_badge_text',
        'sidebar_title',
        'sidebar_description',
        'sidebar_points',
        'sidebar_button_text',
        'sidebar_button_link',
        'sidebar_footer_text',

        'tips_title',
        'candidate_tips',

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

    public function getFilterChipsArrayAttribute()
    {
        return $this->linesToArray($this->filter_chips);
    }

    public function getSidebarPointsArrayAttribute()
    {
        return $this->linesToArray($this->sidebar_points);
    }

    public function getCandidateTipsArrayAttribute()
    {
        return $this->linesToArray($this->candidate_tips);
    }

    private function linesToArray($value): array
    {
        if (!$value) {
            return [];
        }

        return array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $value)));
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