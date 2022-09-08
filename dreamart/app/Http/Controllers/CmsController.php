<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Cast\Object_;

class CmsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $table = new Cms();

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
        return view('admin.cms.index', ['data' => $dataSet,
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

        return view('admin.cms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Cms();
        $table->title = $request->post('title');
        $table->title_en = $request->post('title_en');
        $table->text = $request->post('text');
        $table->text_en = $request->post('text_en');
        $table->save();

        return redirect('/admin/cms');
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
        $table = Cms::find($id);

        return view('admin.cms.edit', ['table' => $table]);
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
        $table = Cms::find($id);
        $table->title = $request->post('title');
        $table->title_en = $request->post('title_en');
        $table->text = $request->post('text');
        $table->text_en = $request->post('text_en');
        $table->update();
        return redirect('/admin/cms');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cms::destroy($id);
        return redirect('/admin/cms');

    }
}
