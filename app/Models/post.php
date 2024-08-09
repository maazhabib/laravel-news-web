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


    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(categories::class, 'categories_id', 'id');
    }

    public function scopeLatestPost()
    {
        return $this->latest()->first();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
