<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms')->insert([
            'title' => 'Quem Somos',
            'title_en' => 'Who we are',
            'text' => 'texto',
            'text_en' => 'text'
        ]);
        DB::table('cms')->insert([
            'title' => 'Legal',
            'title_en' => 'Legal',
            'text' => 'texto',
            'text_en' => 'text'
        ]);

        DB::table('cms')->insert([
            'title' => 'Política de Privacidade',
            'title_en' => 'Legal',
            'text' => 'texto',
            'text_en' => 'text'
        ]);
    }
}
