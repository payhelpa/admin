<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use JD\Cloudder\Facades\Cloudder;

class BlogController extends Controller
{
    public function blog(){
        $tags =Tag::all();
        return view('blog', compact('tags'));
    }
    public function createblog(Request $request){
        Cloudder::upload(request('cover_image'), null, [
            "folder" => "payhelpa-documents",  "overwrite" => FALSE, "resource_type" => "image"
        ]);
        $upload = Cloudder::getResult();


        if (empty(request('tags'))){
            return redirect()->back()->with('blogfail',' Published Successfully');
        }
        else{
            $blog = Blog::create([
                'title' =>  request('title'),
                'blog_description' =>  request('blog_description'),
                'body' => ($request->body),
                'cover_image' => $upload['url'],
                'tags' => request('tags'),
            ]);
    }
    return redirect()->back()->with('blogsuccess',' Published Successfully');
}
    public function allblog(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $blogs = Blog::where('title','LIKE',"%$search%")->get();
        }else{
            $blogs =Blog::latest('created_at')->get();
        }
        //return view('providuslog', compact('search', 'log'));
        //$blogs =Blog::latest('created_at')->get();
        return view('allblog', compact('search','blogs'));
    }
    public function blogdetails($id){
        $blogs =Blog::where('id',$id)->get();
        $blogdetails = BlogComment::where('id',$id)->get();
        return view('blogdetails', compact('blogs','blogdetails'));
    }

    public function editblog($id){
        $blogs = Blog::find($id);
        return view('blogupdate')->with('blogs',$blogs);
    }
    public function updateblog(Request $request,$id){
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->body = $request->input('body');
        $blog->body = $request->input('body');
        $blog->tags = $request->input('tags');
        $blog->update();
        return redirect()->route('allblog')->with('error',' Updated Successfully');
    }
    public function deleteblog($id){
        Blog::destroy($id);
        return redirect()->route('allblog')->with('blogdel',' Published Successfully');
    }
    public function createtag(){
        $tag = Tag::create([
            'title' =>  request('title'),
            'description' => request('description')
        ]);
        //return view('addtag', compact('tag'))
        return redirect()->back()->with('error','Created successfully!');
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
