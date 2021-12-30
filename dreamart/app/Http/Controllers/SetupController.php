<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setup;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Cast\Object_;

class SetupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request, $pSlug)
    {

        $setup = Setup::where('slug', $pSlug)->first();
        if(!$setup->count()){
            return view('public.404');
        }

        $data['url'] = $setup->url;

        return view('public.setup.play', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $table = new Setup();

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
        return view('admin.setups.index', ['data' => $dataSet,
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

        return view('admin.setups.add', ['authors' => $authors, 'taxonomies' => $taxonomies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Setup();
        $table->key = $request->post('key');
        $table->value = $request->post('value');
        $table->type = $request->post('type');
        $table->save();

        return redirect('/admin/setups');
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
        $table = Setup::find($id);
        $authors = User::get();
        $taxonomies = Taxonomy::get();

        return view('admin.setups.edit', ['table' => $table, 'authors' => $authors, 'taxonomies' => $taxonomies]);
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
        $setup = Setup::find($id);
        $setup->key = $request->post('key');
        $setup->type = $request->post('type');
        $setup->value = $request->post('value');
        $setup->update();
        return redirect('/admin/setups');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setup::destroy($id);
        return redirect('/admin/setups');

    }
}
