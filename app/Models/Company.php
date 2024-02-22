<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

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
