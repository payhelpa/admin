<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Session;




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
        Session::flash('message', 'Created successfully!');
        Session::flash('alert-class', 'alert-success');
        return view('addservices', compact('services'));
    }

    public function editServices($id){
        $services = Service::find($id);

        return view('addservices');
    }

    public function updateServices(Request $request){
        return view('addservices');
    }
    
    public function deleteServices($id){
        Service::destroy($id);  
        Session::flash('message', 'Deleted successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('services');
    }
}
