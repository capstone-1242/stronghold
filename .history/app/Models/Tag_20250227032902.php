<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TestimonialVideo;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function resource(){
       return $this->hasMany(Resource::class );
    }

    public function memorial(){
        return $this->hasMany(memorial::class);
    }

    public function testimonial(){
        return $this->hasMany();
    }

    public function video(){
        return $this->belongsToMany(video::class);
    }

}
