<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;


class CountryController extends Controller
{
    public function country(){
        $search = $request['search'] ?? "";
        if($search != ""){
            $country = Country::where('title','LIKE',"%$search%")->get();
        }else{
            $country = Country::all();
        }
        return view('country', compact('search', 'country'));
    }

    public function addcountry(Request $request){
        return view('addcountry');
    }

    public function createcountry(Request $request){

        Cloudder::upload($request->file('logo'), null, [
            "folder" => "payhelpa-documents",  "overwrite" => FALSE, "resource_type" => "image"
        ]);
        // //dd('$upload');
        $upload = Cloudder::getResult();
            $country = Country::create([
                'name' =>  request('name'),
                'phone_number_code' => $request->phone_number_code,
                'logo' => $upload['url'],
                'currency' => request('currency'),
                'currency_symbol' => request('currency_symbol'),
            ]);
            //dd('$country');
    //}
    return redirect()->back()->with('addindus',' Added Successfully');
    }

    public function editcountry($id){
        $country = Country::find($id);
        return view('countryupdate')->with('country',$country);
    }

    public function updatecountry(Request $request,$id){
        Cloudder::upload($request->file('logo'), null, [
            "folder" => "payhelpa-documents",  "overwrite" => FALSE, "resource_type" => "image"
        ]);

        $upload = Cloudder::getResult();


        $country = Country::find($id);
        $country->name = $request->input('name');
        $country->logo = $upload['url'];
        $country->phone_number_code = $request->input('phone_number_code');
        $country->currency = $request->input('currency');
        $country->currency_symbol = $request->input('currency_symbol');
        $country->update();
        return redirect()->route('country')->with('addonupdate',' Updated Successfully');


       // return view('addcountry');
    }

    public function deletecountry($id){
        Country::destroy($id);
        return redirect()->route('country')->with('blogdel',' Published Successfully');
    }
}
