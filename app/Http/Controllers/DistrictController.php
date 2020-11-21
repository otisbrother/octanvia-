<?php

namespace App\Http\Controllers;

use App\District;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = District::latest()->paginate(20);
        return view('backend.district.index', [
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
        $city = City::all();
        return view('backend.district.create', [
            'city' => $city,

        ]);
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
        $district = new District(); // khởi tạo model
        $district->name = $request->input('name');
        $district->city_id = $request->input('city');
        $district->create_by = $user->id;
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $district->is_active = $is_active;
        $district->save();
        // chuyển hướng đến trang
        return redirect()->route('admin.district.index')->with('msg', 'Tạo Quận/Huyện Thành Công');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::all();
        $district = District::findorFail($id);
        $choseCity = City::findorFail($district->city_id);
        return view('backend.district.edit', [
            'district' => $district,
            'city'=> $city
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
        $user = Auth::user();
        $district = District::findorFail($id); // khởi tạo model
        $district->city_id = $request->input('city');
        $district->name = $request->input('name');
        $district->update_by = $user->id;
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $district->is_active = $is_active;
        $district->save();
        // chuyển hướng đến trang
        return redirect()->route('admin.district.index')->with('msg', 'Sửa Đổi Quận/Huyện Thành Công');
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
        District::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
