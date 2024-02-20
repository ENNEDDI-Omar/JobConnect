<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'Author',
        'message',
    ];

    public function Company(){
        return $this->belongsTo(Company::class);
    }
}
