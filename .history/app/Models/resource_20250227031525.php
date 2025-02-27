<?php

use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /** @use HasFactory<\Database\Factories\ResourceFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'url'];

    public function tag(){
        $this->belongsToMany(tag::class);
    }
}
