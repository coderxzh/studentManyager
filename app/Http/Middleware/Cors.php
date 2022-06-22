<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        $response = $next($request);
        // 允许任何网站访问本网站的数据
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type,Cookie, Accept, token, Authorization,multipart/form-data");
        $response->header('Access-Control-Expose-Headers', 'Authorization,token');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'false');
        return $response;
    }
}
