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
    public function index(Fossil_post $post, Request $request)
    {
        return view('index')->with(['posts' => $post->searchQuery(request('keyword'))]);
        
        //$keyword = request('keyword');
        //dd($keyword);
        
        //return view('index', compact('keyword', 'posts'));
    }
    

    
    
    public function show(Fossil_post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $query = Fossil_post::query();
        
        if (!empty($keyword)) {
            $query->where('JapaneseName', 'LIKE', "%{$keyword}%")->orwhere('ScientificName', 'LIKE', "%{$keyword}%");
        }
        
        $search_posts = $query->get();
        
        return view('search')->with(['search_posts' => $search_posts]);
    }
    
    public function store(Fossil_post $post, Request $request)
    {
        $input = $request['post'];
        $post->user_id = $request->user()->id;
        
        
        $image = $request->file('image');
        if($request->hasFile('image') && $image->isValid())
        {
            $image = $image->getClientOriginalName();
        }
        
        $input += ['image' => $request->file('image')->storeAs('public/images',$image)];
        
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Fossil_post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
