<?php

namespace App\Helpers;

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
    
     public function helpermessagesend(Request $request){
       $content = [
          "subject"=>"New Message from PayHelpa",
          "details"=>$request->details
       ];
       Mail::to($request->email)->send(new NewMessage($content, $request));
      return back()->with('success','Message Sent!');
  }
}
//generate random order id
    
