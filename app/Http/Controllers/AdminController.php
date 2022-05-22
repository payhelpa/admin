<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class AdminController extends Controller
{
    public function adminlog(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $log = DB::table('logs')->where('subject','LIKE',"%$search%")->get();
        }else{
            $log = DB::table('logs')->get();
        }
        return view('adminlog', compact('search', 'log'));
    }
    //
}
