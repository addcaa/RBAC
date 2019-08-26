<?php

namespace App\Http\Controllers\Authority;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AuthorityController extends Controller
{
    //


    public function permissions(){
        $name=userid();
        $arr=DB::table('admin_node')->where(['pid'=>0])->get();
        $info=[];
        foreach($arr as $v){
            $info[]=$v;
        }
        $nodeinf=DB::table('admin_node')->get();
        return view('authority.permissions',['name'=>$name,'info'=>$info,'nodeinf'=>$nodeinf]);
    }

    public function permissionsdo(){
        $info=[
            'n_name'=>$_POST['r_name'],//路由名
            'n_route'=>$_POST['n_route'],//路由
            'pid'=>$_POST['pid'],//路由
        ];
        $arr=DB::table('admin_node')->insert($info);
        if($arr){
            return [
                'on'=>1,
                'msg'=>"添加成功"
            ];
        }else{
            return [
                'on'=>1000,
                'msg'=>"添加失败"
            ];
        }
    }
}
