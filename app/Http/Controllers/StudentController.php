<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //

    public function getAll(Request $request)
    {
        $page = $request->query('page');
        if ($page) {
            $offset = ($page - 1) * 12;
            $result = DB::table('student')->orderBy('class_name')->limit(12)->offset($offset)->get();
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
            } else {
                return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
            }
        } else {
            $result = DB::table('student')->orderBy('class_name')->get();
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
            } else {
                return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
            }
        }
    }
    public function getClass()
    {
        $result = DB::select('SELECT class_name,teacher,`class_id`,xibie,COUNT(1) count FROM student GROUP BY class_name,teacher,xibie,`class_id` ORDER BY class_id');
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
        }
    }
    public function editor(Request $request)
    {
        $message = $request->all();
        $array = [
            'age' => $message['age'],
            'class_name' => $message['class_name'],
            'name' => $message['name'],
            'gender' => $message['gender'],
            'class_id' => $message['class_id'],
            'number' => $message['number'],
            'teacher' => $message['teacher'],
            'xibie' => $message['xibie']
        ];
        $update = DB::table('student')->where('number', $message['number'])->update($array);
        if ($update) {
            return response()->json(['code' => 200, 'msg' => '修改成功', 'data' =>  $update]);
        } else if ($update == 0) {
            return response()->json(['code' => 200, 'msg' => '修改成功', 'data' =>  $update]);
        } else {
            return response()->json(['code' => -200, 'msg' => '修改失败', 'data' =>  $update]);
        }
    }
    public function add(Request $request)
    {
        $parames = $request->all();
        $array2 = [
            'age' => $parames['age'],
            'class_name' => $parames['class_name'],
            'name' => $parames['name'],
            'gender' => $parames['gender'],
            'class_id' => $parames['class_id'],
            'number' => $parames['number'],
            'teacher' => $parames['teacher'],
            'xibie' => $parames['xibie']
        ];
        $result = DB::table('student')->insert($array2);
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '上传成功', 'date' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '修改失败', 'data' => $result]);
        }
    }
    public function remove(Request $request)
    {
        $parames = $request->all();
        $number = $parames['number'];
        $result = DB::table('student')->where('number', $number)->delete();
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '删除成功', 'date' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '删除失败', 'data' => $result]);
        }
    }
    public function count(Request $request)
    {
        $id = $request->query('id');
        if ($id) {
            $result = DB::select("SELECT COUNT(1) count FROM student WHERE class_id=?", [$id]);
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
            } else {
                return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
            }
        } else {
            $result = DB::select('SELECT COUNT(1) count FROM student');
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
            } else {
                return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
            }
        }
    }
    public function stuItem(Request $request)
    {
        $query =  $request->all();
        if ($query) {
            $page =  $query['page'];
            $offset = ($page - 1) * 12;
            $id =  $query['id'];
            $result = DB::table('student')->where('class_id', $id)->limit(12)->offset($offset)->get();
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
            } else {
                return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
            }
        }
    }
    public function realStu()
    {
        $result = DB::select('SELECT class_name , COUNT(1) count FROM student GROUP BY class_id,class_name');
        if ($result) {
            return response()->json(['code' => 200, 'msg' => '查询成功', 'data' => $result]);
        } else {
            return response()->json(['code' => -200, 'msg' => '查询失败', 'data' => $result]);
        }
    }
}
