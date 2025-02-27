<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memorial extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialFactory> */
    use HasFactory;

    protected $fillable = ['name', 'biography', 'birth_year', 'death_year'];

    public function memorial_image(){
        $this->hasMany(memorial_image::class);
    }
}
