<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function query(Request $request)
    {
        if($request->has('search')){
            $posts = Post::search($request->search)->get();
        }else{
            $posts = Post::get();
        }
         return view('search.index', [
             'posts' => $posts
         ]);
    }
}
