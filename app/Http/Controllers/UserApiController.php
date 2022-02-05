<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Http\Controllers\Api;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Str;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Validator;
use \Carbon\Carbon;


class UserApiController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            //'user_id' => 'required',
            'password' => 'required',
            'is_business' => 'required',
            
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
           // 'user_id' => $fields['user_id'],
            'password' =>bcrypt( $fields['password']) ,
            'is_business'=> $fields['is_business'],
            'daily_transaction_limit'=> 1000,
               
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $success = 'Please verify account by clicking on the mail sent to your email';
       $this->sendVerificationEmail($user->email, $user->name);
       $user->sendEmailVerificationNotification();

       

        /*$response = [
            'user' => $user,            
            'message' =>  $success,
            'token' => $token
        ];*/
        return response([
            'message' => 'Please Verify your email and then login'
        ], 201);////response($response, 201);    
    }

    public function logina($request)
    {
          $validator = Validator::make($request->all(), [
              'email' => 'required|email',
              'password' => 'required',
          ]);
          if ($validator->fails()) {
              return response()->json([
                  'message' => $validator->messages()->first()
              ], 422);
          }else {
                if (! $token = auth()->attempt($validator->validated())) {
                    return response()->json([
                      'error' => 'Incorect email or password'
                    ], 401);
                }
                if (auth()->user()->email_verified_at == NULL) {
                  return response()->json([
                    'error' => 'Email must be verified'
                  ], 401);

                }else {
                  $token =  $this->token_helper->createNewToken($token);
                  if ($token) {
                      $logRequest = [
                          'log_type' => 'SignIn',
                          'description' => "Login Attempt",
                      ];
                      $this->helper->createLog($logRequest);
                      return response()->json([
                          'token' => $token
                      ], 200);
                  }
                }
          }
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        $user = User::where('email', $fields['email'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong infoo'
            ], 401);
        }
        if ($user->email_verified_at == NULL) {
            return response()->json([
              'error' => 'Email must be verified'
            ], 401);

        } else {
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response, 201);
        }
    }
    public function verifyEmailAddress(Request $request)
    {
        $validator =  Validator::make($request->all(),[
              "token"  =>  'required',
          ]);

          if ($validator->fails()) {
              return response()->json([
                  'message' => $validator->errors(),
                  'success' => false
              ], 422);
          }else {
             $token = VerificationToken::where('token', '=', $request->token)->first();
             if ($token) {
                  $verify = User::where('email', '=', $token->email)->first();
                  $ack = $verify->update([
                      'email_verified_at' => Carbon::now()
                  ]);
                  return response()->json([
                      'message' => 'Email have  been  verified',
                      'success' => true
                  ], 200);
             }else {
              return response()->json([
                  'message' => 'Token not found',
                  'success' => false
              ], 404);
             }
          }
    }


}