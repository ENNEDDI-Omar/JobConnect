<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruiter_id',
        'representant_id',
        'name',
        'industry',
        'capital',
        'description',
        'location',

    ];

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function representative()
    {
        return $this->belongsTo(User::class, 'representant_id');
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

}
