<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialFactory> */
    use HasFactory;

    protected $table = 'memorials';

    protected $fillable = ['name', 'biography', 'birth_date', 'death_date'];


}
