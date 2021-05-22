<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('video')->insert([
            'id' => '1',
            'slug' => 'grappling-dummies-2-bjj-in-japan',
            'title' => 'Grappling Dummies 2.0 BJJ in Japan',
            'author' => '2', // Kyra Gracie
            'url' => 'https://vimeo.com/8975562',
            'views' => 122,
            'rating' => 3
        ]);

        DB::table('video')->insert([
            'id' => '2',
            'slug' => 'bjj-straight-ankle-lock',
            'title' => 'BJJ: Straight Ankle Lock Basics for BJJ',
            'author' => '2', // Kyra Gracie
            'url' => 'https://vimeo.com/8366926',
        ]);

        DB::table('video')->insert([
            'id' => '3',
            'slug' => 'bjj-old-school',
            'title' => 'BJJ Old School',
            'author' => '3', // Demian Maia
            'url' => 'https://vimeo.com/190272631',
            'views' => 31233,
            'rating' => 3.5
        ]);
    }
}
