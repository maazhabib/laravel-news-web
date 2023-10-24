<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CategoriesFactory extends Factory
{
    protected $model = categories::class;

    public function definition()
    {
        return [
                'categories_name'   => Str::random(10),
                'no_post'           => 0,
        ];
    }
   
}
