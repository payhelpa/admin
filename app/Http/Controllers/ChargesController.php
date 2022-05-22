<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class ChargesController extends Controller
{
    public function charges(Request $request){
        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->get('https://payhelpa-api-staging.herokuapp.com/api/v1/get-keys', [
        'key' => "PAYHELPA_TRANSACTION_TIMER",
        "value" ,
        ]);
        $tTimer =  $request->value;
        //dd($response);
        return view('charges', compact('tTimer'));
    }
    public function setPayhelpaFUCharges(Request $request)
    {
        //$charges = ($request->value);
        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->post('https://payhelpa-api-staging.herokuapp.com/api/v1/set-config-keys', [
        'key' => "PAYHELPA_SERVICE_CHARGE_FU",
        "value" => $request->value,
        ]);
        //dd($response);

        // $response = Http::withHeaders([
        //     'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        // ])->get('https://payhelpa-api-staging.herokuapp.com/api/v1/get-keys', [
        // 'key' => "PAYHELPA_SERVICE_CHARGE_FU",
        // "value" => $request->value,
        // ]);
        // $charges = json_decode($response);
        // if (empty($charges->fu_charge)){
        //     return "N/A";
        // }
        // else{
        //     $charges->fu_charge ;
        // }

        //$chargess = ($request->value);
        return redirect('charges')->with('success','FU charges Updated Successfully');

    }
    public function getPayhelpaFUCharges(Request $request)
    {
        $charges = ($request->value);
        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->post('https://payhelpa-api-staging.herokuapp.com/api/v1/set-config-keys', [
        'key' => "PAYHELPA_SERVICE_CHARGE_FU",
        "value" => $request->value,
        ]);
        //dd($response);
        $chargess = ($request->value);
        return redirect('charges')->with('success','FU charges Updated Successfully');

    }

    public function setPayhelpaLUCharges(Request $request)
    {
        $charges = ($request->value);
        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->post('https://payhelpa-api-staging.herokuapp.com/api/v1/set-config-keys', [
        'key' => "PAYHELPA_SERVICE_CHARGE_LU",
        "value" => $request->value,
        ]);
        //dd($response);
        return redirect('charges')->with('success','LU charges Updated Successfully');

    }

    public function setPayhelpaTimer(Request $request)
    {
        //$chargess = ($request->value);
        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->post('https://payhelpa-api-staging.herokuapp.com/api/v1/set-config-keys', [
        'key' => "PAYHELPA_TRANSACTION_TIMER",
        "value" => $request->value,
        ]);
        //$chargess = ($request->value);
        //dd($chargess);
        //dd($response);
        return redirect('charges')->with('success','Transaction Timer Updated Successfully');

    }

    public function viewPayhelpaTimer(Request $request)
    {

        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->get('https://payhelpa-api-staging.herokuapp.com/api/v1/get-keys', [
        'key' => "PAYHELPA_TRANSACTION_TIMER",
        "value" => $request->value,
        ]);
        $chargess = "tee";//($request->value);
        dd($chargess);

        return view('charges', compact('chargess'));

    }


}
