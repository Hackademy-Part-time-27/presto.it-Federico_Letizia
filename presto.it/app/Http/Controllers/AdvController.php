<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;

class AdvController extends Controller
{
    public function createAdv()
    {
        return view('adv.create');
    }

    public function showAdv(Adv $adv)
    {
        return view('adv.show', compact('adv'));
    }

    public function indexAdv()
    {
        $advs = Adv::paginate(6);
        return view('adv.index', compact('advs'));
    }
}
