<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memorial_image extends Model
{
    /** @use HasFactory<\Database\Factories\MemorialImageFactory> */
    use HasFactory;

    protected $fillable = ['filename', 'description'];

    public function memorial(){
        return $this->belongsTo(memorial::class);
    }
}
