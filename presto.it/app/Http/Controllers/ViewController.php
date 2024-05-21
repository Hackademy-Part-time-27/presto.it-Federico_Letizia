<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function welcome()
    {
        $advs = Adv::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('advs'));
    }

    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }
}
