<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    public function __construct(){
        //$this->middleware('cors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return $posts;
    }

    public function postList(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.posts_list', compact('posts'));
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
        try {
            $post = $this->savePost($request);
            
            $request->session()->flash('message', 'Post created successfully');
            return redirect(route('post.edit', $post->id));

        } catch(Exception $e){
            $request->session()->flash('error', $e->getMessage());
            return back();
        }
    }


    /**
     * Create or edit a post
     *
     * @param $request
     * @param null $id
     * @return bool
     */
    public function savePost($request, $id = null){
        if(is_null($id))
            $post = new Post();
        else
            $post = Post::find($id);

        if ($request->hasFile('image_header')) {
            //dd($request->file('image_header'));

            $path = 'uploads/';
            //dd($path);
            $filename = str_random(5) .'_'. $request->file('image_header')->getClientOriginalName();
            $request->file('image_header')->move($path, $filename);
            $full_path = $path . $filename;
            $full_path = url('/') .'/'. $full_path;
        } else {
            $full_path = $post->image_header;
        }



        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->summary = $request->summary;
        $post->content = $request->content;
        $post->image_header = $full_path;
        $post->user_id = auth()->user()->id;
        $post->date = $request->created_at;
        $post->save();
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('user')->where('slug', $id)->first();
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->savePost($request, $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return back();
    }
}
