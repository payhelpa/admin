<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Exports\UsersExport;
use App\Exports\BizUsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Models\FundWithdrawal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Notifications\AccountVerificationEmail;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\NairaSolicitation;
use App\Models\IndividualUser;
use App\Models\IndividualDetail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use App\Models\Status;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use App\Models\Admin;
use App\Mail\AccountVerified;
use App\Models\BusinessDetail;
use App\Models\BusinessUser;
use App\Models\Service;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    private NairaSolicitation $model;
    private Transaction $transaction;
    private Status $status;
    private IndividualUser $IndividualUser;
    private IndividualDetail $IndividualDetail;

    public function __construct(
        NairaSolicitation $model, Transaction $transaction, Status $status, IndividualUser $IndividualUser,  IndividualDetail $IndividualDetail
    )
    {
        $this->model = $model;
        $this->transaction = $transaction;
        $this->status = $status;
        // $this->helper = $helper;
        // $this->wallet = $wallet;
        $this->IndividualUser = $IndividualUser;
        $this->IndividualDetail = $IndividualDetail;
    }

    public function dashboard()
    {
        $countuser = User::count();
        $ver = User::whereNotNull('kyc_verified')->count();
        $counttransaction = Transaction::count();

        $userdata = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear("created_at", date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

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
            //recent transaction
        $userss = Transaction::latest('created_at')
        ->limit(5)
        ->get();
        return view('dashboard', ['userschart'=>$userschart, 'months'=>$months, 'monthCount'=>$monthCount], compact('countuser', 'counttransaction','ver','userdata', 'userss'));

    // $post = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
        //    //->whereDate('transactions.created_at')
        //     ->latest('transactions.created_at')
        //     ->limit(5)
        //     ->get();
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
    public static function GetUserPhoneNumber($user_id)
    {
        $user = IndividualDetail::where('user_id', $user_id)->select('phone_number')->first();
        $user = BusinessDetail::where('user_id', $user_id)->select('phone_number')->first();

        if($user != null)
        {
            echo $user->phone_number;
        }
        else
        {
            echo "N/A";
        }
    }
    public static function GetUserType($user_id)
    {
        $user = IndividualDetail::where('user_id', $user_id)->select('country')->first();
            if($user == null)
        {
            echo $user->country;
        }
        else
        {
            echo "N/A";
        }
    }
    public static function GetOfferUserName($user_id)
    {
        $user = DB::table('offers')->where('user_id', $user_id)->select('user_id')->first();
        $name =  DB::table('users')->select('user_id', $user)->select('name')->first();
        if($name != null)
        {
            echo $name->name;
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

    public static function GetActiveUser($user_id)
    {
        $user = User::where('id', $user_id)->select('active_status')->first();
            if($user != null)
        {
            echo $user->name;
        }
        else
        {
            echo "N/A";
        }
    }
    /**
     * convert kobo to naira
     * @param $amount
     * @return float|int
     */
    public function convertKoboToNaira($amount): float|int
    {
        return $amount / 100;
    }

    public function user(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $userss = User::whereNotNull('account_verified_at')->where('name','LIKE',"%$search%")->get();
        }else{
            $userss = DB::table('users')->whereNotNull('account_verified_at')->orderBy('name')->get()->all();
        }
        return view('users', compact('search', 'userss'));
    }

    public function subusers(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = IndividualDetail::where('name','LIKE',"%$search%")->get();
        }else{
            $users = IndividualDetail::get()->all();
        }
        return view('subadmin.subusers', compact('search', 'users'));
    }

    public function subBizusers(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = BusinessDetail::where('name','LIKE',"%$search%")->get();
        }else{
            $users = BusinessDetail::get()->all();
        }
        return view('subadmin.subbizusers', compact('search', 'users'));
    }

    public function profile (Request $request){
        $admin = Auth::user();
        //$admin = DB::table('admins')->first();
        return view('profile', compact('admin'));
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'name' =>'min:4|string|max:255',
            'email'=>'email|string|max:255'
        ]);
        /** @var \App\Models\Admin $admin */
        $admin =Auth::user();
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->phone_number = $request['phone_number'];
        $admin->address = $request['address'];
        $admin->save();
        return back()->with('message','Profile Updated');
    }

    public function changePassword(Request $request){

        // if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        // }

        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     //Current password and new password are same
        //     return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        // }

        $validatedData = $request->validate([
            // 'current-password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        /** @var \App\Models\Admin $admin */
        $admin = Auth::user();
        $admin->password = Hash::make($request['password']);//$request->get('password'));
        $admin->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function individualusers (Request $request){

        //$userss = DB::table('individual_details')->get();
        $users = IndividualDetail::get();
        $activeUsers = User::select('active_status')->get();
        //dd($activeUsers);

        $userss = $this->IndividualDetail->with(['user'])->whereHas('user', function ($query)  {
            $query->whereNotNull('active_status');
        })->get();
        //dd($userss);

        return view('individualusers', compact('users','activeUsers'));
    }
    public function businessusers (Request $request){
        $userss = DB::table('business_details')->get();
        return view('businessusers', compact('userss'));
    }

    public function user_details($id){
        $userss = DB::table('individual_details')->where('user_id',$id)->get();
        $pendingtrans = DB::table('naira_solicitations')->where('user_id',$id)->count();
        $ongoingtrans = DB::table('transactions')->where('user_id',$id)->where('is_payment_confirmed',0)->count();
        $sucesstrans = DB::table('transactions')->where('user_id',$id)->where('is_payment_confirmed',1)->count();
        $walletbal = DB::table('wallets')->where('user_id',$id)->select('account_balance')->get();
        $walletnum = DB::table('wallets')->where('user_id',$id)->select('account_number')->get();
        $walletname = DB::table('wallets')->where('user_id',$id)->select('account_name')->get();
        $wallets = DB::table('wallets')->where('user_id',$id)->get();
        return view('user_details', compact('userss','pendingtrans','ongoingtrans','sucesstrans', 'wallets', 'walletbal', 'walletnum' , 'walletname'));
    }
    public function user_details_bis($id){
        $userss = DB::table('business_details')->where('user_id',$id)->get();
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
            $users = DB::table('users')->where('role_id', 1)->whereNotNull('kyc_verified')->where('account_verified_at', null)->where('name','LIKE',"%$search%")->get();
        }else{
            $users =  DB::table('users')->where('role_id', 1)->whereNotNull('kyc_verified')->where('account_verified_at', null)->get();
        }
        return view('verify', compact('search', 'users'));
    }

    public function verifyBusiness(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = DB::table('users')->where('role_id', 2)->whereNotNull('kyc_verified')->where('account_verified_at', null)->where('name','LIKE',"%$search%")->get();
        }else{
            $users =  DB::table('users')->where('role_id', 2)->whereNotNull('kyc_verified')->where('account_verified_at', null)->get();
        }
        return view('verifybusiness', compact('search', 'users'));
    }
    public function verifyFU(Request $request){
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
        return view('unverified', compact('search', 'users'));

       // return view('unverified');
    }


    // public function ongoinginfo($id){
    //     $solicitation = $this->model->with(['solicitors'])->find($id);
    //     $transactionsolicitations = $this->model->with(['user', 'solicitors'])->find($id);

    //     return view('singleongoinginfo', compact('solicitation', 'transactionsolicitations'));
    // }
    public function update_verify($id){
        $user = User::find($id);
        // $userReferralLink = "PH" . sprintf("%0.9s", str_shuffle(rand(12, 30000) * time()));
        //dd($userReferralLink);
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
            //$response->status() == 200
            //$account_number = account_number;

            $rex = json_decode($response);
            if (empty($rex->account_number)){
                return redirect('verify')->with('warning','Account was not generated, userrr not verified');
            }
            else{
            $Wallet = (new \App\Models\Wallet)->create([
                'user_id' => $id,
                'account_name' => $user->name,
                'account_number' => $rex->account_number,
                'account_balance' => 0.00
            ]);
        }

        /*if ('account_number' == NULL)
        {
            return redirect('verify')->with('warning','Account was not generated, userrr not verified');
        }else{
            $rex = json_decode($response);
            $Wallet = (new \App\Models\Wallet)->create([
                'user_id' => $id,
                'account_name' => $user->name,
                'account_number' => $rex->account_number,
                'account_balance' => 0.00
            ]);
        }*/
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('verify')->with('warning','Account was not generated, userrr not verified');
    }
    DB::commit();
    $user->notify(new AccountVerificationEmail());
    return redirect('verify')->with('success','User has been verified!');
    }

    public function update_verifyBsn($id){
        $user = User::find($id);
        // $userReferralLink = "PH" . sprintf("%0.9s", str_shuffle(rand(12, 30000) * time()));
        //dd($userReferralLink);
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
            //$response->status() == 200
            //$account_number = account_number;

            $rex = json_decode($response);
            if (empty($rex->account_number)){
                return redirect('verifyBusiness')->with('warning','Account was not generated, userrr not verified');
            }
            else{
            $Wallet = (new \App\Models\Wallet)->create([
                'user_id' => $id,
                'account_name' => $user->name,
                'account_number' => $rex->account_number,
                'account_balance' => 0.00
            ]);
        }

        /*if ('account_number' == NULL)
        {
            return redirect('verify')->with('warning','Account was not generated, userrr not verified');
        }else{
            $rex = json_decode($response);
            $Wallet = (new \App\Models\Wallet)->create([
                'user_id' => $id,
                'account_name' => $user->name,
                'account_number' => $rex->account_number,
                'account_balance' => 0.00
            ]);
        }*/
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('verifyBusiness')->with('warning','Account was not generated, userrr not verified');
    }
    DB::commit();
    $user->notify(new AccountVerificationEmail());
    return redirect('verifyBusiness')->with('success','User has been verified!');
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
        $users = DB::table('individual_details')->where('user_id',$id)->get();
        return view('show', compact('users'));
    }

    public function showBusiness($id){
        $users = DB::table('business_details')->where('user_id',$id)->get();
        return view('showBsn', compact('users'));
    }
    public function showimage($id){
        $users = DB::table('individual_details')->where('user_id',$id)->get();
        return view('showimage', compact('users'));
    }

    public function showdoc($id){
        $users = DB::table('naira_solicitations')->where('id',$id)->first();
        return view('showdoc', compact('users'));
    }

    public function showCofI($id){
        $users = DB::table('business_details')->where('user_id',$id)->get();
        return view('showCofI', compact('users'));
    }

    public function showmemo($id){
        $users = DB::table('business_details')->where('user_id',$id)->get();
        return view('showmemo', compact('users'));
    }
    public function showotherdoc($id){
        $users = DB::table('business_details')->where('user_id',$id)->get();
        return view('showotherdoc', compact('users'));
    }
public function completionprove($id){

    $users = DB::table('naira_solicitations')->where('id',$id)->first();
    return view('completionprove', compact('users'));
}
public function providuslog(Request $request){
    $search = $request['search'] ?? "";
    if($search != ""){
        $log = DB::table('providus_logs')->where('settlement_id','LIKE',"%$search%")->get();
    }else{
        $log = DB::table('providus_logs')->get();
    }
    return view('providuslog', compact('search', 'log'));
}

public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function exportbiz()
    {
        return Excel::download(new BizUsersExport, 'businessusers.xlsx');
    }

// public function approvewithdrawals($id){
//     $userss = DB::table('fund_withdrawals')
//             ->where('user_id', '=' ,$id )
//             ->update(['approval_status' => 1, 'approved_date' => Carbon::now()]);
//         return redirect('withdrawals');
// }


    //$user_wallet->increment('account_balance',  $amount);
}
