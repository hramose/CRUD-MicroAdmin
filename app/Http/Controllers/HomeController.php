<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class HomeController extends Controller
{

    public function manageVue()
    {
        $users = User::all()->count();
        $products = Item::all()->count();
        $sales = Sale::all()->count();

        return view('home', compact('users', 'products', 'sales'));
    }
}