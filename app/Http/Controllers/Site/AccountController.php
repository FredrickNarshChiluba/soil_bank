<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AccountController extends Controller
{
    public function getOrders()
    {
        $orders = auth()->user()->orders;
        dd(auth()->user());

        return view('site.pages.account.orders', compact('orders'));
    }
}
