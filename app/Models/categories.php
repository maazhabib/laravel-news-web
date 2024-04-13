<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';

    use HasFactory;
    protected $fillable = [ 'categories_name', 'no_post'];

    public function post(){
        return $this->hasMany(Post::class);
    }

}
