<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Rafael Kretzer Pedroso', //admin
            'email' => 'rafaelkpedroso@gmail.com',
            'password' => Hash::make('1234'),
            'city' => 'Curitiba',
            'state' => 'PR',
            'birthdate' => '1985-08-20',
        ]);


        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Kyra Gracie', //professor
            'email' => 'rafaelkpedroso+kyra@gmail.com',
            'password' => Hash::make('1234'),
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'birthdate' => '1985-05-29',
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'name' => 'Demian Maia', // professor
            'email' => 'rafaelkpedroso+demianmaia@gmail.com',
            'password' => Hash::make('1234'),
            'city' => 'São Paulo',
            'state' => 'SP',
            'birthdate' => '1977-05-14',
        ]);

        DB::table('users')->insert([
            'id' => '4',
            'name' => 'Joe Rogan', // aluno ouro
            'email' => 'rafaelkpedroso+joerogan@gmail.com',
            'password' => Hash::make('1234'),
            'city' => 'São Paulo',
            'state' => 'SP',
            'birthdate' => '1967-08-11',
        ]);

        DB::table('users')->insert([
            'id' => '5',
            'name' => 'Sergio Malandro', // aluno prata
            'email' => 'rafaelkpedroso+serginho@gmail.com',
            'password' => Hash::make('1234'),
            'city' => 'São Paulo',
            'state' => 'SP',
            'birthdate' => '1967-08-11',
        ]);

        DB::table('users')->insert([
            'id' => '6',
            'name' => 'Fausto Silva', // aluno bronze
            'email' => 'rafaelkpedroso+fausto@gmail.com',
            'password' => Hash::make('1234'),
            'city' => 'São Paulo',
            'state' => 'SP',
            'birthdate' => '1967-08-11',
        ]);


    }

}
