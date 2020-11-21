<?php

namespace App\Http\Controllers;

use App\User_vote;
use Illuminate\Http\Request;

class UserVotedController extends Controller
{
    //
    public function storeVoted($user_id, $room_id, $count_star)
    {
        $vote = new User_vote();
        $vote->user_id = $user_id;
        $vote->room_id = $room_id;
        $vote->star = $count_star;
        $vote->save();
        return response()->json([
            'status' => true
        ], 200);
    }
}
