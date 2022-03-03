<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use Illuminate\Support\Facades\Notification;
use Notifiable;

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

}
//generate random order id

