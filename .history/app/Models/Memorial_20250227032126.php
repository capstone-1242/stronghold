<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialFactory> */
    use HasFactory;


    protected $fillable = ['name', 'biography', 'birth_date', 'death_date'];


    public function user(){
       return $this->belongsToMany(User::class);
    }

    public function memorial_image(){
        return $this->hasMany(MemorialImage::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
