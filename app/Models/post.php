<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['title'];


    public function categories(){
        return $this->belongsTo(categories::class);
    }

    public function scopeLatestPost()
    {
        return $this->latest()->first();
    }
}
