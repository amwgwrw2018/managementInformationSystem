<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
class AuthenController extends Controller
{
      public function login(Request $request){
 $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }else{
$account=User::select('password')->where('name',$request->input('username'))->get();
echo $account;
        }
   }
}
