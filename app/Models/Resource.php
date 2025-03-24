<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /** @use HasFactory<\Database\Factories\ResourceFactory> */
    use HasFactory;

    protected $fillable = ['tag_id', 'title', 'description', 'url', 'number', 'user_id'];

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
