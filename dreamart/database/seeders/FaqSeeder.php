<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            'title' => 'Como faço para acessar minha assinatura?',
            'title_en' => 'How I can access the private content?',
            'text' => '
            Após fazer seu cadastro, basta acessar o conteúdo pelo menu que fica no canto superior
            ',
            'text_en' => '
            After sign up, you just need to login and use the top corner menu
            '
        ]);
        DB::table('faq')->insert([
            'title' => 'Tenho dúvidas sobre financeiro e pagamentos',
            'title_en' => "I have payment issues",
            'text' => '
            Entre em contato com financeiro@dreamarttv.com
            ',
            'text_en' => '
            Please ask us on help@dreamarttv.com
            '
        ]);
        DB::table('faq')->insert([
            'title' => 'Minha conta está bloqueada',
            'title_en' => "My account is inactive",
            'text' => '
            Entre em contato com financeiro@dreamarttv.com
            ',
            'text_en' => '
            Please ask us on finandeiro@dreamarttv.com
            '
        ]);
    }
}
