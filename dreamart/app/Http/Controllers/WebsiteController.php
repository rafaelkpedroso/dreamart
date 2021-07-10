<?php

namespace App\Http\Controllers;

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

}
