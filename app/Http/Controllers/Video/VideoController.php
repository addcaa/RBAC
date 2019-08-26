<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class VideoController extends Controller
{
    //
    public function add()
    {
        $name=userid();
        return view('video.add',['name'=>$name]);
    }

    public function toadd(Request $request)
    {


        if ($request->isMethod('post')) {
            //图片
            $picture = $request->file('picture');
            //视频
            $video = $request->file('video');
            if ($picture->isValid()) {
                $originalName = $picture->getClientOriginalName(); // 文件原名
                $ext = $picture->getClientOriginalExtension();     // 扩展名
                $realPath = $picture->getRealPath();   //临时文件的绝对路径
                $type = $picture->getClientMimeType();     // image/jpeg
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

                $exst = $video->getClientOriginalExtension();     // 扩展名
                $Path = $video->getRealPath();   //临时文件的绝对路径
                $viname = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $exst;
                $arr = Storage::disk('video')->put($viname, file_get_contents($Path));
                if($arr==false || $bool==false){
                    return $arr=[
                        'eron'=>1000,
                        'msg'=>"图片和视频上传失败",
                    ];
                }
                $info=[
                    'name'=>$_POST['name'],
                    'text'=>$_POST['text'],
                    'time'=>time(),
                    'video'=>$viname,
                    'img'=>$filename
                ];
                dd($info);
            }
        }

    }
    public function show(){
        echo "展示";
    }

    public function voides(){
        $name=userid();
        return view('video.voides',['name'=>$name]);
    }
}
