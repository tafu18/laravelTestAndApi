<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'name' => 'Melon',
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
        ]);
    }
}
