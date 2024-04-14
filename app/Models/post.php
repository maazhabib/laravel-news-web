<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class post extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'title',
            'description',
            'categories_id',
            'author_id',
            'post_date',
            'image',
        ];

//    search filter
    function scopeSearch($query, $request)
    {
        if ($request->title != null) {
            $query->where('title', 'like', "%{$request->title}%");
        }

        return $query;
    }


    public function categories(){
        return $this->belongsTo(categories::class);
    }

    public function scopeLatestPost()
    {
        return $this->latest()->first();
    }
}
