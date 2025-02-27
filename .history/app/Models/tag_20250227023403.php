<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function resource(){
        $this->hasMany(resource::class);
    }

    public function memorial(){
        $this->hasMany(memorial::class);
    }

    public function testimonial(){
        $this->hasMany(testimonial_video::class);
    }

    public function video(){
        $this->belongsToMany(video::class);
    }

}
