<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialVideo extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialVideoFactory> */
    use HasFactory;

    protected $fillable = ['url', 'title', 'description'];

    public function tag(){
       return $this->belongsTo(tag::class);
    }
    

    public function user(){
        return $this->belongsTo(User::class);
    }
}
