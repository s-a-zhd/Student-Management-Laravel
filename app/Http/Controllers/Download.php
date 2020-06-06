<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Download extends Controller
{
    public function index (Request $req){
        $list=DB::table('note')->get();
    	return view('download',compact('list'));

    }
}
