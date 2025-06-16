<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Inserir grupo
        DB::table('groups')->insert([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Grupo1',
            'description' => 'teste grupo1'
        ]);

        // Inserir departamento
        DB::table('departments')->insert([
            'id' => 1,
            'name' => 'Developer',
            'owner_id' => 1,
            'group_id' => 1,
            'limit' => 62,
            'created_at' => '2025-06-16 01:36:38',
            'updated_at' => '2025-06-16 01:36:39',
        ]);

        // Inserir board
        DB::table('board')->insert([
            'id' => 2,
            'user_id' => 1,
            'boardTitle' => 'Projeto - 01',
            'is_starred' => true,
            'boardPrivacyType' => 'team',
            'created_at' => '2025-06-16 01:42:00',
            'updated_at' => '2025-06-16 01:42:01',
            'department_id' => 1,
            'owner_id' => 1,
        ]);

        // Inserir listas do board
        $lists = [
            [
                'id' => 4,
                'board_id' => 2,
                'user_id' => 1,
                'list_name' => 'going',
                'created_at' => '2025-06-16 05:11:05',
                'updated_at' => '2025-06-16 05:13:54',
            ],
            [
                'id' => 3,
                'board_id' => 2,
                'user_id' => 1,
                'list_name' => 'todo',
                'created_at' => '2025-06-16 05:10:37',
                'updated_at' => '2025-06-16 05:14:06',
            ],
            [
                'id' => 2,
                'board_id' => 2,
                'user_id' => 1,
                'list_name' => 'done',
                'created_at' => '2025-06-16 05:10:23',
                'updated_at' => '2025-06-16 05:14:18',
            ],
        ];
        DB::table('board_list')->insert($lists);

        // Inserir cards
        $cards = [
            [
                'id' => 10,
                'board_id' => 2,
                'user_id' => 1,
                'list_id' => 2,
                'card_title' => '`',
                'card_description' => 'dsdsadsa',
                'card_color' => 'C377E0',
                'due_date' => '1969-12-31 21:00:00',
                'created_at' => '2025-06-16 05:23:46',
                'updated_at' => '2025-06-16 06:54:36',
                'owner_id' => 1,
            ],
            [
                'id' => 3,
                'board_id' => 2,
                'user_id' => 1,
                'list_id' => 3,
                'card_title' => 'testando',
                'card_description' => 'testando',
                'card_color' => 'EB5A46',
                'due_date' => '2025-06-16 01:47:00',
                'created_at' => '2025-06-16 01:47:34',
                'updated_at' => '2025-06-16 07:32:09',
                'owner_id' => 1,
            ],
        ];
        DB::table('board_card')->insert($cards);

        // Inserir tags
        $tags = [
            [
                'id' => 4,
                'card_id' => 3,
                'tag_title' => 'tag-task',
                'created_at' => '2025-06-16 05:58:14',
                'updated_at' => '2025-06-16 05:58:14',
            ],
            [
                'id' => 5,
                'card_id' => 10,
                'tag_title' => 'teste',
                'created_at' => '2025-06-16 05:59:33',
                'updated_at' => '2025-06-16 05:59:33',
            ],
        ];
        DB::table('card_tag')->insert($tags);

        // Inserir tarefa
        DB::table('card_task')->insert([
            'id' => 1,
            'card_id' => 3,
            'task_title' => 'task-1',
            'is_completed' => false,
            'created_at' => '2025-06-16 01:49:54',
            'updated_at' => '2025-06-16 01:49:55',
            'owner_id' => 1,
        ]);

        // Inserir comentário
        DB::table('comment')->insert([
            'id' => 1,
            'card_id' => 3,
            'user_id' => 1,
            'comment_description' => 'comentario teste',
            'created_at' => '2025-06-16 01:48:17',
            'updated_at' => '2025-06-16 01:48:18',
        ]);
    }
}
