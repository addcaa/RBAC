@extends('/admin.commonality')
@section('content')

    <form enctype="multipart/form-data">
        <input type="file" name="img" id="img">
        <input type="button" id="sub" value="上传" >
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function(){
            $("#sub").click(function(){
                //是否支持切片
                slice=true;
                var file = document.getElementById("img").files[0];
                //切片大小 bytes
                var chunkSize = 2097152;
                chunks = Math.ceil(file.size / chunkSize);
                console.log('可以分割：'+chunks);
            })
        })
    </script>
@endsection
