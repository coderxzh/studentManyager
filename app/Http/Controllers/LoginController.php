<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function check(Request $request)
    {
        $userName = $request->input('userName');
        $password = $request->input('password');
        $rule = [
            'userName' => 'required|string|bail|max:30|min:4',
            'password' => 'required|max:100|min:6'
        ];
        $tips = [
            'userName.required' => '用户名不能为空',
            'userName.min' => '用户名不能少于4位',
            'userName.max' => '用户名太长',
            'password.required' => '密码不能为空',
            'password.min' => '密码不能少于6位',
            'password.max' => '密码太长',
        ];
        $validator = Validator::make($request->all(), $rule, $tips);
        if ($validator->fails()) {
            foreach ($validator->getmessageBag()->toArray() as $v) {
                $msg = $v[0];
            }
            return response()->json(['code' => -200, 'msg' => $msg]);
        } else {
            $result = DB::table('admin')
                ->where('username', $userName)
                ->where('password', $password)->first();
            if ($result) {
                return response()
                    ->json(['code' => 200, 'msg' => '登陆成功', 'token' => md5($password)]);
            } else {
                return response()
                    ->json(['code' => 100, 'msg' => '账户或密码错误']);
            }
        }
    }
}
