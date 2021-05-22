<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'id' => '1',
            'plan' => 'Ouro',
            'description' => 'Descrição do plano ouro',
            'price' => '14.99'
        ]);
        DB::table('plans')->insert([
            'id' => '2',
            'plan' => 'Prata',
            'description' => 'Descrição do plano prata',
            'price' => '10.99'
        ]);
        DB::table('plans')->insert([
            'id' => '3',
            'plan' => 'Bronze',
            'description' => 'Descrição do plano Bronze',
            'price' => '9.99'
        ]);
    }
}
