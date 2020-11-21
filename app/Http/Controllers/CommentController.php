<?php

namespace App\Http\Controllers;

use App\User;
use App\User_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data =  User_comment::where(['is_approved' => 1])->orderBy('created_at', 'ASC')->get();
        return view('backend.comment.index', [
            'data' => $data,
            'title' => 'Danh sách bình luận đã được duyệt'
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // comment gui len se co: user_id, room_id, content, create_time
        $cmt = new User_comment();
        $cmt->user_id = Auth::user()->id;
        $cmt->room_id = $request->input('room_id');
        $cmt->comment = $request->input('content');
        $cmt->is_approved = 0;
        $cmt->save();
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
        $cmt = User_comment::findorFail($id);
        return view('backend.comment.show', [
            'data' => $cmt
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
        //
        $cmt = User_comment::findorFail($id);
        $user = Auth::user();
        $cmt->approved_by = $user->id;
        $cmt->is_approved = 1;
        $cmt->save();
        return redirect()->route('admin.comment.getAllUnApprovedComments')->with('msg', 'Sửa Đổi Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        User_comment::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }

    public function getAllUnApprovedComments()
    {
        $data =  User_comment::where(['is_approved' => 0])->orderBy('created_at', 'ASC')->get();
        return view('backend.comment.index', [
            'data' => $data,
            'title' => 'Danh sách bình luận chưa được duyệt'
        ]);
    }

//    public function approveComment($id)
//    {
//        $cmt = User_comment::findorFail($id);
//        $user = Auth::user();
//        $cmt->is_approved = 1;
//        $cmt->approved_by = $user->id;
//        $cmt->save();
//    }
}
