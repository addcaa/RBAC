<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    //
    public function log(){
        return view('login.log');
    }
    public function logdo(){
        $upwd=encrypt($_POST['upwd']);
        $info=[
            'uname'=>$_POST['uname'],
            'upwd'=>$upwd
        ];
        $info=DB::table('users')->where(['uname'=>$_POST['uname']])->first();
        if($info){
            if($_POST['upwd']==decrypt($info->upwd)){
                $uid=$info->uid;
                session(['admin_id' => $uid]);
//                dd(session('admin_id'));
                return [
                    'on'=>0,
                    'msg'=>"登录成功"
                ];
            }else{
                return [
                    'on'=>1000,
                    'msg'=>"账号或密码错误"
                ];
            }
        }else{
            return [
                'on'=>2000,
                'msg'=>"用户不存在"
            ];
        }
    }
}
