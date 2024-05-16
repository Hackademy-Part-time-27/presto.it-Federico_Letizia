<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvController extends Controller
{
    public function createAdv()
    {
        return view('adv.create');
    }
}
