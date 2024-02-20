<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'Industry',
        'Location',
        'Description',
    ];

    public function testimonials(){
        return $this->hasMany(Testimonial::class);
    }

}
