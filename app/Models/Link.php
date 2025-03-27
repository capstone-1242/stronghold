<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
       /** @use HasFactory<\Database\Factories\MemorialFactory> */
       use HasFactory;

       protected $fillable = ['url', 'title', 'author_id'];

       public function author(){
            return $this->belongsTo(Author::class);
       }

}
