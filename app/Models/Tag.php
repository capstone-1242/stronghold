<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function resources(){
       return $this->hasMany(Resource::class );
    }

    public function memorials(){
        return $this->hasMany(Memorial::class);
    }

    public function testimonials(){
        return $this->hasMany(TestimonialVideo::class);
    }

    public function videos(){
        return $this->belongsToMany(Video::class);
    }

}
