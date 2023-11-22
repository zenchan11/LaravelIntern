<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formedit extends Controller
{
    //
    public function edit(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        echo $id,$name, $email;

        DB::table('forms')->where('id',$id)->update(['name' => $name, 'email' => $email]);
        $data = DB::table('forms')->get();

        return view('example',['data'=> $data]);
    }
}
