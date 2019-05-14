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
</head>
<body>
<?php
//设置页面html编码字符串
header("Content-Type:text/html; charset=utf-8");
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
//    else
//    {
//        echo '连接成功';
//    }
if (isset($_SESSION['userName']))
{
    $userName=$_SESSION['userName'];
        $Sql="SELECT id,userName,Dateofbirth,Cellphonenumber,qq,weixing,StudentID FROM personal WHERE userName='$userName'";
        $result=$mysqli->query($Sql);
        if ($result==false)
        {
            echo '数据不存在';
        }
            else
            {
                $test=$result->fetch_assoc();
//                '<table border="1" cellpadding="2" align="center" width="50%" height="60%" style="background:transparent; type=">
//        <tr><tr><td colspan="2"><h4 align="center">宿舍个人信息表之'.$userName.'篇</h4></td></tr>
//        <tr><td style="color: #E2B709;">姓名：</td><td>'.$test['userName'].'</td></tr>
//        <tr><td style="color: #E2B709;">出生日期：</td><td>'.$test['Dateofbirth'].'</td></tr>
//        <tr><td style="color: #E2B709;">手机号码：</td><td>'.$test['Cellphonenumber'].'</td></tr>
//        <tr><td style="color: #E2B709;">QQ：</td><td>'.$test['qq'].'</td></tr>
//        <tr><td style="color: #E2B709;">微信：</td><td>'.$test['weixing'].'</td></tr>
//        <tr><td style="color: #E2B709;">学号：</td><td>'.$test['StudentID'].'</td></tr>
//    </table></form>';
            }
    }
else
{
    header("location:my_homepage.php");
}
$mysqli->close();
?>
<body background="IOS风AI人工智能PPT模板.jpg" style=" background-repeat:no-repeat ;background-size:100% 100%; background-attachment: fixed;">
<form action="Personal.php" method="post">
    <table border="1" cellpadding="2" align="center" width="50%" height="60%" style="background:transparent; type=">
        <tr><tr><td colspan="2"><h4 align="center">宿舍个人信息表之<?php echo $userName?>篇</h4></td></tr>
        <tr><td style="color: #E2B709;">姓名：</td><td><?php echo$test['userName'] ?></td></tr>
        <tr><td style="color: #E2B709;">出生日期：</td><td><?php echo $test['Dateofbirth']?></td></tr>
        <tr><td style="color: #E2B709;">手机号码：</td><td><?php echo$test['Cellphonenumber'] ?></td></tr>
        <tr><td style="color: #E2B709;">QQ：</td><td><?php echo$test['qq'] ?></td></tr>
        <tr><td style="color: #E2B709;">微信：</td><td><?php echo $test['weixing']?></td></tr>
        <tr><td style="color: #E2B709;">学号：</td><td><?php echo $test['StudentID']?></td></tr>
    </table></form>
    <table align="center"><tr><td><a href="my_homepage.php"><input type="button" value="主菜单" class="submit"/></a></td>
        <td><a href="my_logut.php"><input type="button" value="注销" class="submit"/></a></td></tr>
</body>
</html>

