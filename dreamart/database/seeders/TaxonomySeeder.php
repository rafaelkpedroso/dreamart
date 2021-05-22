<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TaxonomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxonomy')->insert([
            'slug' => 'guard',
            'name' => 'Guarda'
        ]);
        DB::table('taxonomy')->insert([
            'slug' => 'guard-halfguard',
            'name' => 'Meia guarda',
            'father' => 'guard'
        ]);
        DB::table('taxonomy')->insert([
            'slug' => 'guard-closedguard',
            'name' => 'Guarda Fechada',
            'father' => 'guard'
        ]);
        DB::table('taxonomy')->insert([
            'slug' => 'guard-berimbolo',
            'name' => 'Berimbolo',
            'father' => 'guard'
        ]);


        DB::table('taxonomy')->insert([
            'slug' => 'subs',
            'name' => 'Submission'
        ]);
        DB::table('taxonomy')->insert([
            'slug' => 'subs-armattack',
            'name' => 'Ataque de Braço',
            'father' => 'subs'
        ]);
        DB::table('taxonomy')->insert([
            'slug' => 'subs-chokes',
            'name' => 'Estrangulamento',
            'father' => 'subs'
        ]);


        DB::table('taxonomy')->insert([
            'slug' => 'escapes',
            'name' => 'Escapadas'
        ]);


    }
}
