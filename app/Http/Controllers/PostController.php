<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('posts.index', compact('posts'));
        // return view('posts.index', [
        //     'post' => $post
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
        ]);

        $post =new Post([
            'title' =>$request->get('title'),
            'description' =>$request->get('description'),
            'Kategori' => $request->get('kategori'),
            'slug' => $request->get('slug'),
            'status' => ($request->get('status') == "on") ? 'publish': 'draft',
        ]);

        if($post->save()) {
            return redirect()->to(route('post.create'))->with([
                'message' => 'Postingan Berhasil Dibuat'
            ]);
        } else {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        {
            $post = DB::table('posts')->where('id', '=', $id)->orWhere('slug', '=', $id)->first();
            return view('posts.show',compact('post'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
        ]);
        $post = Post::find($id);
        $post->title =$request->get('title');
        $post->description =$request->get('description');
        $post->Kategori = $request->get('kategori');
        $post->slug = $request->get('slug');
        $post->status = ($request->get('status') == "on") ? 'publish': 'draft';
        $post->save();
        return redirect('/post')->with('success','Berhasil di edit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete(); 
        return redirect('/post')->with('success','Berhasil di hapus!');
    }
}