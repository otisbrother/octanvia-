<?php

namespace App\Http\Controllers;

use App\User_like;
use Illuminate\Http\Request;

class UserLikedController extends Controller
{
    public function storeLiked($user_id, $room_id)
    {
        $like = new User_like();
        $like->user_id = $user_id;
        $like->room_id = $room_id;
        $like->save();
        return response()->json([
            'status' => true
        ], 200);
    }
}
