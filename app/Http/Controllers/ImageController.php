<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller

{
    public function index()
    {
        $images = Image::all(); 
        return view('index', compact('images')); 
     }

    public function form()
    {
        return view('form');
    }


    public function store(Request $request)
    {
        $image = $request->file('image');
        if($request->hasFile('image') && $image->isValid())
        {
            $image = $image->getClientOriginalName();
        }
        else
        {
            return;
        }
        
        Image::create([
            'image' => $request->file('image')->storeAs('public/images',$image),
        ]);

        return redirect('/images');

    }
}