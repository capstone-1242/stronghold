<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemorialImage extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialImageFactory> */
    use HasFactory;

    protected $table = 'memorial_images';
    protected $fillable = ['filename', 'description'];

}
