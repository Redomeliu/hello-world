<?php session_start();
if (isset($_SESSION['userName']))
{
    session_unset();//取消设置用户名
    session_destroy();//销毁会话
}
header("location:my_homepag.php");//跳转回去