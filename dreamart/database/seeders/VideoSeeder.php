<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VideoSeeder extends Seeder
{

    public static function slugify($text, string $divider = '-'){
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = file_get_contents( base_path().'/public/csv/stats_export.csv');
        $lines = explode("\n",$file);
        $first = true;
        foreach($lines as $line){
            if($first){
                $first = false;
            } else {
                    
                $columns = explode(",",$line);
                $url = $columns[6];
                $title = str_replace('"','',$columns[7]);

                DB::table('video')->insert([
                    'slug' => $this->slugify($title).rand(1,999999),
                    'title' => "XXX".$title,
                    'author' => '1',
                    'url' => $url,
                    'views' => 0,
                    'rating' => 5,
                    'image' => 'videodefault.jpg'
                ]);

            }
        }
    }
}
