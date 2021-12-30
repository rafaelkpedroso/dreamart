<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;

class BillsController extends Controller
{
    public function index(Request $request)
    {

        $table = new Bill();

        // busca
//        if($request->get('busca')){
//            $table = $table->where('name','LIKE', ('%'.$request->get('busca').'%'));
//        }

//        // ordenação
//        if($request->get('column')){
//            $order = $request->get('order')?$request->get('order'):'asc';
//            $table = $table->orderBy($request->get('column'),$order);
//        }

        // paginação
        $rowsPerPage = 20;
        $countRows = $table->count();
        $pages = ceil($countRows/$rowsPerPage);
        $currentPage = $request->get('p')?$request->get('p'):1;
        $skip = ($currentPage-1)*$rowsPerPage;

        $dataSet = $table->skip($skip)->take($rowsPerPage)->get();

        $tablevars['sortable'] = 'title';
        return view('admin.bills.index', ['data' => $dataSet,
            'searchterm' => $request->get('busca'),
            'column' => $request->get('column'),
            'order' => $request->get('order'),
            'pages' =>$pages,
            'currentpage' =>$currentPage

        ]);

    }
}
