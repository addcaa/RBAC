
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <h3>欢迎{{$name}}来到抽奖</h3>
    @if($num==1)
        <p>你有<samp style="font-size:20px;color: #c51f1a;">{{$num}}</samp>次机会抽奖机会</p>
    @else
        <samp style="font-size:20px;color: #c51f1a;">（{{$num}}）</samp><p></p>
     @endif
    <input type="button" value="点击抽奖" id="sub" uid="{{$id}}" num="{{$num}}">
</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function(){
        $("#sub").click(function () {
            var id=$(this).attr('uid');
            var num=$(this).attr('num');
            if(num==1){
                var num="";
            }
            $.get(
                '/lottery/sub',
                {id:id,num:num},
                function (res) {

                    console.log(res);
                }
            );
        })
    })
</script>