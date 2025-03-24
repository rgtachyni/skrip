<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $menu = null)
    {
        if (auth()->check()) {
            $arr = Session::get('roles');
            $roles = $arr[$menu];
            $flag = explode('/', url()->current());
            // dd($flag);
            // $flag = isset($flag[4]) ? $flag[4] : $menu;
            $flag = isset($flag[5]) ? $flag[5] : $menu;
            if ($flag == $menu) {
                $flag = isset($roles) ? $roles['read'] : null;
            } else {
                if (in_array($flag, ['read', 'create', 'edit', 'delete', 'print', 'report'])) {
                    $flag = isset($roles) ? $roles[$flag] : null;
                }
            }
            return $flag == '1' ? $next($request) : redirect()->route('unauthorized');
        }
        return $next($request);
    }
}
