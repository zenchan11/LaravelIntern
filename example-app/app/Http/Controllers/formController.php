<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class formController extends Controller
{
    //
    public function submit(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');


        DB::table('forms')->insert(['name'=>$name, 'email' => $email]);

        return redirect()->route('tables');
    }
}
