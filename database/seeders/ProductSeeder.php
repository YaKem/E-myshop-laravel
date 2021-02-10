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
                'name' => 'Oppo mobile',
                'price' => '300',
                'description' => 'A smartphone with 8Go ram and much more featues',
                'category' => 'mobile',
                'gallery' => 'https://dyw7ncnq1en5l.cloudfront.net/optim/product/58/58501/e3bfbc0b-a72__w450.jpeg'
            ],
            [
                'name' => 'Panasonic TV',
                'price' => '400',
                'description' => 'A smart tv with much more featues',
                'category' => 'tv',
                'gallery' => 'https://media.materiel.net/r550/oproducts/AR201110280200_g1.jpg'
            ],
            [
                'name' => 'Sony TV',
                'price' => '500',
                'description' => 'A smartphone with 4Go ram and much more featues',
                'category' => 'tv',
                'gallery' => 'https://www.lcd-compare.com/images/pdts/xl/SONKDL46W2000.jpg'
            ],
            [
                'name' => 'LG fridge',
                'price' => '200',
                'description' => 'A fridge much more featues',
                'category' => 'fridge',
                'gallery' => 'https://www.sbitanyhome.com/content/images/thumbs/0023271_lg-refrigerator-gr-x710ins_550.jpeg'
            ]
        ]);
    }
}
