<?php
include_once("db/DbManage.php");
$db = new DbManage();
$key = trim($_POST["a"]);
$key_arr = explode("#",$key);
date_default_timezone_set("Asia/Shanghai");
$time = date("Y-m-d H:i:s");
$sqlTxt = "INSERT INTO sale_info (Pos_x_y,fyt_plan_id,User_name,actual_price,Telephone,time)
VALUES ('".$key_arr[0]."','".$key_arr[1]."','".$key_arr[2]."','".$key_arr[3]."','".$key_arr[4]."','".$time."')";
$result = $db->executeSqlTxt($sqlTxt);
$sqlTxt1 = "select money from user_info where User_name = '".$key_arr[2]."'";
$result1 = $db->executeSqlTxt($sqlTxt1);
$row = mysqli_fetch_array($result1);
$money1 = $row["money"];
$money = $row["money"] - $key_arr[3];
if($result){
    echo "选座成功1";
    $sqlTxt="UPDATE user_info SET money = '".$money."' WHERE User_name = '".$key_arr[2]."'";
    $result = $db->executeSqlTxt($sqlTxt);
    if($result){
        echo "选座成功2<br>
当前账户余额：".$money."=".$money1."-".$key_arr[3];
;
    }
}
echo" <a href=\"all-movie.php\">返回所有影片页面</a>";
?>

