<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Label;

class LabelFactory extends Factory
{
    protected $model = Label::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'color' => $this->faker->randomElement(['green', 'red', 'blue', 'orange', 'purple', 'lightblue', 'lightgreen', 'darkblue']),
        ];
    }
}
