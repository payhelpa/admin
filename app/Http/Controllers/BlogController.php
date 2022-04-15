<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog(){
        return view('blog');
    }
    public function createblog(Request $request){
        $blog = Blog::create([
            'title' =>  request('title'),
            'body' => request('body'),
            'cover_image' => request('cover_image')
        ]);

        return view('blog',compact('blog'))->with('error','Created successfully!');
    }
}
