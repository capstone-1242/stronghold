<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialVideo extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialVideoFactory> */
    use HasFactory;

    protected $fillable = ['url'];

    public function tag(){
        $this->belongsTo(tag::class);
    }

}
