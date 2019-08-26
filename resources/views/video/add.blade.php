@extends('/admin.commonality')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">视频添加</h4>
                <form class="forms-sample"  id="ajax-upload-demo" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">标题</label>
                        <input type="text" class="form-control" id="exampleInputName1" id="name" name="name" placeholder="标题">
                    </div>
                    <div class="form-group">
                        <label>封面添加</label>
                        <div class="input-group col-xs-12">
                            <input type="file" id="doc-ipt-file-1" class="un" name="picture">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>视频添加</label>
                        <div class="input-group col-xs-12">
                            <input type="file" id="doc-ipt-file-1" class="vi" name="video">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">简介</label>
                        <textarea class="form-control" id="exampleTextarea1" id="text" name="text" rows="4"></textarea>
                    </div>
                    <input  type="button"class="btn btn-gradient-primary mr-2" id="sub" value="添加">
                    <button class="btn btn-light">清空</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function(){
            var isUploading = false;
            $("#sub").click(function () {
                // 上传文件
                var name=$("#name").val();
                var text=$("#text").val();
                if($(".un").val()=="" || $(".vi").val()==""){
                    alert('封面或视频不能为空');
                    return false;
                }
                var form = document.getElementById('ajax-upload-demo');
                if(isUploading) {
                    alert('文件正在上传...');
                    return false;
                }
                $.ajax({
                    url: '/video/toadd',
                    type: 'POST',
                    cache: false,
                    data: new FormData(form),name:name,text:text,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function () {
                        isUploading = true;
                    },
                    success: function (res) {
                        console.log(res);
                        if(res.eron == 'u0'){
                            // 上传成功
                            alert('上传'+res.msg);
                        }else{
                            // 上传失败
                            alert('上传'+res.msg);
                        }
                        isUploading = false;
                    }
                });
            })
        })
    </script>
@endsection
