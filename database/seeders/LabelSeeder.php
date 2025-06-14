<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    public function run()
    {
        $labels = [
            ['id' => 1, 'title' => 'Copy Request', 'color' => 'green'],
            ['id' => 2, 'title' => 'One more step', 'color' => 'red'],
            ['id' => 3, 'title' => 'Priority', 'color' => 'blue'],
            ['id' => 4, 'title' => 'Design Team', 'color' => 'orange'],
            ['id' => 5, 'title' => 'Product Marketing', 'color' => 'purple'],
            ['id' => 6, 'title' => 'Help', 'color' => 'lightblue'],
            ['id' => 7, 'title' => 'Meeting', 'color' => 'lightgreen'],
            ['id' => 8, 'title' => 'Important', 'color' => 'darkblue'],
        ];

        foreach ($labels as $item) {
            Label::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
