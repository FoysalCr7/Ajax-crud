<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();
        $posts->title = $request->title;
        $posts->author = $request->author;
        $posts->post = $request->post;

        return $posts->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->author = $request->author;
        $posts->post = $request->post;

        return $posts->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
    }

    public function allpost()
    {
        $post = Post::all();
        return DataTables::of($post)->addColumn('action', function ($post) {
            return '<a onclick="showData(' . $post->id . ')" class="btn btn-sm btn-success">Show</a>' . ' ' .
                '<a onclick="editForm(' . $post->id . ')" class="btn btn-sm btn-info">Edit</a>' . ' ' .
                '<a onclick="deleteData(' . $post->id . ')" class="btn btn-sm btn-danger">Delete</a>';

        })->make(true);


    }
}
