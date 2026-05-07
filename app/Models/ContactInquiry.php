<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'mobile_number',
        'email',
        'user_type',
        'preferred_location',
        'industry',
        'message',
        'resume',
        'status',
        'admin_note',
    ];

    public function getResumeUrlAttribute()
    {
        return $this->resume ? asset('uploads/resumes/' . $this->resume) : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}