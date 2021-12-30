<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Testimonial;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\Cast\Object_;

class TestimonialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request, $pSlug)
    {

        $testimonial = Testimonial::where('slug', $pSlug)->first();
        if(!$testimonial->count()){
            return view('public.404');
        }

        $data['url'] = $testimonial->url;

        return view('public.testimonial.play', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $table = new Testimonial();

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
        return view('admin.testimonials.index', ['data' => $dataSet,
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

        return view('admin.testimonials.add', ['authors' => $authors, 'taxonomies' => $taxonomies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        print_r($request->post()); die();
        $testimonial = new Testimonial();
        $testimonial->name = $request->post('name');
        $testimonial->testimonial = $request->post('testimonial');
        $testimonial->save();

        return redirect('/admin/testimonials');
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
        $table = Testimonial::find($id);
        $authors = User::get();
        $taxonomies = Taxonomy::get();

        return view('admin.testimonials.edit', ['table' => $table, 'authors' => $authors, 'taxonomies' => $taxonomies]);
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
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->post('name');
        $testimonial->testimonial = $request->post('testimonial');
        $testimonial->update();
        return redirect('/admin/testimonials');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::destroy($id);
        return redirect('/admin/testimonials');

    }
}
