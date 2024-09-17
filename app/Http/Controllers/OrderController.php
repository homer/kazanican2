<?php

namespace App\Http\Controllers;

use App\Events\NewOrderEvent;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function order(Request $request)
    {
        event(new NewOrderEvent($request->input('userId'), $request->input('amount')));
        return redirect()->back();
    }
}
