<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_type_icon',
        'job_type',
        'location',
        'title',
        'industry',
        'experience',
        'skills',
        'salary',
        'posted_text',
        'responsibilities',
        'requirements',
        'apply_button_text',
        'apply_link',
        'how_to_apply_title',
        'how_to_apply_text',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function getResponsibilitiesArrayAttribute()
    {
        return $this->linesToArray($this->responsibilities);
    }

    public function getRequirementsArrayAttribute()
    {
        return $this->linesToArray($this->requirements);
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