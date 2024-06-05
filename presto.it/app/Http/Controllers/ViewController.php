<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Jobs\AddWatermarkToImage;

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

    public function searchAdvs(Request $request)
    {
        $advs = Adv::search($request->searched)->where('is_accepted', true)->paginate(6);
        return view('adv.search', compact('advs'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function about_me()
    {
        return view('about_me');
    }

    public function addWatermark(Request $request)
    {
        $request->validate([
            'image_id' => 'required|integer|exists:images,id',
            'watermark' => 'required|image'
        ]);

        $imageId = $request->input('image_id');
        $watermark = $request->file('watermark');

        $watermarkPath = $watermark->store('watermarks', 'public');

        
        AddWatermarkToImage::dispatch($imageId, storage_path('app/public/' . $watermarkPath));

        return response()->json(['message' => 'Watermark job dispatched successfully!']);
    }
}

