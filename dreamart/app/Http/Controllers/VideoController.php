<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Taxonomy;
use App\Models\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Expr\Cast\Object_;

class VideoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request, $pSlug)
    {

        $video = Video::where('slug', $pSlug)->first();
        if(!$video->count()){
            return view('public.404');
        }

        $data['url'] = $video->url;

        return view('public.video.play', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $table = new Video();

        // busca
        if($request->get('busca')){
            $table = $table->where('title','LIKE', ('%'.$request->get('busca').'%'));
        }

        // ordenação
        if($request->get('column')){
            $order = $request->get('order')?$request->get('order'):'asc';
            $table = $table->orderBy($request->get('column'),$order);
        }

        // paginação
        $rowsPerPage = 20;
        $countRows = $table->count();
        $pages = ceil($countRows/$rowsPerPage);
        $currentPage = $request->get('p')?$request->get('p'):1;
        $skip = ($currentPage-1)*$rowsPerPage;

        $dataSet = $table->skip($skip)->take($rowsPerPage)->get();

        $tablevars['sortable'] = 'title';
        return view('admin.videos.index', ['data' => $dataSet,
                                                'searchterm' => $request->get('busca'),
                                                'column' => $request->get('column'),
                                                'order' => $request->get('order'),
                                                'pages' =>$pages,
                                                'currentpage' =>$currentPage

        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = User::get();
        $taxonomies = Taxonomy::get();

        return view('admin.videos.add', ['authors' => $authors, 'taxonomies' => $taxonomies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = Video::create($request->all());

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/videos'), $imageName);

        $video->image = $imageName;
        $video->save();
        
        return redirect('/admin/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Video::find($id);
        $authors = User::get();
        $taxonomies = Taxonomy::get();

        return view('admin.videos.edit', ['table' => $table, 'authors' => $authors, 'taxonomies' => $taxonomies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id)->update($request->all());
        $video = Video::find($id);


        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/videos'), $imageName);
            $video->image = $imageName;
            $video->update();
        }

        return redirect('/admin/videos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);
        return redirect('/admin/videos');

    }

    public function addview($id)
    {
        $video = Video::find($id);
        $video->views = $video->views+1;
        $video->update();
    }

    public function rate($id,$rate)
    {

        $table = new Rates();
        $table->videoid = $id;
        $table->author = Auth::user()->id;
        $table->rate = $rate;
        $table->save();

        $avg = Rates::where('videoid','=',$id)->groupBy('videoid')->avg('rate');

        $video = Video::find($id);
        $video->rating = $avg;
        $video->save();

       return redirect()->back();

    }
}
