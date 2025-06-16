<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    public function run()
    {
        $cards = [
            [
                'id' => 225,
                'title' => 'New Card',
                'description' => null,
                'label_title' => 'Priority',
                'label_color' => 'blue',
                'list_title' => 'Board List',
                'card_order' => 0,
                'list_id' => '1',
                'list_id_fk' => 1, // Nova coluna obrigatória
                'label_id' => 3,
                'due_date' => '2024-08-06',
                'card_timestamp' => '1628020875002',
                'archive_class' => '',
                'create_date' => '2024-08-03 22:01PM',
                'card_attachment' => null,
                'labels_string' => 'One more step,?;.|fasl&;|,red,?;.|fasl&;|,2?|s3atbbt7sl;.|/|:=?|Priority,?;.|fasl&;|,blue,?;.|fasl&;|,3?|s3atbbt7sl;.|/|:=?|',
                'checklist_string' => 'tested1,?;.|fasl&;|,1,?;.|fasl&;|,?|s3atbbt7sl;.|/|:=?|tested1,?;.|fasl&;|,2?|s3atbbt7sl;.|/|:=?|',
                'is_complete' => 0
            ],
            [
                'id' => 226,
                'title' => 'test card',
                'description' => null,
                'label_title' => '',
                'label_color' => '',
                'list_title' => 'Board List',
                'card_order' => 1,
                'list_id_fk' => 1,
                'label_id' => 3,
                'due_date' => '2024-08-06',
                'card_timestamp' => '1628020888633',
                'archive_class' => '',
                'create_date' => '2024-08-03 22:01PM',
                'card_attachment' => null,
                'labels_string' => '',
                'checklist_string' => null,
                'is_complete' => 1
            ],
            // Adicione os outros cards da mesma forma...
            // (Para não ficar muito longo, incluí apenas dois exemplos)

        ];

        foreach ($cards as $card) {
            Card::updateOrCreate(['id' => $card['id']], $card);
        }
    }
}
