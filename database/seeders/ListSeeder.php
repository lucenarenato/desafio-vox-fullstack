<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ListModel;

class ListSeeder extends Seeder
{
    public function run()
    {
        $lists = [
            ['id' => 1, 'list_order' => 0, 'createdate' => '7/10/2024 8:59 am', 'db_date' => '2024-07-10 06:59:06', 'title' => 'Board List', 'list_timestamp' => null],
            ['id' => 2, 'list_order' => 1, 'createdate' => '7/10/2024 8:59 am', 'db_date' => '2024-07-10 06:59:06', 'title' => 'To Do', 'list_timestamp' => null],
            ['id' => 3, 'list_order' => 2, 'createdate' => '7/10/2024 8:59 am', 'db_date' => '2024-07-10 06:59:06', 'title' => 'Pending', 'list_timestamp' => null],
            ['id' => 6, 'list_order' => 5, 'createdate' => '8/1/2024 17:58PM', 'db_date' => '2024-08-01 15:58:03', 'title' => 'myList', 'list_timestamp' => '1627833483024'],
            ['id' => 7, 'list_order' => 1, 'createdate' => '8/3/2024 19:22PM', 'db_date' => '2024-08-03 17:22:05', 'title' => 'test', 'list_timestamp' => '1628011325595'],
        ];

        foreach ($lists as $item) {
            ListModel::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
