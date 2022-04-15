<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChargesController extends Controller
{
    public function charges(){
        return view('charges');
    }
    public function setPayhelpaConfigVariable(Request $request)
    {
        $path = app()->environmentFilePath();
        if (file_exists($path)) {
            $validator =  Validator::make($request->all(),[
                'key' => 'required',
                'value' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->messages()->first(),
                    'success' => false
                ], 422);
            }else {
                if($request->key == 'APP_KEY' || $request->key == 'PAYHELPA_ACCESS_KEY') {
                    return response()->json([
                        'message' => 'Sorry you don\'t have the right to change '.$request->key,
                        'error' => $request->key,
                        'success' => false
                    ], 400);
                } else {
                    file_put_contents($path, str_replace(
                        $request->key . '=' . env($request->key), $request->key . '=' . $request->value, file_get_contents($path)
                    ));
                    return response()->json([
                        'message' => ' Payhelpa variable  '. $request->key. ' '. 'set successfully',
                        'data' => $request->key. ' set to '. $request->value,
                        'success' => true
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'message' => 'Sorry no app environmental file',
                'success' => false
            ], 404);
        }
    }
}
