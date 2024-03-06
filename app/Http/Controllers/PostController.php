<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = POST::all();
        return view('posts.index',compact('posts'));
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
    public function store(StorePostRequest $request)
    {
//        to use the following code pass parameter of object Request not StorePostRequest
//        $request->validate([
//            'title'=>'required',
//            'body'=>'required'
//        ]);
//
//        $post = new Post();
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();
//
//        Post::create($request->all());
//
        Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.archive',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request,$id)
    {
        Post::findorFail($id)->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Post::destroy($id);
        Post::findorFail($id)->delete();
        return redirect()->route('posts.index');
    }
    public function restore($id){
        Post::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }
    public function delete($id){
        Post::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
