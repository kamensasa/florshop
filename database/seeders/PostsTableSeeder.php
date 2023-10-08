<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['title' => 'Лилии',
            'content' => 'Lalalala',
            'code' => '2',
            'price' => '7500',
            'category_id' => 1,
            'image' => '///'],

            ['title' => 'Розы',
            'content' => 'Lalalala',
            'code' => '2',
            'price' => '7500',
            'category_id' => 1,
            'image' => '///'],

            ['title' => 'Розы',
            'content' => 'Lalalala',
            'code' => '2',
            'price' => '7500',
            'category_id' => 1,
            'image' => '///'],

            ['title' => 'Розы',
            'content' => 'Lalalala',
            'code' => '2',
            'price' => '7500',
            'category_id' => 1,
            'image' => '///'],
        ]);
    }
}
