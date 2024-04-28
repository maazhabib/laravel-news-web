<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'                 => $this->faker->name,
            'description'           => $this->faker->text,
            'author_id'             => '1',
            'post_date'             => Carbon::now(),
            'image'                 => 'https://picsum.photos/200',

        ];
    }
}
