<?php

namespace App\Http\Controllers;

use App\District;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // function search title room
    public function searchTitle($key_title)
    {
        $search_query = "SELECT * FROM room WHERE MATCH(title)AGAINST('$key_title' WITH QUERY EXPANSION)";
        $data = DB::select($search_query);
//        dd($data);
        return json_encode($data);
    }

    // function filter
    public function getListDistrict($city_id)
    {
        $data = District::where(['city_id' => $city_id])->get(['id', 'name']);
        return json_encode($data);
    }


}
