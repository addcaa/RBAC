<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cui Fang</title>
    <link rel="stylesheet" href="/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/admin/css/style.css">
    <link rel="shortcut icon" href="/admin/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="/admin/images/logo.svg">
                        </div>
                        <h4>你好,让我们开始吧！</h4>
                        <h6 class="font-weight-light">登录继续</h6>
                        <form class="pt-3">
                            <div class="form-group">
                                <input type="text" name="uname" autocomplete="off" class="form-control form-control-lg" id="uname" placeholder="用户名">
                            </div>
                            <div class="form-group">
                                <input type="password" name="upwd" class="form-control form-control-lg" id="upwd" placeholder="密码">
                            </div>
                            <div class="mt-3">
                                <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="sub" href="javascript:;">登录</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                没有此账号? <a href="#" class="text-primary">创建</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/admin/vendors/js/vendor.bundle.base.js"></script>
<script src="/admin/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="/admin/js/off-canvas.js"></script>
<script src="/admin/js/misc.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- endinject -->
</body>
</html>
<script>
    $(function(){
        $("#sub").click(function(){
            var uname=$("#uname").val();
            var upwd=$("#upwd").val();
            $.post(
                    'http://aa.com/login/logdo',
                    {uname:uname,upwd:upwd},
                    function(res){
                        if(res.on==0){
                           alert(res.msg);location.href='/admin/commonality';
                        }else{
                            alert(res.msg);
                        }
                    }
            );
        })
    })
</script>


