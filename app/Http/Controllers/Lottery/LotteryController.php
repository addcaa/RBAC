<?php

namespace App\Http\Controllers\Lottery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class LotteryController extends Controller
{
    public function lottery()
    {

        if (empty($_GET['id'])) {
            echo "<script>alert('请先登录');location.href='/lotteryadd/lotteryadd';</script>";
        }
        $id = $_GET['id'];
        echo 'id=' . $id;
        echo "<hr>";
        $arr = DB::table('user')->first();
        $name = $arr->uname;
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = "$ip" . "id:$id";
//        Redis::set($key,1);
        $num = Redis::get($key);
//        dd($num);
        if ($num == "") {
            $num = 1;
        } else if ($num == 1) {
            $num = "你没有机会了😭,可以充值进行抽奖😀";
        }
        return view("lottery.lottery", ['name' => $name, 'num' => $num, 'id' => $id]);
    }

    public function sub()
    {
        $num = $_GET['num'];
        $id = $_GET['id'];
//        $id=mt_rand(1,1000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $arr = [
            1=>3,
            2=>4,
            3=>10,
        ];
        $key = "mas";

        $mas=Redis::sIsMember($key,$id);
        $arr=DB::table('lottery')->where(['lid'=>1])->first();
        dd($arr);
        $lnum=DB::select("select * from lottery where lid=1");
        dd($lnum);
        if($mas){
            return $arr=[
                'on'=>1112,
                'num' => "你没有机会了😭,可以充值进行抽奖😀",
            ];
        }else{
//            Redis::sAdd($key,$id);
        };
        $num=$this->add();
        if($num>0){
            echo $num;

//            if($lnum==$arr[$num]){
//                return $arr=[
//                    'on'=>543543,
//                    'num' =>"很遗憾错过了",
//                ];
//            }else{
//                $res=DB::table('lottery')
//            }
        }else{
            return $arr=[
                'on'=>543543,
                'num' =>"很遗憾没有中奖",
            ];
        }
    }

    function add(){

        $num = mt_rand(1,15);
        if ($num <= 3) {
            return 1;//1等奖
        } else if ($num <= 6) {
            return 2;    // 2 等级
        } else if ($num <= 10) {
            return 3;  //2
        }
//        } else {
//            return 0;    // 没有中将
//        }
    }
}
