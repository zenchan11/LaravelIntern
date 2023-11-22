<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class datbase_raw_queries extends Controller
{
    //
        public function index()
    {

 
    $users = DB::table('users')->get();

        
    return $users;
}

}

