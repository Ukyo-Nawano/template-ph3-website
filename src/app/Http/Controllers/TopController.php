<?php

namespace App\Http\Controllers;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function toppage()
        {
            return view ('top.toppage');
            // return view ('user.index', ['users' => $users]);
        }
}