<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class PasswordResetController extends Controller
{
    //
    public function forgetPassword(){
        return view('password_reset.forget');
    }

    public function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);


        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('password_reset.reset', ['token'=>$token], function ($message) {
            $message->to('john@johndoe.com', 'John Doe');   
            $message->subject('password reset');

        });

        return redirect()->route('forget.password')->with('success','email reset link sent');


    }

    public function resetPassword($token){
        return view('password_reset.resetpassword',compact('token'));
    }
    // public function resetPassword(Request $request){
    //     $token = $request->query('token');
    //     return view('password_reset.resetpassword',compact('token'));
    // }
    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' =>'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatepassword = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$updatepassword){
            return redirect()->back()->with('error','Invalid details');
        }

        DB::table('users')->where('email', $request->email)->update([
            'password' => Hash::make($request->password)]);
        
        DB::table('password_reset_tokens')->where('email',$request->email)->delete();

    return redirect()->route('login')->with('reset_success','password reset successful');
    }
}
