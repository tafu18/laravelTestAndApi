<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Fruit',
            ],
            [
                'name' => 'Tech',
            ],
            [
                'name' => 'Science',
            ],
            [
                'name' => 'Agriculture',
            ],
            [
                'name' => 'Mobil',
            ],
            [
                'name' => 'Desktop',
            ],
            [
                'name' => 'Headset',
            ],
            [
                'name' => 'History',
            ],
            [
                'name' => 'Literature',
            ],
        ]);
    }
}
