<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /** @use HasFactory<\Database\Factories\ResourceFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'url'];

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
