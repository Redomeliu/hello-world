<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>307宿舍</title>
    <style>
        #login{
            width: 1000px;
            margin: 0 auto;
            overflow:hidden;

        }
        #login p{
            text-align:center;
        }
        .t1{
            font-size: 28px;font-family:"微软雅黑";
        }
        .t2{
            font-size: 15px;font-family:"微软雅黑";
            color: #999999;
        }
        .textbox{
            width: 350px;
            height: 40px;
            border-radius: 3px;
            border: 1px solid #e2b709;
            padding-left: 10px;
        }
        .submit{
            width: 365px;
            height: 40px;
            background-color: #F0184d;
            color: white;
            border: 1px solid #666666;

        }
        .button{
            width: 365px;
            height: 40px;
            padding-left: 10px;
            background-color: white;
            border: 1px solid #666666;
        }
        .text{
            width: 360px;
            margin: 0 auto;
            font-size: 15px;
            color: #666666;
        }


    </style>
<!--    <embed autostart="true" hidden="true" loop="true" src="yinyue/孙楠%20-%20歌曲：新的天地.mp3"/>-->
</head>
<body>
<body background="IOS风AI人工智能PPT模板.jpg" style=" background-repeat:no-repeat ;background-size:100% 100%; background-attachment: fixed;">
<h4 align="center"><font size="16pt" color="orange">307宿舍</font></h4>
<!--<center><embed src="shiping/新海诚十字路口.mp4" ></center>-->
<!--<center><audio src="https://music.163.com/#/playlist?id=2351829270&_hash=songlist-1638654" controls="controls" preload id="audio"></audio></center>-->
<!--<center><embed src="yinyue/双笙 - 心做し（Cover GUMI）.mp3" width="800px" height="120px" /></center>-->

<!--<center><iframe frameborder="0" border="1"-->
<!--        marginwidth="0" marginheight="0"-->
<!--        width=333 height=77-->
<!--        src="//music.163.com/outchain/player?type=2&id=33166539&auto=1&height=66">-->
<!--</iframe></center>-->
<!--<center><iframe frameborder="0" border="1"-->
<!--        marginwidth="0" marginheight="0"-->
<!--        width="100%" height="450"-->
<!--        src="//music.163.com/outchain/player?type=2&amp;id=390725568&amp;auto=1&amp;height=80">-->
<!--</iframe>-->
<!--</center>-->
<?php
    if (isset($_SESSION['userName']))
    {
        $userName=$_SESSION['userName'];
        echo  '<p style="font-size:24pt;color: #004C96;text-align:center">'."欢迎您：".'<p>'.
            '<p style="font-size:24pt;color:red;text-align:center">'.$userName.'<p>' ;

    }
    else
    {
        header("location:my_homepag.php");
    }
?>
<table align="center"><tr><td><a href="Music.php"><input type="button" value="点歌" class="submit"/>
        <td><a href="video.php"><input type="button" value="视频" class="submit"/></tr>
    <tr><td><a href="Personal.php"><input type="button" value="信息" class="submit"/>
        <td><a href="my_logut.php"><input type="button" value="注销" class="submit"/></a></td></tr>
<!--<center>-->
<!--    <iframe src="http://music.163.com/outchain/player?-->
<!--type=0&amp;id=554197666&amp;auto=1&amp;height=430" width="100%" height="300" frameborder="no" marginwidth="0" marginheight="0">-->
<!--    </iframe>-->
<!--</center>-->


<!--    <div id="login">-->
<!--        <p class="t1">博客,记录生活中的点点滴滴!</p>-->
<!--        <p class="t2">在博客中,可以畅所欲言,可以学习IT最新的知识！</p>-->
<!--        <p><input type="button" value="确认登陆" class="submit"></p>-->
<!--        <p ><input type="button" value="注册账号" class="submit"></p>-->
<!---->
<!--    </div>-->


</body>
</html>


