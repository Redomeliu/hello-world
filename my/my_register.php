<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
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
function dealIndo($date)
{
    $date=trim($date);//去空格；
    $date=htmlspecialchars($date);//防控制页面
    $data=stripcslashes($date);//去斜杠
    return $date;
}
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
    if(empty($_POST['email']))
    {
        $can_use=false;
        $emailErr='邮箱不能为空';
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST['userName']))
    {
        $can_use=false;
        $userNameErr= '只允许字母和空格';
    }
    if (!preg_match("/(\w{6,14})/",$_POST['password']))
    {
        $can_use=false;
        $passwordErr="密码长度:6-14";
    }
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$_POST['email']))
    {
        $can_use=false;
        $emailErr= "非法邮箱格式";
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
if($mysqli->connect_errno)
{
    die('<h2 style="color: #36b52a">'.连接失败.'<h2>'.mysqli_connect_error($conn));
}
else
{
    echo '连接成功';
}
$userName=dealIndo($_POST['userName']);
$password=dealIndo($_POST['password']);
$email=dealIndo($_POST['email']);
    $sql="SELECT userName FROM account WHERE userName='$userName'";
    $result=$mysqli->query($sql);
    $test=$result->fetch_assoc();
    if ($test!=false)
    {
        $userNameErr='用户名已存在';
        $can_use=false;
    }
    $sql="SELECT email FROM account WHERE userName='$email'";
    $result_1=$mysqli->query($sql);
    $test_1=$result_1->fetch_assoc();
    if ($test_1!=false)
    {
        $emailErr='邮箱已存在';
        $can_use=false;
    }
    }
if ($_SERVER['REQUEST_METHOD']=="POST" && $can_use==true)
{
$sql="INSERT account(userName,password,email) VALUES('$userName','$password','$email')";
if ($mysqli->query($sql))
{
    echo '插入成功';
}
else
{
    echo '插入失败'.$mysqli->error;
}
$mysqli->close();
}
?>
<form action="my_register.php" method="post">
    <div id="login">
        <p ><img src="timg%5B1%5D.jpg" width=50% height=50%></p>
<!--        <p ><img src="http://img.php.cn/upload/course/000/000/004/58144f924a5da186.gif" width=50% height=50%></p>-->
<!--        <p class="t1">307专属,记录生活中的点点滴滴!</p>-->
<!--        <p class="t2">属于307自己的网站</p>-->
<!--        <p>用户名：<input type="text" name="userName" class="textbox"/>--><?php // echo $userNameErr?><!--<br/></p>-->
<!--        <p>密码：<input type="text" name="password" class="textbox"/>--><?php //echo  $passwordErr?><!--<br/></p>-->
<!--        <p> 注册邮箱：<input type="text" name="email" class="textbox"/>--><?php //echo  $emailErr?><!--<br/></p>-->
        <p class="t1">307专属,记录生活中的点点滴滴!</p>
        <p class="t2" style="color: #4accb1">属于307自己的网站</p>
        <p><font color="#f0ffff">用户名：</font><input type="text" name="userName" class="textbox" style="background:transparent;"/><?php  echo $userNameErr?><br/></p>
        <p><font color="#f0ffff">密码：</font><input style="background:transparent; type="text" name="password" class="textbox" /><?php echo  $passwordErr?><br/></p>
        <p><font color="#f0ffff">注册邮箱：</font><input style="background:transparent; type="text" name="email" class="textbox" /><?php echo  $emailErr?><br/></p>
        <p><input type="submit" value="确认注册" class="button"></p>
        <p><a href="my_homepage.php"><input type="button" value="主菜单" class="submit"/></a></p>
    </div>
</form>
<!--<form action="my_register.php" method="post">-->
<!--    用户名：<input type="text" name="userName"/>--><?php // echo $userNameErr?><!--<br/>-->
<!--    密码：<input type="text" name="password"/>--><?php //echo  $passwordErr?><!--<br/>-->
<!--    注册邮箱：<input type="text" name="email"/>--><?php //echo  $emailErr?><!--<br/>-->
<!--    <input type="submit" value="注册"/>-->
<!--</form>-->
</body>
</html>
