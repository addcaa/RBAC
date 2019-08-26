<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
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
                <h4 class="card-title">管理员系统</h4>
                <p><input type="button"  class="btn btn-outline-warning btn-fw" id="subm" value="添加管理员">
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
                        <tr class="table-warning">
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--//添加--}}
    <div class="col-12 bb grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">管理员添加</h4>
                <form class="form-sample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">管理员名</label>
                                <div class="col-sm-9">
                                    <input type="text" name="uname" id="uname" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">密码</label>
                                <div class="col-sm-9">
                                    <input type="PASSWORD" name="upwd" id="upwd" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class=" col-form-label">性别</label>
                                <div class="col-sm-4 ">
                                    <div class="form-check ">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="membershipRadios" id="sex" value="1" name="sex">
                                            男
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="membershipRadios" id="sex" value="2" name="sex" >
                                           女
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <select  class="form-control" id="role">
                                        <option>--请选择--</option>
                                        @foreach($admin_role as $v)
                                            <option   value="{{$v->role_id}}">{{$v->role_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
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
            $(".bb").hide();

            $(document).on('click','#sub',function(){
                var uname=$("#uname").val();
                var upwd=$("#upwd").val();
                var sex=$("#sex").val();
                var role=$("#role").change().val();
                $.post(
                        '/control/controladdo',
                        {uname:uname,upwd:upwd,sex:sex,role:role},
                        function(res){
                            if(res.on==0){
                                $(".caa").text(res.msg);
                                $(".col-lg-7").show();
                                setTimeout(function(){
//                                    alert("恭喜你注册成功，两秒后跳转。");
                                    location.href = "/control/controladd";//PC网页式跳转
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
                $(".bb").show();
            })
        })
    </script>
@endsection
</body>
</html>