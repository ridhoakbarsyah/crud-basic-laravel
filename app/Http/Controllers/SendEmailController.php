<?php

namespace App\Http\Controllers;

use App\Mail\TestSendingEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $user = User::all();
        Mail::to('dev.ridho.ramadhan@gmail.com')->send(new TestSendingEmail($user));
        // dd('test');
    }
}
