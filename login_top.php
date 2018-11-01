<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
if(isset($_COOKIE['username']))
{
    $_SESSION['username']=$_COOKIE['username'];
    $_SESSION['islogin']=1;
}
if(isset($_SESSION['islogin']))
{
    //已经登录
    echo "<div class=\"site-nav\">
<div class = \"site-na\"><a href='user_infomation.php'>".$_SESSION['username']. "</a></div><div class = \"site-nb\"><a href='logout.php'>注销</a></div></div> ";
}
else
{   //为登录
    echo "<div class=\"site-nav\">
<div class = \"site-na\">
<a href='login.html'>登录</a>
</div>
</div>
";
}

?>