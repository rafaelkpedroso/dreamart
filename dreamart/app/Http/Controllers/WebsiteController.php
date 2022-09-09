<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;
use App\Models\Podcast;
use App\Models\Live;
use App\Models\Setup;
use App\Models\Taxonomy;
use App\Models\Comment;
use App\Models\Testimonial;
use App\Models\Cms;
use App\Models\Faq;
use Illuminate\Support\Facades\App;
use Session;



class WebsiteController extends Controller
{
    /**
     * Display public home page
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {       

        $faq = $this->getFaqs();

        $podcasts = Podcast::
            join('users', 'users.id', '=', 'podcast.author')
            ->select('podcast.id','podcast.title', 'podcast.image','podcast.rating','users.name')
            ->limit(5)
            ->get();

        $depoimentos = $this->getTestimonials();
        
        
        return view('public.home')
            ->with('faqs',$faq)
            ->with('depoimentos',$depoimentos)
            ->with('podcasts',$podcasts);
    }

    /**
     * Display public home page
     *
     * @return \Illuminate\View\View
     */
    public function quemsomos()
    {

        $output = $this->getCms(1);
        
        return view('public.quemsomos')
        ->with('data',$output);

    }

    /**
     * Display public home page
     *
     * @return \Illuminate\View\View
     */
    public function faq()
    {
        $faq = $this->getFaqs();

        return view('public.faq')
        ->with('faqs',$faq);
    }

    public function legal()
    {
        $output = $this->getCms(2);
        
        return view('public.legal')
        ->with('data',$output);

    }
    public function politicadeprivacidade()
    {
        $output = $this->getCms(3);
        
        return view('public.politicadeprivacidade')
        ->with('data',$output);
        
    }
    public function cookies()
    {
        $output = $this->getCms(4);
        
        return view('public.cookies')
        ->with('data',$output);
    }
    public function planos()
    {

        $setup = Setup::where('key','=','price')->get();
        $price = $setup[0]->value;

        return view('public.planos')->with('price',$price);
    }

    public function videos()
    {

        $obj = null;
        $cats = Taxonomy::whereNull('father')->get();

        foreach($cats as $cat){

            $videos = Video::where('taxonomy', '=', $cat->slug)
                    ->join('users', 'users.id', '=', 'video.author')
                    ->select('video.id','video.title','video.title_en', 'video.image','video.rating','users.name')
                    ->get();

            $subcats = Taxonomy::where('father', '=', $cat->slug)->get();


            $objfilho = null;

            foreach($subcats as $subcat){

                $videos2 = null;
                $videos2 = Video::where('taxonomy', '=', $subcat->slug)
                    ->join('users', 'users.id', '=', 'video.author')
                    ->select('video.id','video.title','video.title_en', 'video.image','video.rating','users.name')
                    ->get();

                $objfilho[] = array(
                    'slug' => $subcat->slug,
                    'name' => ( Session::get('language')=='pt_BR') ? $subcat->name : ($subcat->name_en ? $subcat->name_en : $subcat->name),
                    'videos' => $videos2
                );
            }

            $obj[] = array(
              'slug' => $cat->slug,
              'name' => ( Session::get('language')=='pt_BR') ? $cat->name : ($cat->name_en ? $cat->name_en : $cat->name),
              'videos' => $videos,
              'categories' => $objfilho
            );
        }

        return view('public.videos')->with('obj',$obj);
    }

    public function lives()
    {

        $obj = null;
        $cats = Taxonomy::get();

        foreach($cats as $cat){

            $lives = Live::join('users', 'users.id', '=', 'live.author')
                ->select('live.id','live.title', 'live.image','live.rating','users.name')
                ->get();

        }

        return view('public.lives')->with('obj',$lives);
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
                    'name' => ( Session::get('language')=='pt_BR') ? $subcat->name : ($subcat->name_en ? $subcat->name_en : $subcat->name),
                    'videos' => $podcasts2
                );
            }

            $obj[] = array(
                'slug' => $cat->slug,
                'name' => ( Session::get('language')=='pt_BR') ? $cat->name : ($cat->name_en ? $cat->name_en : $cat->name),
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
            ->leftJoin('users', 'users.id', '=', 'podcast.author')
            ->select('podcast.id','podcast.url','podcast.image','podcast.title', 'podcast.views','podcast.rating','users.name')
            ->get();

        $dataToview = $video[0];


        $currentURL = URL::current();


        return view('public.podcast')
            ->with('data', $dataToview)
            ->with('currenturl', $currentURL);
    }

    public function live(Request $request)
    {

        $video = Live::where('live.id','=',$request->videoid)
            ->leftJoin('users', 'users.id', '=', 'live.author')
            ->select('live.id','live.url','live.image','live.title', 'live.views','live.rating','users.name')
            ->get();

        $dataToview = $video[0];


        $currentURL = URL::current();


        return view('public.live')
            ->with('data', $dataToview)
            ->with('currenturl', $currentURL);
    }

    public function busca(Request $request)
    {


            $table = Video::where('title','LIKE', ('%'.$request->get('search').'%'))
                            ->join('users', 'users.id', '=', 'video.author')
                            ->select('video.id','video.title', 'video.image','video.rating','users.name')
                            ->get();



        return view('public.busca')->with('obj',$table)->with('term', $request->get('search'));

    }

    public function setLang(Request $request){
        
        App::setLocale($request->idioma);
        Session::put('language', $request->idioma);
        
        return back();
    }

    private function getCms($id){

        $data = Cms::where('id','=',$id)->first();
        $output = array();

        if(Session::get('language')=='pt_BR'){
            $output['title'] = $data['title'];
            $output['text'] = $data['text'];
        }else {
            $output['title'] = $data['title_en'];
            $output['text'] = $data['text_en'];
        }

        return $output;
    }
    
    private function getFaqs(){

        $output = array();

        if(Session::get('language')=='pt_BR'){
            foreach(Faq::all() as $data){
                $output[] = array(
                    'title' => $data->title,
                    'text' => $data->text
                );
            }
        }else {
            foreach(Faq::all() as $data){
                $output[] = array(
                    'title' => $data->title_en,
                    'text' => $data->text_en
                );
            }
        }

        return $output;
    }

    private function getTestimonials(){

        $output = array();

        if(Session::get('language')=='pt_BR'){
            foreach(Testimonial::all() as $data){
                $output[] = array(
                    'id' => $data->id,
                    'name' => $data->name,
                    'image' => $data->image,
                    'testimonial' => $data->testimonial
                );
            }
        }else {
            foreach(Testimonial::all() as $data){
                $output[] = array( 
                    'id' => $data->id,
                    'name' => $data->name,
                    'image' => $data->image,
                    'testimonial' => $data->testimonial_en
                );
            }
        }

        
        $obj = (Object) $output;
        return $obj;
    }

}
