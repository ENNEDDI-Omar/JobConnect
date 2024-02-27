<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Application extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'offer_id',
        'applied_at',
        'status',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addCoverLetter($coverLetter)
    {
        return $this->addMedia($coverLetter)
                    ->usingFileName('cover_letter')
                    ->toMediaCollection('cover_letters');
    }

    public function getCoverLetter()
    {
        return $this->getFirstMedia('cover_letters');
    }

    public function addResume($resume)
    {
        return $this->addMedia($resume)
                    ->usingFileName('resume')
                    ->toMediaCollection('resumes');
    }

    public function getResume()
    {
        return $this->getFirstMedia('resumes');
    }
}
