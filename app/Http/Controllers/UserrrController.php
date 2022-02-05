<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\AccountVerificationEmail;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;
use Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessage;
use App\Helpers\Helper;
//use \Illuminate\Notifications\Notifiable; 
use \Illuminate\Notifications\RoutesNotifications;
use Carbon\Carbon;
 

class UserrrController extends Controller
{
   
 /* public function dashboard()
    {
        $count = DB::table('users')->count();
        $counttrans = DB::table('transactions')->count();
            
        $post = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
            //->whereDate('transactions.created_at')
            ->latest('transactions.created_at')
            ->limit(5)
            ->get();
                
        $avg = DB::table('users')->avg('name');
            //DB::table('users')->avg()
            
        $sales = DB::table('transactions')->where('status', 2)->sum('amount_requested');
            
        $ver = DB::table('users')->where('kyc_verified', 1)->count();
                
                //users chart 
        $chart = User::select('user_id','created_at')->get()->groupBy(function($chart){
            return Carbon::parse($chart->created_at)->format('M');
        });
                
        $months=[];
        $monthCount=[];
        foreach($chart as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }             
            //transaction chart
            
        $transactionschart = DB::table('transactions')->select('transaction_id','updated_at')->where('status', 2)->get()->groupBy(function($transactionschart){
            return Carbon::parse($transactionschart->updated_at)->format('M');
        });
            
        $pendingtransactionschart = DB::table('transactions')->select('transaction_id','updated_at')->where('status', 0)->get()->groupBy(function($pendingtransactionschart){
            return Carbon::parse($pendingtransactionschart->updated_at)->format('M');
        });
            
        $ongoingtransactionschart = DB::table('transactions')->select('transaction_id','updated_at')->where('status', 1)->get()->groupBy(function($ongoingtransactionschart){
            return Carbon::parse($ongoingtransactionschart->updated_at)->format('M');
        });
            
        $monthss=[];
        $monthCounts=[];
            
        foreach($transactionschart as $month => $valuess){
            $monthss[]=$month;
            $monthCounts[]=count($valuess);
        }
            
            // foreach($pendingtransactionschart as $month => $valuess){
            //     $monthss[]=$month;
            //     $susmonthCounts[]=count($valuess);
            // }
            //  foreach($ongoingtransactionschart as $month => $valuess){
            //     $monthss[]=$month;
            //     $onmonthCounts[]=count($valuess);
            // }
                
        return view('dashboard',['chart'=>$chart, 'transactionschart'=>$transactionschart, 'months'=>$months, 'monthCount'=>$monthCount, 'monthss'=>$monthss, $susmonthCounts=>'susmonthCounts', 'monthCounts'=>$monthCounts], compact('count', 'counttrans', 'post', 'avg', 'sales', 'ver'),collect($result_arr)->toJson());

    }*/
    public function user(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $userss = User::where('name','LIKE',"%$search%")->get();
        }else{
            $userss = User::all();
        }
         return view('users', compact('search', 'userss'));
         /*$userss = DB::table('users')->get();
         return view('users', compact('userss'));*/
    }
    public static function GetUserName($user_id)
    {
        $user = User::where('user_id', $user_id)->select('name')->first();
        if($user != null)
        {
            echo $user->name;
        }
        else
        {
            echo "";
        }
        
    }    
    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = User::where('name','LIKE',"%$search%")->get();
        }else{
            $users = User::all();
        }
        return view('users', compact('search', 'users'));
       /* if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $countries = DB::table('users')->where('name','LIKE','%'.$search_text.'%')->paginate(2) ;
            return view('users',['countries'=>$countries]);
        }*/
      
    }    
    public function user_details($user_id){
        $userss = DB::table('users')->where('id',$user_id)->get();
         //counting the transactions     
         //$pending = User::leftjoin('transactions', 'users.user_id' , '=', 'transactions.lu_id')
        //->join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
        // ->where('user_id',$user_id)
        // ->where('transactions.status', 0)
        // ->get();
        // $countpending =$pending->count();
        
        // $pending = DB::table('transactions') 
        // ->join('users AS A', 'transactions.lu_id', '=', 'A.user_id') 
        // ->join('users AS B', 'transactions.fu_id', '=', 'B.user_id') 
        // -> select('transactions.*', 'A.user_id as lu_id', 'B.user_id as fu_id') 
        // ->Where('transactions.status', 0)
        // ->orWhere('B.user_id',$user_id)
        // ->orwhere('A.user_id',$user_id)
        // ->count();
        
         $goinging = DB::table('users')
         ->select('is_foreign_user') 
         ->where('id', '=' ,$user_id)
        ->first();
         if ($goinging->is_foreign_user == 1) {
                $pending = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 0)
                ->count();
            }
            else{
                 $pending = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 0)
                ->count();
            }
        
         
        /*$pending = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
        //->join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
        ->where('user_id',$user_id)
        ->where('transactions.status', 0)
        ->get();
        $countpending =$pending->count();
        
        $fu_id=DB::table('transactions')->pluck('fu_id');
        $lu_id=DB::table('transactions')->pluck('lu_id');
        User::where(function($ongoinging) {
        return $ongoinging->whereIn('user_id', $fu_id)
        ->orWhereIn('user_id', $lu_id);
        })->get();
        */
        
       /* $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
        ->where('user_id',$user_id)
        ->where('transactions.status', 1)
        ->count();*/
        
        // $post = DB::table('transactions')
        // ->join('users', 'transactions.user', '=', 'users.id')
        // ->select(/*'users.name',*/'id','rate','amount')
        // ->where('transactions.status', 2)
        // ->orWhere('users.is_foreign_user', 1)
        // ->get();
        
         $goinging = DB::table('users')
         ->select('is_foreign_user') 
         ->where('user_id', '=' ,$user_id)
        ->first();
         if ($goinging->is_foreign_user == 1) {
                $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 1)
                ->count();
            }
            else{
                 $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 1)
                ->count();
            }
        
        // $ongoinging = DB::table('transactions')
        // ->join('users AS A', 'transactions.lu_id', '=', 'A.user_id') 
        // ->orjoin('users AS B', 'transactions.fu_id', '=', 'B.user_id') 
        // ->select('A.user_id as lu_id', 'B.user_id as fu_id')
        
        // ->where('transactions.status', 1)
        // ->orWhere('lu_id',$user_id)
        // ->orWhere('fu_id',$user_id)
        // ->count();
        
        
        // DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
            
        // -> select('transactions.*', 'A.user_id as lu_id', 'B.user_id as fu_id') 
        // -> get();
        
        /*$ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
        ->where('user_id',$user_id)
        ->where('transactions.status', 1)
        ->count();*/
        
        // $success = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
        // ->where('user_id',$user_id)
        // ->where('transactions.status', 2)
        // ->count();
        
        //  $success = DB::table('transactions') 
        // ->join('users AS A', 'transactions.lu_id', '=', 'A.user_id') 
        // ->join('users AS B', 'transactions.fu_id', '=', 'B.user_id') 
        // -> select('transactions.*', 'A.user_id as lu_id', 'B.user_id as fu_id') 
        // ->Where('transactions.status', 2)
        // ->orWhere('B.user_id',$user_id)
        // ->orwhere('A.user_id',$user_id)
        // ->count();
        
         $goinging = DB::table('users')
         ->select('is_foreign_user') 
         ->where('user_id', '=' ,$user_id)
        ->first();
         if ($goinging->is_foreign_user == 1) {
                $success = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 2)
                ->count();
            }
            else{
                 $success = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 2)
                ->count();
            }
        
        /* $success = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
        ->where('user_id',$user_id)
        ->where('transactions.status', 2)
        ->count();*/
        
        return view('user_details', compact('userss', 'pending', 'ongoinging', 'success'));
    }
    
     public function view_transaction_details($user_id){
        $userss = DB::table('users')->where('user_id',$user_id)->get();
        //counting the transactions  
        $C='0';
         
       $goinging = DB::table('users')
         ->select('is_foreign_user') 
         ->where('user_id', '=' ,$user_id)
        ->first();
         if ($goinging->is_foreign_user == 1) {
                $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
                ->select('transactions*')
                ->where('user_id',$user_id)
                ->where('transactions.status', 1)
                ->get();
            }
            else{
                 $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 1)
                ->get();
            }
        
        return view('individualsuccessinfo', compact('userss', 'ongoinging','C'));
    }
    
     public function view_transaction_details_pending($user_id){
        $userss = DB::table('users')->where('user_id',$user_id)->get();
         //counting the transactions  
         $C='0';
         
       $goinging = DB::table('users')
         ->select('is_foreign_user') 
         ->where('user_id', '=' ,$user_id)
        ->first();
         if ($goinging->is_foreign_user == 1) {
                $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
                ->select('transactions*')
                ->where('user_id',$user_id)
                ->where('transactions.status', 0)
                ->get();
            }
            else{
                 $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 0)
                ->get();
            }
        
        return view('individualpendinginfo', compact('userss', 'ongoinging','C'));
    }
    
     public function view_transaction_details_success($user_id){
        $userss = DB::table('users')->where('user_id',$user_id)->get();
         //counting the transactions  
         $C='0';
         
       $goinging = DB::table('users')
         ->select('is_foreign_user') 
         ->where('user_id', '=' ,$user_id)
        ->first();
         if ($goinging->is_foreign_user == 1) {
                $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.fu_id')
                ->select('transactions*')
                ->where('user_id',$user_id)
                ->where('transactions.status', 1)
                ->get();
            }
            else{
                 $ongoinging = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
                ->where('user_id',$user_id)
                ->where('transactions.status', 1)
                ->get();
            }
        
        return view('individualsuccessinfo', compact('userss', 'ongoinging','C'));
    }
        
    public function message(Request $request, $user_id){
          $user = DB::table('users')
         ->select('email')
         ->where('user_id', $user_id)->first();
         $email = $user->email;
         return view('message',compact('email'));
    }
     public function messagesend(Request $request){
         
         $msg = (new Helper())->helpermessagesend($request);
         return $msg;
        /* $content = [
             "subject"=>"New Message from PayHelpa",
             "details"=>$request->details
         ];
         Mail::to($request->email)->send(new NewMessage($content, $request));
         
        return redirect('ongoingstatus')->with('success','Message Sent!');*/
    }
    
    public function transactions(){
        $post = DB::table('transactions')->get();
        return view('transactions', compact('post'));
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
    public function selectuser(){
         return view('selectuser');
                         
     }

    public function localUsersStatus(){
        $post = DB::table('transactions')
        //->join('users', 'transactions.user', '=', 'users.id')
        ->select(/*'users.name',*/'id','rate','amount')
        ->where('transactions.status', 2)
        ->get();
        return view('localUsersStatus', compact('post'));
    }
    public function foreignUsersStatus(){
        $post = DB::table('transactions')
        ->join('users', 'transactions.user', '=', 'users.id')
        ->select(/*'users.name',*/'id','rate','amount')
        ->where('transactions.status', 2)
        ->orWhere('users.is_foreign_user', 1)
        ->get();
        return view('foreignUsersStatus', compact('post'));
    }
    public function recenttrans(){
        $post = DB::table('transactions')
        ->where('is_taken', 1)
         ->orderBy('transactions.id DESC')
        ->get();
        //return $post;
        return view('dashboard', compact('post'));
        
    }
    
    public function status(){
        $post = DB::table('transactions')
        ->where('transactions.status', 2)
        // ->where('is_taken', 1)
        ->get();
        //return $post;
        return view('status', compact('post'));
    }
    
    public function successinfo($transaction_id){
       $post = DB::table('transactions')->where('transaction_id', $transaction_id)->get();
        return view('successinfo', compact('post'));
    }
    
    public function ongoingstatus(){
        $post = DB::table('transactions')
         ->where('transactions.status', 1)
        //->where('is_taken', 1)
        ->get();
        return view('ongoingstatus', compact('post'));
    }
    
    public function statusdeclined(){
         $post = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')
        ->where('transactions.status', 0)
        ->where('transactions.is_taken', 0)
       //->orWhere('transactions.status', 2)
        ->get();
        return view('pendingstatus', compact('post'));
    }
     public function pendinginfo($transaction_id){
       $post = DB::table('transactions')->where('transaction_id', $transaction_id)->get();
        return view('pendinginfo', compact('post'));
    }
    public function verify(Request $request){
         $search = $request['search'] ?? "";
        if($search != ""){
            $users = User::where('kyc_submitted', 1)->where('name','LIKE',"%$search%")->orWhere('reserved_account_number','LIKE',"%$search%")->get();
        }else{
            $users = User::where('kyc_submitted', 1)->get();
        }
         return view('verify', compact('search', 'users'));
        
        // $users = DB::table('users')->where('kyc_submitted', 1)->get();
        // return view('verify', compact('users'));
    }
    
    public function unverified(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $users = User::where('kyc_verified', 0)->where('name','LIKE',"%$search%")->orWhere('reserved_account_number','LIKE',"%$search%")->get();
        }else{
            $users = User::where('kyc_verified', 0)->get();
        }
            return view('unverified', compact('search', 'users'));
    }
    public function update_verify(Request $request, $id){
        $post = User::where('id', '=' ,$id)->first();
                    $response = Http::withHeaders([
                    'X-Auth-Signature' => '63305c904b499922cf2d88cdec26e808c8154fb9d8bb4ab222d84df0e3853e85fafe71e326313205ee849171155644cc4b7e413cee2e301018fdc93a9ee3fc80',
                    'Client-Id' => 'cEBZSDMxTHBhX1ByMCgpLg==',
                    //'Secret'=> 'CC1BF237E7EDD89DB08A804F5B8A16E7DBDE4432664BDD54C6AD943CD6F6F012'
                ])->post('https://vps.providusbank.com/vps/api/PiPCreateReservedAccountNumber', [
                    'account_name' => $post->name,
                    'bvn' =>'',
                ]);
                $account_number = json_decode($response);
                if($response->status() == 200){
                    if($account_number->requestSuccessful == TRUE){
                    $post->update([
                        'reserved_account_number'=> $account_number->account_number
                         //'kyc_submitted' => 0,
                         //'kyc_verified' => 1
                   ]);
                   $val = array('kyc_submitted' => 0,
                        'kyc_verified' => 1); 
                        DB::table('users')->where('id',$id)->update($val);
                        $post->notify(new AccountVerificationEmail());
                        Alert::success('User has been verified');
                        return redirect('verify')->with('success','User has been verified!');
                    }
                    else{
                    Alert::error('Account was not generated, user not verified');
                        return redirect('verify')->with('error','Account was not generated, user not verified');
                    }
                }
                
               /* if ($response->status() == 200 || $account_number->requestSuccessful == TRUE){
                    $post->update([
                        'reserved_account_number'=> $account_number->account_number,
                        //'kyc_verified' => 1,
                        //'kyc_submitted' => 1,
                    ]);
                    
                    // if ($post->kyc_submitted == 0) {
                    //  $kyc_submitted = 1;
                    // } else{
                    //  $kyc_submitted = 0;
                    // }
                        $val = array('kyc_submitted' => 0,
                        'kyc_verified' => 1); 
                        DB::table('users')->where('id',$id)->update($val);
                }
                
                else {
                    return redirect('verify')->with('error','User was not verified!');
                }      
                //$post->kyc_submitted = 1;
                //$name ='name';
                 $name = User::where('id', '=' ,$id)->select('name')->first();


                
          //  $vermail = User::find($id);
          $post->notify(new AccountVerificationEmail($name));*/
           // $vermail->notify(new AccountVerificationEmail());
        /* Alert::success('User has been verified');
            return redirect('verify')->with('success','User has been verified!');*/
           // Notification::send($users, new AccountVerificationEmail());
        //$users->notify(new AccountVerificationEmail());
        
        /*foreach ($users as $user) {
            $user->notify(new AccountVerificationEmail());
        }*/

    }
       
    public function show($id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('show', compact('users'));
    }
    public function showimage($id){
        $users = DB::table('users')->where('id',$id)->get();
        return view('showimage', compact('users'));
    }
     public function countsuccessfultrans($user_id){
        $userss = User::join('transactions', 'users.user_id' , '=', 'transactions.lu_id')->where('transactions.status', 2)->count();
        // $users = DB::table('users')->where('id',$id)->get();{
            
        // }
        
        //  $users = DB::table('transactions')->where('id',$id)->count();
         
        //   $userss = DB::table('userss')->where('id',$id)->get();
         return view('user_details', compact('userss'));
        
    }
    
}
