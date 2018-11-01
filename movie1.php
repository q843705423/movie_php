<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>电影票</title>
    <link rel="stylesheet" href="css/movie1.css">
    <link rel="stylesheet" href="css/login_top.css">
</head>
<script language="javascript" src="js1/movie.js"></script>
<script language="javascript" src="js1/movie-area.js"></script>
<script language="javascript" src="js1/cinema.js"></script>
<script language="javascript" src="js1/time.js"></script>

<body>
<?php include 'login_top.php';?>
<div class="head-wrap">
    <div class="head-content center-wrap">
        <h1 class="logo">
            <a target="_top" href="#"></a>
        </h1>
        <div class="cityWrap">
            <a id="cityName" class="cityName" href="javascript:">
                <span class="name" data-id="330100">杭州</span>
                <s class="tri"></s>
            </a>
        </div>
        <div class="nav-wrap">
            <ul class="nav">
                <li class="J_NavItem ">
                    <a href="#" target="_top">首页</a>
                </li>
                <li class="J_NavItem  current ">
                    <a href="#" target="_top">影片</a>
                </li>
                <li class="J_NavItem ">
                    <a href="#" target="_top">影院</a>
                </li>

            </ul>
        </div>
        <div class="entrance-wrap">
            <ul class="entrance">
                <li class="entrance-item">
                    <a class="phone  " href="#">手机购买</a>
                </li>
                <li class="entrance-item">
                    <a class="service" >客服咨询</a>
                </li>
            </ul>
        </div>
    </div>
</div>




<div class="detail-wrap J_detailWrap" data-spm="w1">

    <div class="detail-cont">
        <div class="center-wrap">
            <?php
                    include_once ("db/DbManage.php");
                    $a = $_GET['new'];
                    $db = new DbManage();
                    $sqlTxt = "select * from film_info WHERE Film_id = '" . $a ."'" ;
                    $result = $db->executeSqlTxt($sqlTxt);
                    while($row = mysqli_fetch_array($result)) {
                        $w = $row["Film_name"];

                ?>

                <h3 class="cont-title"><?php echo $row["Film_name"] ?>  <em class="score"><?php echo $row["Hot"] ?></em></h3>
            <div class="cont-pic">
                <img with="230" heigh="300" src=<?php echo $row["Film_image_path"] ?> alt="">
            </div>
            <ul class="cont-info">
                <li>导演：<?php echo $row["Director"] ?></li>
                <li>主演：<?php echo $row["Actors"] ?></li>
                <li>类型：<?php echo $row["Type"] ?></li>
                <li>制片国家/地区：<?php echo $row["chuntry"] ?></li>
                <li>语言：<?php echo $row["Language"] ?></li>

                <li class="J_shrink shrink"> 剧情介绍：<?php echo $row["produce"] ?></li>
            </ul>
            <div class="cont-time"><?php echo $row["data"] ?></div>
            <div class="cont-view">
                <a href="javascript:;" data-showId="157666" data-type='image' class="float-layer-hook"><img src="https://img.alicdn.com/bao/uploaded/i3/TB1isqtXQCWBuNjy0FaXXXUlXXa_.jpg_160x160.jpg" alt="" ><span>20</span></a>
                <a href="javascript:;" data-showId="157666" data-type='video' class="float-layer-hook"><img src="http://img02.taobaocdn.com/bao/uploaded/TB1VGHjkkSWBuNjSszdXXbeSpXa.jpg_100x100.jpg"  width="160" height="110" alt=""><s></s><span>6</span></a>
            </div>
        </div>

    </div>
</div>
<?php

}
?>


<div class="title-wrap">
    <div class="center-wrap">
        <h3>选座购票</h3>
    </div>
</div>






<div class="schedule-wrap J_scheduleWrap schedule-loaded" data-spm="w2" data-ajax="/showDetailSchedule.htm" data-param="showId=158775&amp;ts=1523344094555&amp;n_s=new" id = "area">
    <!-- Filter -->
    <h4 id = "area1_name" >全部区域</h4>
    <div class="filter-wrap">
        <div class="center-wrap">
            <ul class="filter-select">
                <li>
                    <label>选择区域</label>
                    <div class="select-tags">
                        <a class="current" href="javascript:;" id = "area1" onclick="ChooseArea(this)">全部区域</a>
                        <?php
                        include_once ("db/DbManage.php");
                        $db = new DbManage();
                        $sqlTxt = "select * from area_info" ;
                        $result = $db->executeSqlTxt($sqlTxt);

                        while($row = mysqli_fetch_array($result)) {
                            $g = $row["Area_name"];
                        ?>

                        <a href="javascript:;" onclick="ChooseArea(this) " name = "area2" ><?php echo $row["Area_name"] ?></a>
                            <?php
                                }
                             ?>
                    </div>
                </li>












                <li>
                    <label>选择影城</label>
                    <div class="select-tags" >
                        <?php
                        include_once ("db/DbManage.php");
                        $db = new DbManage();
                        $sqlTxt = "select * from dyy_info" ;
                        $result = $db->executeSqlTxt($sqlTxt);
                        $row = mysqli_fetch_array($result);

                        $cinema_name = $row["dyy_name"];


                        ?>
                        <a href="javascript:;" class="current" onclick="cinema(this)" id= "ar1"><?php echo $row["dyy_name"] ?></a>
                        <?php
                        while($row=mysqli_fetch_array($result)){
                        ?>
                            <a href="javascript:;" onclick="cinema(this)" name = "ar2"> <?php echo $row["dyy_name"] ?></a>
                            <?php
                        }
                        ?>
                    </div>
                    <a class="J_show select-show" href="javascript:;">更多&gt;</a>

                </li>
                <li>
                    <label>选择时间</label>
                    <div class="select-tags">

                        <a class="current" href="javascript:;"  onclick="ChooseTime(this,1)" id = "time1"><?php echo  date("m")."月".date("d")."日"; ?>（今天）</a>
                        <a href="javascript:;"  onclick="ChooseTime(this,2)" name = "time2"><?php $d=strtotime("tomorrow");echo  date("m",$d)."月".date("d",$d)."日";?></a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div  id = "plan">

    <h4 id = "film_name"><?php echo $a?></h4>
    <h4 id = "data"><?php echo  date("Y")."-".date("m")."-".date("d"); ?></h4>
    <div class="center-wrap cinemabar-wrap" id = "ee">
        <h4 id = "dyy_name"><?php echo $cinema_name?></h4>

        地址：滨江区江陵路2028号星耀城3幢3楼 <a href="/cinemaDetail.htm?cinemaId=31251&amp;n_s=new#detail">[地图]</a>  电话：0571-87752665
        <a class="more" href="/cinemaDetail.htm?cinemaId=31251&amp;n_s=new">查看影院详情&nbsp;&gt;</a>
    </div>

    <!-- Hall Tabel -->
    <div class="center-wrap" >
        <table class="hall-table">
            <thead>
            <tr>
                <th class="hall-time">放映时间</th>
                <th class="hall-type">语言版本</th>
                <th class="hall-name">放映厅</th>
                <th class="hall-flow">座位情况</th>
                <th class="hall-price">现价/影院价（元）</th>
                <th class="hall-buy">选座购票</th>
            </tr>
            </thead>
            <tbody>

            <?php
            include_once ("db/DbManage.php");
            $db = new DbManage();
            $sqlTxt = "select * from dyy_info WHERE dyy_name='".$cinema_name."'";
            $result = $db->executeSqlTxt($sqlTxt);
            if($row = mysqli_fetch_array($result)){
                $i = $row["dyy_id"];

            }

            $sqlTxt = "select * from fyt_plan,fyt_info where fyt_plan.Fyt_id=fyt_info.Fyt_id" ;
            $result = $db->executeSqlTxt($sqlTxt);

            $m = 2;
            while($row = mysqli_fetch_array($result)) {
                if ($row["Dyy_id"] == $i && $row["data"] == date("Y")."-".date("m")."-".date("d") && $row["Film_id"] == $a) {
                    $go_seat = $row["fyt_plan_id"];
                    if ($m % 2 == 1) {
                        $m++;
                        ?>
                        <tr>
                            <td class="hall-time">
                                <em class="bold"><?php echo $row["fyt_plan_id"] ?></em>
                                预计17:50散场
                            </td>
                            <td class="hall-type">
                                原版 3D
                            </td>
                            <td class="hall-name">
                                <?php echo $row["Fyt_name"] ?>
                            </td>

                            <td class="hall-flow">
                                <div class="flowing-wrap flowing-loose">
                                    <label> 宽松 </label>
                                    <span class="flowing-vol"><i style="width:0.0%"></i></span>
                                    <span class="flowing-view J_flowingView" data-scheduleid="513490107">
								    								<i class="icon-zoom"></i>
    								<div class="view-wrap" style="display:none;">
    									<div class="view-box">加载中...</div>
    								</div>
															</span>
                                </div>
                            </td>
                            <td class="hall-price" data-partcode="dingxinnew">
                                <em class="now">33.00</em>
                                <del class="old">80.00</del>
                            </td>
                            <td class="hall-seat">
                                <a class="seat-btn" href="<?php echo "seat.php?new=" . $go_seat ?>">选座购票</a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        $m++;
                        ?>
                        <tr class="even">
                            <td class="hall-time">
                                <em class="bold"><?php echo $row["fyt_plan_id"] ?></em>
                                预计18:40散场 					</td>
                            <td class="hall-type">
                                原版 3D
                            </td>
                            <td class="hall-name">
                                <?php echo $row["Fyt_name"] ?>
                            </td>

                            <td class="hall-flow">
                                <div class="flowing-wrap flowing-loose">
                                    <label> 宽松  </label>
                                    <span class="flowing-vol"><i style="width:0.0%"></i></span>
                                    <span class="flowing-view J_flowingView" data-scheduleid="513490095">
								    								<i class="icon-zoom"></i>
    								<div class="view-wrap" style="display:none;">
    									<div class="view-box">加载中...</div>
    								</div>
															</span>
                                </div>
                            </td>
                            <td class="hall-price" data-partcode="dingxinnew">
                                <em class="now">35.00</em>
                                <del class="old">70.00</del>
                            </td>
                            <td class="hall-seat">
                                <?php
                                if(isset($_COOKIE['username']))
                                {
                                    $_SESSION['username']=$_COOKIE['username'];
                                    $_SESSION['islogin']=1;
                                }
                                if(isset($_SESSION['islogin'])){
                                ?>
                                    <a class="seat-btn" href="<?php echo "seat.php?new=" . $go_seat ?>">选座购票</a>
                                    <?php
                                }else {
                                    ?>
                                    <a class="seat-btn" href="<?php echo "login.html" ;?>">选座购票</a>
                                    <?php
                                }
                                    ?>
                            </td>
                        </tr>
                        <?php
                    }
                }


            }
            ?>





            </tbody>
        </table>
    </div>
    </div>

</div>







</body>
</html>