<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ 'first_name', 'last_name', 'role', 'email', 'email_verified_at', 'password', 'remember_token'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function resources(){
        return $this->hasMany(Resource::class);
    }

    public function testimonialVideos(){
        return $this->hasMany(TestimonialVideo::class);
    }

    public function memorials(){
        return $this->hasMany(Memorial::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
}
