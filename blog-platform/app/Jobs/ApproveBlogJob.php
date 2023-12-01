<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\User;
use App\Notifications\BlogApproved;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class ApproveBlogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $blogs;
    private $users;
    /**
     * Create a new job instance.
     */
    public function __construct(Blog $blogs, User $users)
    {
        //
        $this->users = $users;
        $this->blogs = $blogs;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Notification::send($this->users,new BlogApproved($this->blogs));
    }
}
