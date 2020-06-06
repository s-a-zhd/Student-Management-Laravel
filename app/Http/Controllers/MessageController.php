<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    public function index (Request $request){

       $list=DB::table('contact')->get();
    	return view('message',compact('list'));
    }
}
