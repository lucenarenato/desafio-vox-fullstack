<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Card;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->optional()->paragraph(),
            'label_title' => '',
            'label_color' => '',
            'list_title' => $this->faker->word,
            'card_order' => $this->faker->numberBetween(0, 10),
            'list_id' => $this->faker->numberBetween(1, 5),
            'due_date' => $this->faker->optional()->date(),
            'card_timestamp' => now()->timestamp . '000',
            'archive_class' => '',
            'create_date' => now()->format('Y-m-d h:i A'),
            'card_attachment' => $this->faker->optional()->url,
            'labels_string' => '',
            'checklist_string' => $this->faker->optional()->text(),
            'is_complete' => $this->faker->boolean,
        ];
    }
}
