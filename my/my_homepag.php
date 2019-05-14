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
<?php
if (isset($_SESSION['userName']))
{
    header("location:my_homepage.php");
}
else
{
    echo '<table align="center"><tr><td><a href="my_login.php"><input type="button" value="确认登陆" class="submit"></a></td>.
           <td><a href="my_register.php"><input type="button" value="注册账号" class="submit"></a></td></tr>';
}
?>