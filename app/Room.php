<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Room extends Model
{
    //
    protected $table = "room"; // chi dinh ten CSDL

    // belongsTo, hasMany, hasOne, belongsToMany

    public function facilities () {
        return $this->belongsToMany('App\Facilities', 'room_facilities', 'room_id', 'facilities_id');
    }
    public  function Room_image () {
        return $this->hasMany('App\Room_image','room_id');
    }
}
