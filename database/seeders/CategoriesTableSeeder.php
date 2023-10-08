<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Букеты', 'content' => 'Lalala', 'code' => '2'],
            ['title' => 'Композиции', 'content' => 'Lalalala', 'code' => '1'],
            ['title' => 'Цветы', 'content' => 'Lololo', 'code' => '3']
        ]);
    }
}
