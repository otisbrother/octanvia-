<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Notify;
use App\Post;
use App\Room;
use App\Room_image;
use App\Room_type;
use App\User;
use App\User_like;
use App\User_views;
use App\User_vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class GuestController extends Controller
{
    //

    public function index()
    {
        $most_searched_districts = District::where(['is_active' => 1])->orderBy('views', 'DESC')->limit(5)->get();
        $newest_rooms = Room::where(['is_active' => 1, 'city_id' => 1])->orderBy('created_at', 'DESC')->limit(6)->get();
        $posts = Post::where(['is_active' => 1])->limit(4)->get();
        return view('frontend.home', [
            'most_searched_districts' => $most_searched_districts,
            'newest_rooms' => $newest_rooms,
            'posts' => $posts,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function get_login_register()
    {
        return view('frontend.login_register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            $user = Auth::user();
            if($user->is_active == 0) {
                Auth::logout();
                return redirect()->back()->with('msg', 'Tài khoản của bạn chưa được kích hoạt');
            } else {
                if($user->role_id == 3 ) {
                    return redirect()->route('home');
                } else if($user->role_id == 1) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('owner.room.index');
                }

            }
        }
        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
    }

    public function postRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $is_active = 1;
        //luu vào csdl
        $user = new User();
        $user->name = $request->input('name'); // họ tên
        $user->email = $request->input('email'); // email
        $user->password = bcrypt($request->input('password')); // mật khẩu
        $user->role_id = 3;
        $user->is_active = $is_active;
        $user->save();

        // chuyen dieu huong trang
        return redirect()->route('guest.login-register')->with('register_status', 'true');
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('frontend.user_profile', [
            'user' => $user,
        ]);
    }
    public function getProfileinfo()
    {
        $user = Auth::user();
        return view('frontend.user.profile_info', [
            'user' => $user,
        ]);
    }
    public function getChangePassword()
    {
        return view('frontend.user.changePassword');
    }

    public function getNoti()
    {
        $user = Auth::user();
        $data = Notify::where(['receive_id' => $user->id])->get();
        return view('frontend.user.noti-page', [
            'data' => $data
        ]);
    }

    public function getAllPosts()
    {
        $featured_blog = Post::where(['is_active' => 1, 'is_hot' => 1])->first();
        $data = Post::where(['is_active' => 1, 'is_hot' => 0])->get();
        return view('frontend.blog.index', [
            'featured_blog' => $featured_blog,
            'data' => $data,
        ]);
    }

    public function blogDetail($post_id)
    {
        $data = Post::findOrFail($post_id);
        // click vao xem bai viet thi +1 luot xem
        $views = $data->views;
        $views++;
        $data->views = $views;
        $data->save();
        $author = User::findOrFail($data->user_id);
        $author_name = $author->name;
        return view('frontend.blog.blogDetail', [
           'data' => $data,
            'author_name' => $author_name
        ]);
    }

    public function getAllRoom()
    {
        $newest_rooms = Room::where(['is_active' => 1, 'city_id' => 1])->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('frontend.room.index', [
            'data' => $newest_rooms,
        ]);
    }

    public function showRoomDetail($room_id)
    {
        $data = Room::findorFail($room_id);
        // tinh +1 luot xem cho room
        $r_views = $data->views;
        $r_views++;
        $data->views = $r_views;
        $data->save();
        // luu danh sach da xem cho user
        if(Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $user_view_check = User_views::where(['user_id' => $user_id, 'room_id' => $room_id])->first();
            if($user_view_check == null) { // neu chua ton tai du lieu thi tao moi
                $user_view = new User_views();
                $user_view->user_id = $user_id;
                $user_view->room_id = $room_id;
                $user_view->save();
            } else { // neu da ton tai du lieu roi thi cap nhat thoi gian xem gan nhat
                $user_view_check->updated_at = now();
                $user_view_check->save();
            }
        }
        // thống kê lượt vote của room
//        $vote_statistics = User_vote::where(['room_id' => $room_id])->get();
//        $vote_avg = 0;
//        foreach($vote_statistics as $vote) {
//            $vote_avg += $vote->star;
//        }
//        $vote_avg = $vote_avg/count($vote_statistics);
//        $vote_avg = round($vote_avg, 2); // lam tron den 2 chu so thap phan



        $roomTypeName = Room_type::where('id', $data->roomType_id)->first();
        $facilities = $data->facilities()->get();
        $room_detailImages =  Room_image::where(['room_id' => $data->id ])->orderBy('position', 'ASC')->get();
        // luot yeu thich cua phong tro - start
        $room_likes = 0;
        $likes_query = "SELECT count(*) AS 'likes' FROM user_like WHERE room_id = '$room_id'";
        $room_likes = DB::select($likes_query)[0]->likes;
        // end

        $district_name = District::findOrFail($data->district_id)->name;
        $city_name = City::findOrFail($data->city_id)->name;
        $owner = User::findOrFail($data->user_id);
        $owner_name = $owner->name;
        $owner_phone = $owner->phone;
        // return json sau khi co frontend
        return view('frontend.room.show', [
            'data' => $data,
            'roomTypeName' => $roomTypeName->name,
            'room_detailImages' => $room_detailImages,
            'facilities' => $facilities,
            'room_likes' => $room_likes,
            'district_name' => $district_name,
            'city_name' => $city_name,
            'owner_name' => $owner_name,
            'owner_phone' => $owner_phone
        ]);
    }

    public function updateProfile(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $user = Auth::user();

        //luu vào csdl
        $user->name = $request->input('name'); // họ tên
        $user->birthday = $request->input('birthday');
        $user->CMND = $request->input('cmnd');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        if ($request->hasFile('new_avatar')) {
            // xóa file cũ
            @unlink(public_path($user->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get file
            $file = $request->file('new_avatar');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/user/';
            // upload file
            $request->file('new_avatar')->move($path_upload,$filename);

            $user->image = $path_upload.$filename;
        }

        $user->save();
        $new_link_image = 'http://renthouse.co/' . $user->image;
        // chuyen dieu huong trang
        return redirect()->back()->with('update_status', 'true');
    }
//    public  function test()
//    {
//        $user = Auth::user();
//        return view('frontend.user.test', [
//            'user' => $user
//        ]);
//    }

    public function getLinkAvatarUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $link = 'http://renthouse.co/' . $user->image;
        return json_encode($link);
    }


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

    public function getAllRoomViewed($id)
    {
        // id truyen vao la user_id
        $list = User_views::where(['user_id' => $id])->orderBy('created_at', 'DESC')->get();
        // chua return
    }



    public function storeViewed($room_id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_view_check = User_views::where(['user_id' => $user_id, 'room_id' => $room_id])->first();
        if($user_view_check == null) { // neu chua ton tai du lieu thi tao moi
            $user_view = new User_views();
            $user_view->user_id = $user_id;
            $user_view->room_id = $room_id;
            $user_view->save();
        } else { // neu da ton tai du lieu roi thi cap nhat thoi gian xem gan nhat
            $user_view_check->updated_at = now();
            $user_view_check->save();
        }
        return response()->json([
            'status' => true
        ], 200);
    }

    public function storeVoted($room_id, $count_star)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $user_vote_check = User_vote::where(['user_id' => $user_id, 'room_id' => $room_id])->first();
        if($user_vote_check == null) { // neu chua ton tai du lieu thi tao moi
            $user_vote = new User_vote();
            $user_vote->user_id = $user_id;
            $user_vote->room_id = $room_id;
            $user_vote->star = $count_star;
            $user_vote->save();
        } else { // neu da ton tai du lieu roi thi cap nhat thoi gian vote gan nhat va luot sao vote
            $user_vote_check->star = $count_star;
            $user_vote_check->updated_at = now();
            $user_vote_check->save();
        }
        return response()->json([
            'status' => true
        ], 200);
    }


}
