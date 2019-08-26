<?php

 function userid(){
     if(empty(session('admin_id'))){
         echo "<script>alert('请先登录再操作');location.href='/login/log';</script>";
     }
     $uid=session('admin_id');
     $arr=DB::table('users')->where(['uid'=>$uid])->first();
     $name=$arr->uname;
     return $name;
 }