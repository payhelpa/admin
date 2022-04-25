<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use JD\Cloudder\Facades\Cloudder;

class BlogController extends Controller
{
    public function blog(){
        return view('blog');
    }
    public function createblog(Request $request){
        // if( $request->Hasfile('cover_image') )
        //     { dd('exist');
        //     } else {
        //         dd('false');
        //      }
        Cloudder::upload(request('cover_image'), null, [
            "folder" => "payhelpa-documents",  "overwrite" => FALSE, "resource_type" => "image"
        ]);
        $upload = Cloudder::getResult();

        $blog = Blog::create([
            'title' =>  request('title'),
            'body' => request('body'),
            'cover_image' => $upload['url']
        ]);

        return view('blog');
    }
    public function allblog(){
        return view('allblog');
    }
}
