<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessagePosted;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post(Request $request)
    {
        event(new MessagePosted(Auth::user(), $request->get('message')));
    }
}
