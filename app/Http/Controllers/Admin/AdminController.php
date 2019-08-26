<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //
    public function admin(){
        $name=userid();
        return view('admin.commonality',['name'=>$name]);
    }
    public function quit(Request $request){
        $request->session()->flush("admin_id");
        if(session("admin_id")==null){
            return [
                'on'=>0,
                'msg'=>"退出成功",
            ];
        }else{
            return [
                'on'=>110,
                'msg'=>"退出失败",
            ];
        }
    }
}
