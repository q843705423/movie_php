<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" width="200" border="1" content = "text/html;charset = utf-8">
    <title></title>
    <link rel="stylesheet" href="css/login_top.css">
</head>
<script language="javascript" src="js1/add_movie.js"></script>
<style>
    body {
        background: #FFF;
        color: #333;
        font-size: 12px;
        line-height: 20px;
        display: block;
    }
</style>
<body>
<div id = "add_money">
<?php include 'login_top.php';?>
<?php
include_once("db/DbManage.php");
$db = new DbManage();
$sqlTxt1 = "select money from user_info where User_name = '".$_SESSION['username']."'";
$result1 = $db->executeSqlTxt($sqlTxt1);
$row = mysqli_fetch_array($result1);
?>
<a href="all-movie.php">返回所有影片页面</a><br/>
<?php
echo $_SESSION['username'];
?>
<br>总金额：<?php
echo $row["money"];
$m = $row["money"];
?>
<form name="form1" method="post" id = "form1">
    <input type="text" name="find" id = "text1" onkeyup="value=value.replace(/[^\d]/g,'')"/>
    <input type="button" name = "btn" value="充值" onclick="Moneysearch()"/>
</form>
<table width="500" height = "84" border="1">
    <tr>
        <th scope="col">时间</th>
        <th scope="col">电影</th>
        <th scope="col">放映厅</th>
        <th scope="col">消费</th>


    </tr>
    <br>消费记录：
    <?php
$sqlTxt = "select * from sale_info where User_name = '".$_SESSION['username']."'order by time desc";
$result = $db->executeSqlTxt($sqlTxt);
while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php
                echo $row["time"];
                ?></td>
            <td></td>
            <td></td>
            <td><?php
                echo $row["actual_price"];
                ?></td>

            <?php
            $m = $m + $row["actual_price"];
            ?>
        </tr>
        <?php
    }
    ?>
</table>
<br>充值记录：
<table width="500" height = "84" border="1">
    <tr>
        <th scope="col">时间</th>
        <th scope="col">充值</th>

    </tr>
    <?php
    $sqlTxt = "select * from add_money where User_name = '".$_SESSION['username']."'order by time desc";
    $result = $db->executeSqlTxt($sqlTxt);
    while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php
                echo $row["time"];
                ?></td>
            <td>
                <?php
                echo $row["money_add"];
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</div>
</body>
</html>
