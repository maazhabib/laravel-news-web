<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    protected $model = Categories::class;

    public function definition()
    {
        return [
            'categories_name' => $this->faker->word,
            'no_post' => 200,
        ];
    }
}
