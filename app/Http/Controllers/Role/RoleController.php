<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    //添加
    public function roleadd(){
        $name=userid();
        $nodeinf=DB::table('admin_node')->where(['pid'=>1])->get();

        $admin_role=DB::table('admin_role')->get();
        return view('role.roleadd',['name'=>$name,'nodeinf'=>$nodeinf,'admin_role'=>$admin_role]);
    }
    public function roleaddo(){
        $nid=rtrim(($_POST['nid']),',');
        $role_name=$_POST['role_name'];
        $info=[
            'role_name'=>"$role_name",
            'role_time'=>time(),
        ];
        $role_id=DB::table('admin_role')->insertGetId($info);
        $arrid=explode(',',$nid);//权限id
        $admin_node_role="";
        foreach($arrid as $v){
            $arr=[
                'role_id'=>$role_id,
                'nid'=>$v,
            ];
            $admin_node_role=DB::table('admin_node_role')->insert($arr);
        }
        if($admin_node_role){
            return [
                'on'=>1,
                'msg'=>"添加有成功"
            ];
        }else{
            return [
                'on'=>1000,
                'msg'=>"添加有误,请重新添加"
            ];
        }

    }
}
