<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Live;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Cast\Object_;

class LiveController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request, $pSlug)
    {

        $live = Live::where('slug', $pSlug)->first();
        if(!$live->count()){
            return view('public.404');
        }

        $data['url'] = $live->url;

        return view('public.live.play', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $table = new Live();

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
        return view('admin.lives.index', ['data' => $dataSet,
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

        return view('admin.lives.add', ['authors' => $authors, 'taxonomies' => $taxonomies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $live = Live::create($request->all());

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/videos'), $imageName);

        $live->image = $imageName;
        $live->save();

        return redirect('/admin/lives');
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
        $table = Live::find($id);
        $authors = User::get();
        $taxonomies = Taxonomy::get();

        return view('admin.lives.edit', ['table' => $table, 'authors' => $authors, 'taxonomies' => $taxonomies]);
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
        $live = Live::find($id)->update($request->all());
        $live = Live::find($id);

        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/videos'), $imageName);
            $live->image = $imageName;
            $live->update();
        }
        return redirect('/admin/lives');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Live::destroy($id);
        return redirect('/admin/lives');

    }
}
