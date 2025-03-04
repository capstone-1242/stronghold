<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'author_first_name', 'author_last_name', 'author_description', 'url'];

    public function links(){
        return $this->hasMany(Link::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


}
