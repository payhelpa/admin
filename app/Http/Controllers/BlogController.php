<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Tag;
use JD\Cloudder\Facades\Cloudder;

class BlogController extends Controller
{
    public function blog(){
        $tags =Tag::all();
        return view('blog', compact('tags'));
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
            'body' => strip_tags($request->body),
            'cover_image' => $upload['url'],
            'tags' => request('tags'),
        ]);
        //$body = strip_tags($request->body);
        return redirect()->back()->with('error',' Updated Successfully');
        //return view('blog');
    }
    public function allblog(){
        $blogs =Blog::all();
        return view('allblog', compact('blogs'));
    }
    public function blogdetails($id){
        $blogs =Blog::where('id',$id)->get();
        $blogdetails = BlogComment::where('id',$id)->get();
        return view('blogdetails', compact('blogs','blogdetails'));
    }
    public function createtag(){
        $tag = Tag::create([
            'title' =>  request('title'),
            'description' => request('description')
        ]);
        return view('addtag', compact('tag'))->with('error','Created successfully!');
    }
    public function addtag(Request $request){
        return view('addtag');
    }
    public function tag(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $tag = Tag::where('title','LIKE',"%$search%")->get();
        }else{
            $tag = Tag::all();
        }
        return view('tag', compact('search', 'tag'));
    }
    public function edittag($id){
        $tag = Tag::find($id);
        return view('tagupdate')->with('tag',$tag);
    }
    public function updatetag(Request $request,$id){
        $tag = Tag::find($id);
        $tag->title = $request->input('title');
        $tag->description = $request->input('description');
        $tag->update();
        return redirect()->back()->with('error',' Updated Successfully');
    }
    public function deletetag($id){
        Tag::destroy($id);
        return redirect()->route('tag');
    }
    public function gettag()
    {
        $tag =Tag::get();
         //$data = DB::table('publications')->get();

        return view('blog',compact('tag'));
    }

}
