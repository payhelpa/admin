<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Notifications\AccountVerificationEmail;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\Status;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use App\Models\Admin;
use App\Models\NairaSolicitation;



class UserController extends Controller
{
    private NairaSolicitation $model;

    public function __construct(
        NairaSolicitation $model
    )
    {
        $this->model = $model;
        // $this->helper = $helper;
        // $this->transaction = $transaction;
        // $this->status = $status;
        // $this->wallet = $wallet;
    }


    public function nairaSolicitation(Request $request, $id){
        $data = $this->model->where('id', '=', $request->solicitation_id)->exists();
        dd($data);


        $solicitation = $this->model->find();
        $solicitation->solicitors()->get();
        $NairaSolicitations = NairaSolicitation::all();
        dd($solicitation);
        return view('users', compact('solicitation'));
    }
    public function dashboard()
    {
        $count = DB::table('users')->count();
        $ver = DB::table('users')->whereNotNull('kyc_verified')->count();
        $counttrans = DB::table('transactions')->count();

        $userdata = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear("created_at", date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        // $post = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
        //    //->whereDate('transactions.created_at')
        //     ->latest('transactions.created_at')
        //     ->limit(5)
        //     ->get();

        //users chart
        $userschart =  DB::table('users')->select('id','created_at')->get()->groupBy(function($userschart){
            return Carbon::parse($userschart->created_at)->format('M');
           });

          $months=[];
          $monthCount=[];
          foreach($userschart as $month => $values){
              $months[]=$month;
              $monthCount[]=count($values);
          }

        return view('dashboard', ['userschart'=>$userschart, 'months'=>$months, 'monthCount'=>$monthCount], compact('count', 'counttrans','ver','userdata'));
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
    public static function GetUserAccountBal($account_balance)
    {
        $user = Wallet::where('user_id', $account_balance)->select('account_balance')->first();
        if($user != null)
        {
            echo $user->account_balance;
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
            $userss = DB::table('users')->get();
        }

        // $search = $request['search'] ?? "";
        // if($search != ""){
        //     $userss = User::where('name','LIKE',"%$search%")->get();
        // }else{
        //     $userss = User::all();
        // }
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
        $pendingtrans = DB::table('naira_solicitations')->where('user_id',$id)->count();
        $ongoingtrans = DB::table('transactions')->where('user_id',$id)->where('is_payment_confirmed',0)->count();
        $sucesstrans = DB::table('transactions')->where('user_id',$id)->where('is_payment_confirmed',1)->count();
        $wallet = DB::table('wallets')->where('user_id',$id)->get();
        return view('user_details', compact('userss','pendingtrans','ongoingtrans','sucesstrans', 'wallet'));
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
    /**
     * The function verifies users
     *  @param Request $request
     *
     * @var array
     */

    public function verify(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = DB::table('users')->whereNotNull('kyc_verified')->where('account_verified_at', null)->where('name','LIKE',"%$search%")->get();
        }else{
            $users =  DB::table('users')->whereNotNull('kyc_verified')->where('account_verified_at', null)->get();
        }
        return view('verify', compact('search', 'users'));
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
    public function transactions($id){
        $userss = DB::table('transactions')
        ->where('is_payment_confirmed', 1)
        ->first();
        return view('transactions', compact('userss'));
    }
    public function ongoingstatus(){
        $userss = DB::table('transactions')
        ->where('is_payment_confirmed', 0)
        ->get();
        return view('ongoingstatus', compact('userss'));
    }
    public function statusdeclined(){
        $userss = DB::table('naira_solicitations')->get();
        return view('pendingstatus', compact('userss'));
    }
    public function fupending(){
        $userss = DB::table('offers')->get();
        return view('fupending', compact('userss'));
    }
    public function pendinginfo($user_id){
        $userss = DB::table('naira_solicitations')->where('user_id', $user_id)->get();
        return view('pendinginfo', compact('userss'));
    }
    public function singlependinginfo($id){
        $data = $this->model->where('id', '=', $id)->exists();
        if ($data) {
            $user = $this->model->with(['history'])->find($id);
        }
       // dd($userss);
        return view('singlependinginfo', compact('user'));
    }
    public function ongoinginfo($user_id){
        $userss = DB::table('transactions')
        ->where('user_id', $user_id)
        ->where('is_payment_confirmed', 0)
        ->get();
        return view('ongoinginfo', compact('userss'));
    }
    public function status(){
        $userss = DB::table('transactions')
        ->where('is_payment_confirmed', 1)
        ->get();
        return view('status', compact('userss'));
    }
    public function successinfo($user_id){
        $userss = DB::table('transactions')->where('user_id', $user_id)->where('is_payment_confirmed', 1)->get();
        return view('successinfo', compact('userss'));
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
                'account_balance' => 0.00
            ]);
        }else{
                return redirect('verify')->with('sucess','Account was not generated, user not verified');
            }
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('verify')->with('sucess','Account was not generated, userrr not verified');
    }
    DB::commit();
    $user->notify(new AccountVerificationEmail());
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

public function showdoc($id){

    $users = DB::table('naira_solicitations')->where('id',$id)->first();
    return view('showdoc', compact('users'));
}
public function wallet(Request $request){
    $search = $request['search'] ?? "";
    if($search != ""){
        $userss = Wallet::where('account_name','LIKE',"%$search%")->orWhere('account_number','LIKE',"%$search%")->get();
    }else{
        $userss = Wallet::all();
    }
    return view('wallet', compact('search', 'userss'));
}

    //
}
