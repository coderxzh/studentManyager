<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // $url = $request->url();
        // $token = $request->header('Authorization');
        // $result = DB::table('admin')->where('id', 1)->value('token');
        // if ($result == $token || $url == "http://www.tinyxu.com/api/login") {
        //     return $next($request);
        // } else {
        //     return response()->json(['code' => -200, 'msg' => '请先登录', 'url' => $url]);
        // }
    }
}
