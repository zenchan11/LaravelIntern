<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tablesdata extends Controller
{
    //
    public function retrieve(){
        $data = DB::table('forms')->get();

        return view('example', ['data'=> $data]);

    }

}
