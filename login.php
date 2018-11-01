<?php
include_once ("db/DbManage.php");
$db = new DbManage();

header("Content-Type:text/html;charset=utf-8");
session_start();
if(isset($_POST['login']))
{
    $username = trim($_POST['TPL_username']);
    $password = trim($_POST['TPL_password']);
    $sqlTxt = "select Pwd from user_info WHERE User_name = '" . $username ."'" ;
    $result = $db->executeSqlTxt($sqlTxt);
    if(($username=='')||($password==''))
    {
        header('refresh:3;url=login.html');
        echo "改用户名或密码不能为空，3秒后跳转到登录页面";
        exit;
    }
    if($row = mysqli_fetch_array($result)){
        $Pwd = $row["Pwd"];
        if($Pwd == $password){
            $_SESSION['username']=$username;
            $_SESSION['islogin']=1;
            setcookie("username",$username,time()+7*24*60*60);
            setcookie("code",md5($username.md5($password)),time()+7*24*60*60);
            header('refresh:3;url=all-movie.php');
            echo "登录成功,3秒后跳转到所有影片页面";
        }else{
            header('refresh:3;url=login.html');
            echo "密码错误，3秒后跳转到登录页面";
        }
    }else{
        header('refresh:3;url=login.html');
        echo "没有找到该用户名，3秒后跳转到登录页面";
    }

}
?>