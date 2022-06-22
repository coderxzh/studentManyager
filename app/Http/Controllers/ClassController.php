<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public  function clssList()
    {
        $result = DB::select('SELECT * FROM class');
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
        }
    }
    public  function className()
    {
        $result = DB::select('SELECT id, class_name `value` FROM class GROUP BY class_name ORDER BY `id`');
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
        }
    }
    public  function addClass(Request $request)
    {
        $parames = $request->all();
        $array = [
            'class_name' => $parames['class_name'],
            'number' => $parames['number'],
            'teacher' => $parames['teacher'],
            'xibie' => $parames['xibie']
        ];
        $result = DB::table('class')->insert($array);
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '创建成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '创建失败', 'data' => $result]);
        }
    }
    public  function uploadCover(Request $request)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            if ($cover->isValid()) {
                $name = md5(microtime(true)) . '.' . $cover->extension();
                $cover->move('static/cover', $name);
                $path = 'http://www.tinyxu.com/static/cover/' . $name;
                return $path;
            } else {
                return '上传出错';
            }
        }
    }
    public  function addLog(Request $request)
    {
        $parames = $request->all();
        $array = [
            'pid' => $parames['pid'],
            'context' => $parames['context'],
            'title' => $parames['title'],
            'cover' => $parames['cover'],
            'synopsis' => $parames['synopsis'],
            'create' => $parames['create'],
        ];
        $result = DB::table('class_log')->insert($array);
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '创建成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '创建失败', 'data' => $result]);
        }
    }
    public  function classLog(Request $request)
    {
        $query = $request->all();
        $page =  $query['page'];
        $offset = ($page - 1) * 3;
        $result = DB::table('class_log')->orderBy('id', 'desc')->limit(3)->offset($offset)->get();
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
        }
    }
    public  function allLog()
    {
        $result = DB::select('SELECT COUNT(1) count FROM `class_log`');
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
        }
    }
    public  function getLog(Request $request)
    {
        $parames = $request->all();
        $id = $parames['id'];
        $result = DB::table('class_log')->where('id', $id)->get();
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '创建成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '创建失败', 'data' => $result]);
        }
    }
    public  function alterClass(Request $request)
    {
        $parames = $request->all();
        $id =  $parames['id'];
        $array = [
            'class_name' => $parames['class_name'],
            'number' => $parames['number'],
            'teacher' => $parames['teacher'],
            'xibie' => $parames['xibie']
        ];
        $result = DB::table('class')->where('id', $id)->update($array);
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '修改成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '修改失败', 'data' => $result]);
        }
    }
}
