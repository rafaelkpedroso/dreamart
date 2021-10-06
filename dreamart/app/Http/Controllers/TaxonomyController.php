<?php

namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = null;
        $taxonomies1 = Taxonomy::whereNull('father')->orderBy('name')->get();


        foreach ($taxonomies1 as $taxonomy1){
            $sons = null;

            $taxonomies2 = Taxonomy::where('father',$taxonomy1->slug)->orderBy('name')->get();
            foreach ($taxonomies2 as $taxonomy2){
                $sons[]= array(
                    'slug' => $taxonomy2->slug,
                    'name' => $taxonomy2->name
                );
            }

            $result[]= array(
                'slug' => $taxonomy1->slug,
                'name' => $taxonomy1->name,
                'sons' => $sons
            );

        }

        return view('admin.taxonomy.index',['results' => $result]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $taxonomy = Taxonomy::find($id);
        $pais = Taxonomy::where(['father' => NULL])->get();

        return view('admin.taxonomy.edit', ['taxonomy' => $taxonomy, 'pais' => $pais]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
