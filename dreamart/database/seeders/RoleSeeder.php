<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'iduser' => '1',
            'role' => 'admin'
        ]);

        DB::table('roles')->insert([
            'iduser' => '2',
            'role' => 'teacher'
        ]);

        DB::table('roles')->insert([
            'iduser' => '3',
            'role' => 'teacher'
        ]);

        DB::table('roles')->insert([
            'iduser' => '4',
            'role' => 'student',
            'idplan' => '1'
        ]);

        DB::table('roles')->insert([
            'iduser' => '5',
            'role' => 'student',
            'idplan' => '2'
        ]);

        DB::table('roles')->insert([
            'iduser' => '6',
            'role' => 'student',
            'idplan' => '3'
        ]);
    }
}
