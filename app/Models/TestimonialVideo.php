<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialVideo extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialVideoFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'url', 'title', 'description', 'tag_id'];

    public function tag(){
       return $this->belongsTo(tag::class);
    }
    

    public function user(){
        return $this->belongsTo(User::class);
    }
}
