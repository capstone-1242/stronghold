<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemorialImage extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialImageFactory> */
    use HasFactory;
    protected $fillable = ['memorial_id', 'filename', 'description'];

    public function memorial(){
        return $this->belongsTo(Memorial::class);
    }

}
