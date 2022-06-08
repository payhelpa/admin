<?php

namespace App\Http\Controllers;

use App\Models\AdminLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class AdminController extends Controller
{
    public function calendar(){
        return view('calendar');
    }
    public function adminlog(Request $request, $subject){
        $search = $request['search'] ?? "";
        if($search != ""){
            $log = DB::table('logs')->where('subject','LIKE',"%$search%")->get();
        }else{
           // $log = DB::table('logs')->get();
           $log = [];
    	$log['subject'] = $subject;
    	$log['action'] = Request::action();
    	$log['created_at'] = Request::created_at();
    	$log['updated_at'] = Request::updated_at();
    	$log['admin_id'] = auth()->check() ? auth()->user()->id : 1;
    	AdminLog::create($log);
        }
        return view('adminlog', compact('search', 'log'));
    }

    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['action'] = Request::action();
    	$log['created_at'] = Request::created_at();
    	$log['updated_at'] = Request::updated_at();
    	$log['admin_id'] = auth()->check() ? auth()->user()->id : 1;
    	AdminLog::create($log);
        return view('adminlog',compact('log'));
    }

    //
}
