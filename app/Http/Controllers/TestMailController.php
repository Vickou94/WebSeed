<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    public function testmail() {
        $mailData = [];

        Mail::to("hello@example.com")->send(new TestEmail($mailData));
    
    }
}
