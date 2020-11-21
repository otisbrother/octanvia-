<?php

namespace App\Http\Controllers;

use App\Room_type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room_type::latest()->paginate(20);
        return view('backend.roomtype.index', [
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
        return view('backend.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $user = Auth::user();
        $roomtype = new Room_type(); // khởi tạo model
        $roomtype->name = $request->input('name');
        $roomtype->create_by = $user->id;
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $roomtype->is_active = $is_active;


        $roomtype->save();
        // chuyển hướng đến trang
        return redirect()->route('admin.roomtype.index')->with('msg', 'Tạo Loại Phòng Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roomType = Room_type::findorFail($id);
        return view('backend.roomtype.edit', [
            'roomType' => $roomType
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
            'name' => 'required|max:255',
        ]);

        $roomtype =  Room_type::findorFail($id); // khởi tạo model
        $roomtype->name = $request->input('name');
        $roomtype->update_by = Auth::user()->id;

        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $roomtype->is_active = $is_active;
        $roomtype->save();
        // chuyển hướng đến trang
        return redirect()->route('admin.roomtype.index')->with('msg', 'Sửa Loại Phòng Thành Công');
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
        Room_type::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
