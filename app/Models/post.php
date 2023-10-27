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
<<<<<<< HEAD
    
=======

>>>>>>> 03ec7845ace75859c66183742404d4852c5e0573
    public function scopeLatestPost()
    {
        return $this->latest()->first();
    }
}
