<?php

namespace App\Console\Commands;

use App\Mail\NotifyMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send  email notifications for all users';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users=User::get();
        foreach ($users as $user) {
             Mail::To($user->email)->send(new NotifyMail($user));
        }

    }
}
