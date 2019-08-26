<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>节点管理</title>
</head>
<body>
@extends('/admin.commonality')
@section('content')
    <div class="col-lg-7 grid-margin ">
        <div class="card  c">
            <div class="card-body  caa">11 </div>
        </div>
    </div>


    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">添加节点</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputUsername1">节点名</label>
                        <input type="text" name="n_name" id="n_name" class="form-control" id="exampleInputUsername1" placeholder="节点名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">字段名</label>
                        <input type="email" name="n_route" id="n_route" class="form-control" id="exampleInputEmail1" placeholder="字段名">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">父级名</label>
                        <select name="r_name" class="form-control form-control-lg" id="exampleFormControlSelect1">
                            <option value="0">--请选择--</option>
                            @foreach($info as $v)
                                <option value="{{$v->pid+1}}">{{$v->n_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="button" id="submit" class="btn btn-gradient-primary mr-2">添加</button>
                    <button class="btn btn-light">取消</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">菜单管理</h4>
                <p><input type="button" class="btn btn-gradient-light btn-rounded btn-fw" id="sub" value="添加节点"></p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>节点名</th>
                            <th>字段名</th>
                            <th>父级</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($nodeinf as $v)
                        <tr>
                            <td>{{$v->nid}}</td>
                            <td>{{$v->n_name}}</td>
                            <td>{{$v->n_route}}</td>
                            <td>{{$v->pid}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function(){
            $(".col-md-6").hide();
            $(".col-lg-7").hide();

            $("#sub").click(function(){
                $(".col-md-6").show();
                $(".col-lg-12").hide();
            })
            $("#submit").click(function(){
//                alert(11);
                var r_name=$("#n_name").val();  //路由名
                var n_route=$("#n_route").val();    //路由
                var pid= $("#exampleFormControlSelect1").change().val(); //pid
                $.post(
                        '/authority/permissionsdo',
                        {r_name:r_name,n_route:n_route,pid:pid},
                        function(res){
                            if(res.on==1){
                                $(".caa").text(res.msg);
                                $(".col-lg-7").show();
                                setTimeout(function(){
//                                    alert("恭喜你注册成功，两秒后跳转。");
                                    location.href = "/authority/permissions";//PC网页式跳转
//                                    $.mobile.changePage("index.php"); //手机网页式跳转
                                },2000);
                            }else{
                                $(".caa").text(res.msg);
                                $(".col-lg-7").show();
                            }
//                            console.log(res);
                        }
                );
            })
        })

    </script>

@endsection

</body>
</html>