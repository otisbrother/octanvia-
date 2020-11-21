<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkLoginOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // check quyền admin && trạng thái hoạt động
            if ($user->role_id == 2 && $user->is_active == 1 )
            {
                return $next($request);
            }
            else if (($user->role_id == 3) && $user->is_active == 1 )
            {
                return redirect('/');
            }
            else if (($user->role_id == 1) && $user->is_active == 1 )
            {
                return redirect()->route('admin.dashboard');
            }
            else
            {
                Auth::logout();
                return redirect()->route('owner.login');
            }
        }

        return redirect()->route('owner.login');
    }

}
