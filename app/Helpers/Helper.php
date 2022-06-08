<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use Illuminate\Support\Facades\Notification;
use Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Helper{
    public function generateAccountNum($number)
    {
        $today = date('YmdHis');
        $characters = '0123456789';
        $main = $today."". $characters;
        $randomString = '';
        for ($i = 0; $i < $number; $i++) {
            $index = rand(0, strlen($main) - 1);
            $randomString .= $main[$index];
        }
        return $randomString;
    }
 
    public function helpermessagesend($request){
        $content = [
            "subject"=>"New Message from PayHelpa",
            "details"=>$request->details
        ];
        Mail::to($request->email)->send(new NewMessage($content, $request));

        //return redirect('ongoingstatus')->with('success','Message Sent!');

        return back()->with('info','Message Sent!');
    }
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

    public function generateAccount(Request $request)
    {
        $response = Http::withHeaders([
            'X-Auth-Signature' => config('payhelpa-services.providus.providus_client_signature'),
            'Client-Id' => config('payhelpa-services.providus.providus_client_id'),
            'Secret'=> config('payhelpa-services.providus.providus_client_secret')
        ])->post('https://vps.providusbank.com/vps/api/PiPCreateReservedAccountNumber', [
            'account_name' => $request->name,
            "bvn" => ""
        ]);
        if ($response->status() == 200) {
            $rex = json_decode($response);
            return $rex->account_number;
        } else {
            return "Unable to generate account number try again";
        }
    }

}
//generate random order id

