<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;
use App\Jobs\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\newmessage;
use Illuminate\Support\Facades\Bus;


class QueueController extends Controller
{
    //
    public function run(){

        $batch = Bus::batch([
            new ProcessPodcast,
            new order,
        ])->dispatch();
    // ProcessPodcast::dispatch()->delay(5);

    }
}
