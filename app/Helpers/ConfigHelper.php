<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use Illuminate\Support\Facades\Notification;
use Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConfigHelper{

    public function getPayhelpaFUCharges(Request $request)
    {
        $response = Http::withHeaders([
            'PayhelpaAccessKey' => "Payhelpa PAY-HELPER#@1~89982+?f6a919HelpERXX"
        ])->post('https://payhelpa-api-staging.herokuapp.com/api/v1/get-keys', [
        'key' => "PAYHELPA_SERVICE_CHARGE_FU",
        "value" => $request->value,
        ]);
        //dd($response);
        $chargess = ($request->value);
        return view('charges',compact('chargess'));

    }

}
//generate random order id

