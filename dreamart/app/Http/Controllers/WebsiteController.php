<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display public home page
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('public.home');
    }

    /**
     * Display public home page
     *
     * @return \Illuminate\View\View
     */
    public function quemsomos()
    {
        return view('public.quemsomos');
    }

    /**
     * Display public home page
     *
     * @return \Illuminate\View\View
     */
    public function faq()
    {
        return view('public.faq');
    }

    public function legal()
    {
        return view('public.legal');
    }
    public function politicadeprivacidade()
    {
        return view('public.politicadeprivacidade');
    }
    public function cookies()
    {
        return view('public.cookies');
    }
    public function planos()
    {
        return view('public.planos');
    }

    public function videos()
    {
        return view('public.videos');
    }

    public function lives()
    {
        return view('public.lives');
    }

    public function favoritos()
    {
        return view('public.favoritos');
    }

    public function podcasts()
    {
        return view('public.podcasts');
    }

    public function video(Request $request)
    {



        $obj[1] = array(
            'title' => 'Guarda Aranha 22',
            'teacher' => 'Professor João',
            'date' => '22 de agosto de 2021',
            'views' => '400',
            'votes' => '4',
            'url' => 121998615
        );

        $obj[2] = array(
            'title' => 'Grande Finalização',
            'teacher' => 'Professor Demian',
            'date' => '2 de agosto de 2021',
            'views' => '100',
            'votes' => '5',
            'url' => 153481489
        );

        $obj[3] = array(
            'title' => 'Vídeo 3',
            'teacher' => 'Professor Lucca',
            'date' => '2 de agosto de 2021',
            'views' => '130',
            'votes' => '5',
            'url' => 153481489
        );

        $obj[4] = array(
            'title' => 'v4',
            'teacher' => 'Professor Demian',
            'date' => '2 de agosto de 2021',
            'views' => '100',
            'votes' => '5',
            'url' => 13209750
        );

        $obj[5] = array(
            'title' => 'v5',
            'teacher' => 'Professor Demian',
            'date' => '2 de agosto de 2021',
            'views' => '100',
            'votes' => '5',
            'url' => 143362815
        );

        $dataToview = $obj[$request->videoid];

        return view('public.video')->with('data', $dataToview);
    }
    public function busca(Request $request)
    {

        return view('public.busca')->with('term', 'asd');
    }

}
