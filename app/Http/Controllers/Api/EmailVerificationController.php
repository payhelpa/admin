<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


//use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\VerifiesEmails;
//use Illuminate\Auth\Access\AuthorizationException;

class EmailVerificationController extends Controller
{
    public static function SendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()){
            return response(['message'=>'Already Verified']);
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];
    }

    public function verify(EmailVerificationRequest $request)
    {
        /*auth()->loginUsingId($request->route('id'));
        if ($request->route('id') != $request->user()->getKey()) {
            throw new AuthorizationException;
        }*/

        if ($request->user()->hasVerifiedEmail()) {
            return response(['message'=>'Already Verified']);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return response(['message'=>'Successfully Verified']);
    }
}
