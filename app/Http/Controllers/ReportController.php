<?php

namespace App\Http\Controllers;

use App\Notify;
use App\User;
use App\User_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  User_report::all();
        return view('backend.report.index', [
            'data' => $data,
            'title' => 'Tất cả báo cáo'
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
        //
        $user = Auth::user();

        $rp = new User_report();
        $rp->sender_id = $user->id;
        $rp->received_id = $request->input('room_id');
        $rp->title = $request->input('title');
        $rp->content = $request->input('content');
        $rp->is_active = 0;
        $rp->save();
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
//        dd($id);
        $rp = User_report::findorFail($id);
        return view('backend.report.show', [
            'data' => $rp
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
        // se duyet roi gui thong bao tai day
        $rp = User_report::findorFail($id);
        $user = Auth::user();
        $rp->approved_by = $user->id;
        $rp->is_active = 1;
        $rp->save();
        return redirect()->route('admin.report.getAllUnApprovedReports')->with('msg', 'Sửa Đổi Thành Công');
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
        User_report::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }

    public function getAllUnApprovedReports()
    {
        $data =  User_report::where(['is_active' => 0])->orderBy('created_at', 'ASC')->get();
        return view('backend.report.index', [
            'data' => $data,
            'title' => 'Danh sách báo cáo chưa được duyệt'
        ]);
    }
}
