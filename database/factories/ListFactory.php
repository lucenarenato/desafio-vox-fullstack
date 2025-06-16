<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ListModel;

class ListFactory extends Factory
{
    protected $model = ListModel::class;

    public function definition()
    {
        return [
            'list_order' => $this->faker->numberBetween(0, 5),
            'createdate' => $this->faker->dateTime()->format('Y-m-d H:i a'),
            'db_date' => now(),
            'title' => $this->faker->sentence(3),
            'list_timestamp' => now()->timestamp . '000',
        ];
    }
}
