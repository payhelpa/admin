<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Notifications\AccountVerificationEmail;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use App\Helpers\Helper;


class UserController extends Controller
{
    public function dashboard()
    {
        $count = DB::table('users')->count();
        $ver = DB::table('users')->whereNotNull('kyc_verified')->count();
        $counttrans = DB::table('transactions')->count();
                 
        return view('dashboard', compact('count', 'counttrans','ver'));

    }
    public static function GetUserName($user_id)
    {
        $user = User::where('id', $user_id)->select('name')->first();
        if($user != null)
        {
            echo $user->name;
        }
        else
        {
            echo "N/A";
        }        
    }
    public static function GetUserEmail($email)
    {
        $user = User::where('id', $email)->select('email')->first();
        if($user != null)
        {
            echo $user->email;
        }
        else
        {
            echo "N/A";
        }        
    }
    public static function GetUserAccountNum($account_num)
    {
        $user = Wallet::where('user_id', $account_num)->select('account_number')->first();
        if($user != null)
        {
            echo $user->account_number;
        }
        else
        {
            echo "";
        }        
    }
    
    public function user(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $userss = User::where('name','LIKE',"%$search%")->get();
        }else{
            $userss = User::all();
         }
          return view('users', compact('search', 'userss'));
    }
    public function individualusers (Request $request){
        $userss = DB::table('individual_users')->get();
        return view('individualusers', compact('userss'));
    }
    public function businessusers (Request $request){
        $userss = DB::table('business_users')->get();
        return view('businessusers', compact('userss'));
    }

    public function user_details($id){
        $userss = DB::table('individual_users')->where('user_id',$id)->get();   
        return view('user_details', compact('userss'));
    }
    public function user_details_bis($id){
        $userss = DB::table('business_users')->where('user_id',$id)->get();   
        return view('user_details_bis', compact('userss'));
    }
    public function update_status($id){
        $post = DB::table('users')
                ->select('active_status')
                ->where('id', '=' ,$id )
                ->first();

                if ($post->active_status == 1) {
                     $status = 0;
                }
                else{
                     $status = 1;
                }
                $val = array('active_status' => $status); 
            DB::table('users')->where('id',$id)->update($val);
            return redirect('users');
    }

    public function verify(Request $request){ 
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = User::whereNotNull('kyc_verified')->where('account_verified_at', null)->where('name','LIKE',"%$search%")->get();
        }else{
            $users = User::whereNotNull('kyc_verified')->where('account_verified_at', null)->get();
        }
         return view('verify', compact('search', 'users'));
               
        //return view('verify');       
    }
    public function unverified(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = User::where('kyc_verified', null)->where('name','LIKE',"%$search%")->get();
        }else{
            $users = User::where('kyc_verified', null)->get();
        }
         return view('verify', compact('search', 'users'));
    
       // return view('unverified');
    }
    public function transactions(){    
        $userss = DB::table('transactions')->get();
        return view('transactions', compact('userss'));
    }
    public function ongoingstatus(){        
        return view('ongoingstatus');
    }
    public function statusdeclined(){       
       return view('pendingstatus');
   }
    public function status(){
        $post = DB::table('transactions')
        ->get();
        return view('status', compact('post'));
    }
    public function update_verify(Request $request, $id){
        $user = User::where('id', '=' ,$id)->first();
        DB::beginTransaction();
        try {
            $user->update([
                'account_verified_at' => now()
            ]);
        $response = Http::withHeaders([
            'X-Auth-Signature' => '63305c904b499922cf2d88cdec26e808c8154fb9d8bb4ab222d84df0e3853e85fafe71e326313205ee849171155644cc4b7e413cee2e301018fdc93a9ee3fc80',
            'Client-Id' => 'cEBZSDMxTHBhX1ByMCgpLg==',
            'Secret'=> 'CC1BF237E7EDD89DB08A804F5B8A16E7DBDE4432664BDD54C6AD943CD6F6F012'
        ])->post('https://vps.providusbank.com/vps/api/PiPCreateReservedAccountNumber', [
            'account_name' => $user->name,
            'bvn' =>'',
        ]);
        if ($response->status() == 200) 
        {
            $rex = json_decode($response);            
            $user = (new \App\Models\Wallet)->create([
                'user_id' => $user->id,
                'account_name' => $user->name,
                'account_number' => $rex->account_number,
                'account_balance' => 0
            ]);
                   
        }else{
                return redirect('verify')->with('error','Account was not generated, user not verified');
            }
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('verify')->with('sucess','Account was not generated, userrr not verified');
    }
    DB::commit();
    return redirect('verify')->with('success','User has been verified!');     
    }
    public function message(Request $request, $id){
        $user = DB::table('users')
       ->select('email')
       ->where('id', $id)->first();
       $email = $user->email;
       return view('message',compact('email'));
  }
   public function messagesend(Request $request){       
       $msg = (new Helper())->helpermessagesend($request);
       return $msg;
  }
  public function show($id){
    $users = DB::table('individual_users')->where('user_id',$id)->get();
    return view('show', compact('users'));
}
public function showimage($id){
    $users = DB::table('individual_users')->where('user_id',$id)->get();
    return view('showimage', compact('users'));
}
    
    
    //
}
