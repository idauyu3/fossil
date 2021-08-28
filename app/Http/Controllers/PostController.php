<?php

namespace App\Http\Controllers;

use App\Fossil_post;
use App\Image;
use App\Like;
use Illuminate\Support\Facades\Auth;
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
    }
    
    public function ranking()
    {
        $rankingPostlikes = Fossil_post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(10);
        
        return view('ranking', [
            'rankingPostLikes' => $rankingPostlikes,        
        ]);
    }
    
    
    public function show(Fossil_post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function edit(Fossil_post $post)
    {
        return view('edit')->with(['post' => $post]);
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
    
    public function update(Request $request, Fossil_post $post)
    {
        $input_post = $request['post'];
        
        if($request->hasFile('image')) {
            Fossil_post::delete('public/image/' . $post->image);
            $image = $request->file('image')->store('public/image');
            $post->image = basename($post);
            $post->save();
        }
        
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function store(Fossil_post $post, Request $request)
    {
        $input = $request['post'];
        $post->user_id = $request->user()->id;
        
        $post->fill($input)->save();
        
        $files = $request->file('image');
        foreach($files as $file) {
            if($request->hasFile('image') && $file->isValid())
            {
                $file_name = $file->getClientOriginalName();
            }
        
            //$input += ['image' => $request->file('image')->storeAs('public/images',$image)];
            
            $image = new Image();
            
            $image->path = $file->storeAs('public/images', $file_name);
            $image->fossil_post_id = $post->id;
            $image->save();
        }
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Fossil_post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    //↓いいね機能の設定
    public function _construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        Like::create([
           'fossil_post_id' => $id,
           'user_id' => Auth::id(),
        ]);
        
        session()->flash('succes', 'You Liked the Reply.');
        
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('fossil_post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        
        session()->flash('success', 'You Unlike the Reply.');
        
        return redirect()->back();
    }
}
