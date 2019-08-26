<?php

namespace App\Http\Controllers\Usercontrol;

use  Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class UsercontrolController extends Controller
{
    public function controladd(){
        $name=userid();
        $admin_role=DB::table('admin_role')->get();
        return  view('usercontrol/controladd',['name'=>$name,'admin_role'=>$admin_role]);
    }

    public function controladdo(){
        $info=[
            'uname'=>$_POST['uname'],
            'upwd'=>encrypt($_POST['upwd']),
            'sex'=>$_POST['sex'],
            'add_time'=>time()
        ];
//        dd($info);
        $userid=DB::table('users')->insertgetid($info);
        $arr=[
            'uid'=>$userid,
            'role_id'=>$_POST['role'],
        ];
        $admin_user_role=DB::table('admin_user_role')->insert($arr);
        if($admin_user_role){
            return [
                'on'=>0,
                'msg'=>"添加成功"
            ];
        }else{
            return [
                'on'=>1,
                'msg'=>"添加失败"
            ];
        }
    }
}
