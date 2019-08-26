<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>角色管理</title>
</head>
<body>
@extends('/admin.commonality')
@section('content')
    {{--//提示--}}
    <div class="col-lg-7 grid-margin ">
        <div class="card  c">
            <div class="card-body  caa">11 </div>
        </div>
    </div>

    {{--//列表--}}
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">角色管理系统</h4>
                <p><input type="button"  class="btn btn-gradient-success btn-fw" id="subm" value="添加节点">
                </p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>节点名称</th>
                        <th>添加时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin_role as $v)
                    <tr class="table-info">
                        <td>{{$v->role_id}}</td>
                        <td>{{$v->role_name}}</td>
                        <td>
                            <?php echo date('Y-m-d H:s', $v->role_time)?>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--//添加--}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">角色管理</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputUsername1">角色添加</label>
                        <input type="text"  name="role_name" class="form-control" id="exampleInputUsername1" placeholder="角色添加">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @foreach($nodeinf as $v)
                                <div class="form-check aaa" >
                                    <label class="form-check-label">
                                        <input type="checkbox" name="ids" nid="{{$v->nid}}" value="1" id="box" class="form-check-input">
                                        {{$v->n_name}}
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" id="sub"class="btn btn-gradient-primary btn-rounded btn-fw">添加角色</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function(){
            $(".col-lg-7").hide();
            $(".col-md-6").hide();

            $(document).on('click','#sub',function(){
                var role_name=$("#exampleInputUsername1").val();
                var box=$("#box");
                var nid="";
                $.each($('input:checkbox[name=ids]'),function(){
                    if(this.checked){
                        nid+=$(this).attr('nid')+',';
                    }
                });
                $.post(
                        '/role/roleaddo',
                        {nid:nid,role_name:role_name},
                        function(res){
                            if(res.on==1){
                                $(".caa").text(res.msg);
                                $(".col-lg-7").show();
                                setTimeout(function(){
//                                    alert("恭喜你注册成功，两秒后跳转。");
                                    location.href = "/role/roleadd";//PC网页式跳转
//                                    $.mobile.changePage("index.php"); //手机网页式跳转
                                },2000);
                            }else{
                                $(".caa").text(res.msg);
                                $(".col-lg-7").show();
                            }
                            console.log(res);
                        }
                );
            })

            //添加
            $("#subm").click(function(){
                $(".col-lg-12").hide();
                $(".col-md-6").show();
            })
        })
    </script>
@endsection
</body>
</html>