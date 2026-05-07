<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'slug',
        'subtitle',

        'detail_badge_icon',
        'detail_badge_text',
        'detail_chip_icon',
        'detail_chip_text',
        'detail_title',
        'detail_description',

        'button_text',
        'button_link',
        'job_button_text',
        'job_button_link',

        'sort_order',
        'is_special',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_special' => 'boolean',
        'status' => 'boolean',
    ];

    public function roles()
    {
        return $this->hasMany(IndustryRole::class)->orderBy('sort_order');
    }

    public function activeRoles()
    {
        return $this->hasMany(IndustryRole::class)
            ->where('status', 1)
            ->orderBy('sort_order');
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