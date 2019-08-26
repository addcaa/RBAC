<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
class Rbac
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
        if(!empty(session('admin_id'))){
            $uid=session('admin_id');
            $arr=DB::table('admin_user_role')->where(['uid'=>$uid])->first();
            if($arr){
              $role_id=$arr->role_id;
                $arr=DB::table('admin_node_role')->where(['role_id'=>$role_id])->get();
                $nid=[];
                foreach($arr as $v){
                    $nid[]=$v->nid;
                }
                $arr=DB::table('admin_node')->wherein('nid',$nid)->get();
                $n_route=[];
                foreach($arr as $v){
                    $n_route[]=$v->n_route;
                }
                if(!in_array($_SERVER["REQUEST_URI"],$n_route)){
                    header("location:/power/power");
                    die;
                }
            }else{
                header("location:/power/power");
                die;
            }
        }
        return $next($request);
    }
}
