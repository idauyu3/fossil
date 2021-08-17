<?php

namespace App\Http\Controllers;

use App\Fossil_post;
use Illuminate\Http\Request;

class PostController extends Controller
{
       /**
    * Post一覧を表示する
    * 
    * @param Post Postモデル
    * @return array Postモデルリスト
    */
    public function index(Fossil_post $post)
    {
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Fossil_post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Fossil_post $post, Request $request)
    {
        $input = $request['post'];
        $post->user_id = $request->user()->id;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Fossil_post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
    
}
