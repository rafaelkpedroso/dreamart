<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Models\Video;
use App\Models\Podcast;
use App\Models\Taxonomy;
use App\Models\Comment;


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

        $obj = null;
        $cats = Taxonomy::whereNull('father')->get();

        foreach($cats as $cat){

            $videos = Video::where('taxonomy', '=', $cat->slug)
                    ->join('users', 'users.id', '=', 'video.author')
                    ->select('video.id','video.title', 'video.image','video.rating','users.name')
                    ->get();

            $subcats = Taxonomy::where('father', '=', $cat->slug)->get();


            $objfilho = null;

            foreach($subcats as $subcat){

                $videos2 = null;
                $videos2 = Video::where('taxonomy', '=', $subcat->slug)
                    ->join('users', 'users.id', '=', 'video.author')
                    ->select('video.id','video.title', 'video.image','video.rating','users.name')
                    ->get();

                $objfilho[] = array(
                    'slug' => $subcat->slug,
                    'name' => $subcat->name,
                    'videos' => $videos2
                );
            }

            $obj[] = array(
              'slug' => $cat->slug,
              'name' => $cat->name,
              'videos' => $videos,
              'categories' => $objfilho
            );
        }

        return view('public.videos')->with('obj',$obj);
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

        $obj = null;
        $cats = Taxonomy::whereNull('father')->get();

        foreach($cats as $cat){

            $podcasts = Podcast::where('taxonomy', '=', $cat->slug)
                ->join('users', 'users.id', '=', 'podcast.author')
                ->select('podcast.id','podcast.title', 'podcast.image','podcast.rating','users.name')
                ->get();

            $subcats = Taxonomy::where('father', '=', $cat->slug)->get();


            $objfilho = null;

            foreach($subcats as $subcat){

                $podcasts2 = null;
                $podcasts2 = Podcast::where('taxonomy', '=', $subcat->slug)
                    ->join('users', 'users.id', '=', 'podcast.author')
                    ->select('podcast.id','podcast.title', 'podcast.image','podcast.rating','users.name')
                    ->get();

                $objfilho[] = array(
                    'slug' => $subcat->slug,
                    'name' => $subcat->name,
                    'videos' => $podcasts2
                );
            }

            $obj[] = array(
                'slug' => $cat->slug,
                'name' => $cat->name,
                'videos' => $podcasts,
                'categories' => $objfilho
            );
        }

        return view('public.podcasts')->with('obj',$obj);
    }

    public function video(Request $request)
    {

        $video = Video::where('video.id','=',$request->videoid)
                        ->leftJoin('users', 'users.id', '=', 'video.author')
                        ->select('video.id','video.url','video.image','video.title', 'video.views','video.rating','users.name')
                        ->get();

        $dataToview = $video[0];



        $comments = Comment::where('videoid','=',$video[0]->id)
                                ->join('users', 'users.id', '=', 'comment.author')
                                ->select('comment.id','comment.text','users.name', 'comment.likes', 'comment.dislikes')
                                ->orderBy('id','desc')
                                ->get();

        $randomVideos = Video::inRandomOrder()
                                ->limit(5)
                                ->join('users', 'users.id', '=', 'video.author')
                                ->select('video.id','video.title','video.rating','video.image','users.name')
                                ->get();

        $currentURL = URL::current();


        return view('public.video')
                    ->with('data', $dataToview)
                    ->with('currenturl', $currentURL)
                    ->with('comments',$comments)
                    ->with('paravernasequencia',$randomVideos);
    }

    public function podcast(Request $request)
    {

        $video = Podcast::where('podcast.id','=',$request->videoid)
            ->leftJoin('users', 'users.id', '=', 'video.author')
            ->select('video.id','video.url','video.image','video.title', 'video.views','video.rating','users.name')
            ->get();

        $dataToview = $video[0];



        $comments = Comment::where('videoid','=',$video[0]->id)
            ->join('users', 'users.id', '=', 'comment.author')
            ->select('comment.id','comment.text','users.name', 'comment.likes', 'comment.dislikes')
            ->orderBy('id','desc')
            ->get();

        $randomVideos = Video::inRandomOrder()
            ->limit(5)
            ->join('users', 'users.id', '=', 'video.author')
            ->select('video.id','video.title','video.rating','video.image','users.name')
            ->get();

        $currentURL = URL::current();


        return view('public.video')
            ->with('data', $dataToview)
            ->with('currenturl', $currentURL)
            ->with('comments',$comments)
            ->with('paravernasequencia',$randomVideos);
    }

    public function busca(Request $request)
    {

        return view('public.busca')->with('term', 'asd');
    }

}
