<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitsFilterController extends Controller
{
    public function twoMillionGreater(){

        $query = Publish::where('price', '>', 2000000);



        $filters = QueryBuilder::for($query)
            ->get();

        return view('publish.home')->with('publishes' , $filters);
    }
}
