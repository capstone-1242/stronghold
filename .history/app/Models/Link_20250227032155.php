<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
       /** @use HasFactory<\Database\Factories\MemorialFactory> */
       use HasFactory;

       protected $fillable = ['url', 'title'];

       public function video(){
            return $this->belongsTo(Video::class);
       }


}
