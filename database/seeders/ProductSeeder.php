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
                'category_id' => 1,
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'category_id' => 2,
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'category_id' => 2,
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'category_id' => 3,
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'category_id' => 1,
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'category_id' => 2,
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'category_id' => 1,
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'category_id' => 4,
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'category_id' => 3,
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'category_id' => 1,
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'category_id' => 2,
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'category_id' => 2,
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'category_id' => 8,
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'category_id' => 7,
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'category_id' => 9,
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'category_id' => 6,
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'category_id' => 7,
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'category_id' => 8,
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'category_id' => 9,
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'category_id' => 5,
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
            [
                'name' => 'Melon',
                'category_id' => 6,
                'type' => 'Fruit',
                'price' => 5.89,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent finibus aliquet justo. Nulla eu nunc vitae felis consectetur aliquet. Proin.
               ',
            ],
            [
                'name' => 'Teest12',
                'category_id' => 5,
                'type' => 'Test',
                'price' => 10.55,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus a iaculis magna. Etiam vitae nisi elementum, tincidunt massa pellentesque, lacinia.',
            ],
            [
                'name' => 'Teest122322',
                'category_id' => 7,
                'price' => 12.6,
                'type' => 'Train',
                'description' => '',
            ],
            [
                'name' => 'Teest1215616',
                'category_id' => 5,
                'type' => 'Fruit',
                'price' => 22.5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque elementum eros, vitae auctor leo cursus convallis. Nullam scelerisque, tellus.',
            ],
        ]);
    }
}
