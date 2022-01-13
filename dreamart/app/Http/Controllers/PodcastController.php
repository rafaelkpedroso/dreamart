<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Podcast;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Cast\Object_;

class PodcastController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request, $pSlug)
    {

        $podcast = Podcast::where('slug', $pSlug)->first();
        if(!$podcast->count()){
            return view('public.404');
        }

        $data['url'] = $podcast->url;

        return view('public.podcast.play', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $table = new Podcast();

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
        return view('admin.podcasts.index', ['data' => $dataSet,
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

        return view('admin.podcasts.add', ['authors' => $authors, 'taxonomies' => $taxonomies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podcast = Podcast::create($request->all());

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/videos'), $imageName);

        $podcast->image = $imageName;
        $podcast->save();

        return redirect('/admin/podcasts');
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
        $table = Podcast::find($id);
        $authors = User::get();
        $taxonomies = Taxonomy::get();

        return view('admin.podcasts.edit', ['table' => $table, 'authors' => $authors, 'taxonomies' => $taxonomies]);
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
        $podcast = Podcast::find($id)->update($request->all());
        $podcast = Podcast::find($id);


        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/videos'), $imageName);
            $podcast->image = $imageName;
            $podcast->update();
        }

        return redirect('/admin/podcasts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Podcast::destroy($id);
        return redirect('/admin/podcasts');

    }
}
