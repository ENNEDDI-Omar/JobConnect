<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'description',
        'phone',
    
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }


    /////////configuration des roles////
    protected function getIsAdminAttribute()
    {
        return $this->role && $this->role->name === 'Admin';
    }
    

    /**
     * Accessor for isUser.
     */
    protected function getIsUserAttribute()
    {
        return $this->role && $this->role->name === 'User';
    }

    /**
     * Accessor for isRecruiter.
     */
    protected function getIsRecruiterAttribute()
    {
        return $this->role && $this->role->name === 'Recruiter';
    }

    /**
     * Accessor for isRepresentant.
     */
    protected function getIsRepresentantAttribute()
    {
        return $this->role && $this->role->name === 'Representant';
    }

    

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function companyRepresented(): HasOne
    {
        return $this->hasOne(Company::class, 'representant_id');
    }

    
    public function companyRecruiter(): HasOne
    {
        return $this->hasOne(Company::class, 'recruiter_id');
    }
}
