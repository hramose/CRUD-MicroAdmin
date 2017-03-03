<?php

namespace App\Http\Controllers;

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

        return view('home', compact('users', 'products'));
    }
}