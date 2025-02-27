<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function resource(){
       return $this->hasMany(Resource::class );
    }

    public function memorial(){
        return $this->hasMany(Memorial::class);
    }

    public function testimonial(){
        return $this->hasMany(TestimonialVideo::class);
    }

    public function video(){
        return $this->belongsToMany(Video::class);
    }

}
