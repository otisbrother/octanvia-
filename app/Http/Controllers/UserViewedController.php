<?php

namespace App\Http\Controllers;

use App\User_views;
use Illuminate\Http\Request;

class UserViewedController extends Controller
{

    public function getAllRoomViewed($id)
    {
        // id truyen vao la user_id
        $list = User_views::where(['user_id' => $id])->orderBy('created_at', 'DESC')->get();
        // chua return
    }

    public function storeViewed($user_id, $room_id)
    {
        $user_view = new User_views();
        $user_view->user_id = $user_id;
        $user_view->room_id = $room_id;
        $user_view->save();
        return response()->json([
            'status' => true
        ], 200);
    }
}
