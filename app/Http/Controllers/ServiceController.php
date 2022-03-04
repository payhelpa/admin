<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;


class ServiceController extends Controller
{
    public function services(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $services = Service::where('title','LIKE',"%$search%")->get();
        }else{
            $services = Service::all();
        }
        return view('services', compact('search', 'services'));
    }
    public function addServices(Request $request){        
        return view('addservices');
    }

    public function createServices(Request $request){        
        $services = Service::create([
            'title' =>  request('title'),
        'description' => request('description')
        ]);
        return view('addservices', compact('services'))->with('error','SERVICE ADDED!');
    }
}
