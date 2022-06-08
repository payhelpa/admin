<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\FundWithdrawal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Notifications\AccountVerificationEmail;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\NairaSolicitation;
use App\Models\IndividualUser;
use App\Models\Transaction;
use Illuminate\Notifications\Notifiable;
use App\Models\Status;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use App\Models\Admin;
use App\Mail\AccountVerified;
use App\Mail\FundsApproved;
use App\Models\Service;


class TransactionController extends Controller
{
    private NairaSolicitation $model;
    private Transaction $transaction;
    private Status $status;
    private IndividualUser $IndividualUser;

    public function __construct(
        NairaSolicitation $model, Transaction $transaction, Wallet $wallet, /*Status $status,*/ IndividualUser $IndividualUser
    )

    {
        $this->model = $model;
        $this->transaction = $transaction;
       // $this->status = $status;
        // $this->helper = $helper;
        // $this->wallet = $wallet;
        $this->IndividualUser = $IndividualUser;
    }
    public static function GetUserType($user_id)
    {
        $country = IndividualUser::where('user_id', $user_id)->select('country')->first();
            if($country != null)
        {
            echo $country->country;
        }
        else
        {
            echo "N/A";
        }
    }
    public function nairaSolicitation($id){
        $NairaSolicitations = NairaSolicitation::find($id)->where('is_taken', 1);
        dd($NairaSolicitations);
        return view('users', compact('NairaSolicitations'));
    }
    public function transactions($id){
        $userss = DB::table('transactions')
        ->where('is_payment_confirmed', 1)
        ->first();
        return view('transactions', compact('userss'));
    }
    public function ongoingstatus(Request $request){
        $userss = $this->model->with(['user', 'solicitors'])->whereHas('transaction', function ($query)  {
            $query->where('is_payment_confirmed', '=', true)->where('status', '!=' , 6);
        })->get();
        return view('ongoingstatus', compact('userss'));
    }
    public function status(Request $request){
        $solicitations = $this->model->with(['user', 'solicitors'])->where('status', '=', 6)->whereHas('transaction', function ($query)  {
            $query->where('is_payment_confirmed', '=', true);
        })->get();
        return view('status', compact('solicitations'));
    }
    public function singleSolicitors($id){
        $solicitation = $this->model->with(['solicitors'])->find($id);
        $transactionsolicitations = $this->model->with(['user', 'solicitors'])->find($id);
        return view('singleSolicitors', compact('solicitation', 'transactionsolicitations'));
    }

    public function successinfo($user_id){
        $userss = DB::table('transactions')->where('user_id', $user_id)->where('is_payment_confirmed', 1)->get();
        return view('successinfo', compact('userss'));
    }public function fupending(){
        $userss = DB::table('offers')->get();
        return view('fupending', compact('userss'));
    }
    public function pendinginfo($user_id){
        $userss = DB::table('naira_solicitations')->where('user_id', $user_id)->get();
        return view('pendinginfo', compact('userss'));
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
    public function withdrawals(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $fund_withdrawal = FundWithdrawal::where('account_name','LIKE',"%$search%")->orWhere('account_number','LIKE',"%$search%")->get();
        }else{
            $fund_withdrawal = FundWithdrawal::all();
        }
        return view('withdrawals', compact('search', 'fund_withdrawal'));
    }
    public function approvewithdrawals($id){

        $fund_withdrawal = FundWithdrawal::find($id);
        $email = User::where('id', '=', $fund_withdrawal->user_id)->select('email')->first();
        $name = User::where('id', '=', $fund_withdrawal->user_id)->select('name')->first();
        //dd($email);
        //$fund_withdrawal = DB::table('fund_withdrawals')->where('user_id', '=' ,$id )->first();
        //dd($fund_withdrawal);
        $wallet = Wallet::where('user_id', '=', $fund_withdrawal->user_id)->first(); //get user wallet
        $fund_withdrawal->update([
            'approval_status' => 1,
            'approved_date' => Carbon::now()
        ]);

        $email_user = new FundsApproved([
            'name' => $name,
        ]);

        $wallet->decrement('account_balance',  $fund_withdrawal->amount);
        Mail::to($email)->send(new FundsApproved($email_user));
        //Mail::to($request->email)->send(new NewMessage($content, $request));
        return redirect('withdrawals');
    }
    public function singleOngoinginfo($id){
        $solicitation = $this->model->with(['solicitors'])->find($id);
            //dd($solicitation);
            //transaction details
            $transactionsolicitations = $this->model->with(['user', 'solicitors'])->find($id);
        return view('singleongoinginfo', compact('solicitation', 'transactionsolicitations'));

    }
    public function statusdeclined(){
        // $userss = $this->model->with(['user'])->where('is_taken', '=', false)->whereHas('transaction', function ($query)  {
        //     $query->where('is_payment_confirmed', '=', true);
        // })->get();
        $userss = DB::table('naira_solicitations')->where('is_taken', 0)->get();
        return view('pendingstatus', compact('userss'));
    }

    public function singlependinginfo($id){
        //'status' => \App\Enums\TransactionStatusEnum::CREDIT_WALLET,
         //   dd($user);
    //     $data = $this->model->where('id', '=', $id)->exists();
    //     if ($data) {
    //        // $user = DB::table('naira_solicitations')->where('user_id', $id)->get();
    //         $user = $this->model->with(['status' => \App\Enums\TransactionStatusEnum::CREDIT_WALLET])->find($id);
    //$user = $this->model->with(['status'])->find($id);
    //             dd($user);
    //     }
       // dd($userss);
        $user = DB::table('naira_solicitations')->where('id', $id)->get();
        return view('singlependinginfo', compact('user'));
    }

}
