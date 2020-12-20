<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = Post::all();


        return view('backend.post.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validate
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $is_active = 0;
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        //luu vào csdl
        $post = new Post();
        $post->title = $request->input('title'); // tiêu đề bài viết
        $post->slug = str_slug($request->input('title'));
        $post->content = $request->input('content'); // email
        $post->position = $request->input('position');
        if ($request->has('is_hot')){
            $post->is_hot = $request->input('is_hot');
        }
        $post->views = 0;
        $post->summary = $request->input('summary');

        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        if ($request->hasFile('thumbnail')) {
            // get file
            $file = $request->file('thumbnail');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/post/';
            // upload file
            $request->file('thumbnail')->move($path_upload,$filename);

            $post->thumbnail = $path_upload.$filename;
        }
        $post->user_id = Auth::user()->id;
        $post->user_id_edit = Auth::user()->id;
        $post->is_active = $is_active;
        $post->save();
        // chuyen dieu huong trang
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Post::findorFail($id);
        return view('backend.post.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findorFail($id);
//        dd($post);
        return view('backend.post.edit', [
            'post' => $post
        ]);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'new_thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        $post = Post::findorFail($id); // khởi tạo model
//        dd($post);
        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('title'));
        $post->content = $request->input('content');
        // Thay đổi ảnh
        if ($request->hasFile('new_thumbnail')) {
            // xóa file cũ
            @unlink(public_path($post->thumbnail));
            // get file mới
            $file = $request->file('new_thumbnail');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/post/';
            // upload file
            $request->file('new_thumbnail')->move($path_upload,$filename);

            $post->thumbnail = $path_upload.$filename;
        }

        $post->position = $request->input('position');
        // Trạng thái
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $post->is_active = $is_active;
        // Sản phẩm Hot
        $is_hot = 0;
        if ($request->has('is_hot')){
            $is_hot = $request->input('is_hot');
        }
        $post->is_hot = $is_hot;
        $post->user_id_edit = Auth::user()->id;
        $post->summary = $request->input('summary');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
//        die('1234');
        $post->save();

//        die('1234');
        // chuyển hướng đến trang
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);
        return response()->json([
            'status' => true
        ], 200);
    }
}
