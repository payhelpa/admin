<?php

namespace App\Http\Controllers;

use App\Models\Industries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndustryController extends Controller
{
    public function industry(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $industry = Industries::where('name','LIKE',"%$search%")->get();
        }else{
            $industry = DB::table('industries')->orderBy('name')->get()->all(); //Industries::orderBy('name')->get()->all();
        }
        return view('industry', compact('search', 'industry'));
    }

    public function addIndustry(Request $request){
        return view('addindustry');
    }

    public function createIndustry(Request $request){
        $industry = Industries::create([
            'name' =>  request('name'),
        'description' => request('description')
        ]);
       // Session::flash('message', 'Created successfully!');
        //Session::flash('alert-class', 'alert-success');error
        return redirect()->back()->with('addindus','Created successfully!');;
    }

    public function editindustry($id){
        $industry = Industries::find($id);
        return view('industryupdate')->with('industry',$industry);
    }

    public function updateindustry(Request $request,$id){
        $industry = Industries::find($id);
        $industry->name = $request->input('name');
        $industry->description = $request->input('description');
        $industry->update();
        return redirect()->route('industry')->with('addonupdate',' Updated Successfully');


       // return view('addindustry');
    }
    public function deleteindustry($id){
        Industries::destroy($id);
        // Session::flash('message', 'Deleted successfully!');
        // Session::flash('alert-class', 'alert-success');
        return redirect()->route('industry');
    }
}
