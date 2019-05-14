<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
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
            font-weight: bold;
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
</head>
<body>
<body background="IOS风AI人工智能PPT模板.jpg" style=" background-repeat:no-repeat ;background-size:100% 100%; background-attachment: fixed;">
<?php
//设置页面html编码字符串
if (isset($_SESSION['userName']))
{
    header("location:my_homepage.php");
}
header("Content-Type:text/html; charset=utf-8");
$userName=$password=$email="";
$userNameErr=$passwordErr=$emailErr="*必填项目";
if ($_SERVER['REQUEST_METHOD']=="POST")
{
    $can_use=true;
    if(empty($_POST['userName']))
    {
        $can_use=false;
        $userNameErr='用户名不能为空';
    }
    if(empty($_POST['password']))
    {
        $can_use=false;
        $passwordErr='密码不能为空';
    }
}
if ($_SERVER['REQUEST_METHOD']=="POST" && $can_use==true)
{
    $host='localhost';
    $dbuername='root';
    $dbpassword='root';
    $dbname='users';
    $mysqli=new mysqli();
    $mysqli->connect($host,$dbuername,$dbpassword,$dbname);
//    if($mysqli->connect_errno)
//    {
//        die('<h2 style="color: #36b52a">'.连接失败.'<h2>'.mysqli_connect_error($conn));
//    }
//    else
//    {
//        echo '连接成功';
//    }
    $userName=$_POST['userName'];
    $password=$_POST['password'];
    if ($can_use)
    {
        $sql="SELECT userName FROM account WHERE userName='$userName'";
        $result=$mysqli->query($sql);
        $test=$result->fetch_assoc();
        if ($test==false)
        {
            $userNameErr='用户名不存在';
        }
        else
        {
            $sql="SELECT userName,password FROM account WHERE userName='$userName'and password='$password'";
            $result=$mysqli->query($sql);
            $test=$result->fetch_assoc();
            if ($test==false)
            {
                $passwordErr='密码错误';
            }
            else
            {
                echo '登陆成功！';
                $_SESSION['userName']=$userName;
                header("location:my_homepage.php");//存入session;
                //页面跳转；
//                echo "<script type=\"my_register.php/javascript\">";
//                echo "windows.location.href='my_homepage';";
//                echo "</script>";
            }
        }
    }

    $mysqli->close();
}
?>
<form action="my_login.php"method="post">
    <div id="login">
    <p ><img src="timg%5B1%5D.jpg" width=50% height=50%></p>
        <p class="t1">307专属,记录生活中的点点滴滴!</p>
        <p class="t2" style="color: #4accb1">属于307自己的网站</p>
        <p><font color="#f0ffff">用户名：</font><input type="text" name="userName" class="textbox" style="background:transparent;"/><?php  echo $userNameErr?><br/></p>
        <p><font color="#f0ffff">密码：</font><input style="background:transparent; type="text" name="password" class="textbox" /><?php echo  $passwordErr?><br/></p>
        <p><input type="submit" value="确认登陆" class="submit"></p>
        <p><a href="my_homepage.php"><input type="button" value="主菜单" class="submit"/></a></p>
        <p class="text"style="text-align: right;">忘记密码</p>
</div>
</form>
<!--<form action="my_login.php" method="post">-->
<!--    用户名：<input type="text" name="userName"/>--><?php // echo $userNameErr?><!--<br/>-->
<!--    密码：<input type="text" name="password"/>--><?php //echo  $passwordErr?><!--<br/>-->
<!--    <input type="submit" value="登陆"/>-->
<!--</form>-->
</body>
</html>
