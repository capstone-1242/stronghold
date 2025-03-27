<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'description'];

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function links(){
        return $this->hasMany(Link::class);
    }

}
