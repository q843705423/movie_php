<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影片查看</title>
    <link rel="stylesheet" href="css/all-movie.css">
    <link rel="stylesheet" href="css/login_top.css">
</head>
<script language="javascript" src="js1/movie.js"></script>
<script src="js/jquery.js"></script>

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
<div class="center-wrap movie-path" data-spm="w1">
    <div class="path"><a href="https://dianying.taobao.com/index.htm?n_s=new">首页</a> > <a href="https://dianying.taobao.com/showList.htm?n_s=new">影片</a> > 杭州</div>
    <div class="steps"><span>3步轻松购票:1.选座购票/买券</span><i></i><span>2.收电子码</span><i></i><span>3.影院取票</span></div>
</div>
<?php
    $t = "adad";
?>


<script>
    var par = "now";
    var f = "future";
    var e=<?php echo $t; ?>;
</script>


<div class="center-wrap" id = student_list>

    <div class="left-wrap" data-spm="w2">
        <div class="tab-control tab-movie-tit">

            <a class="ppp" href="javascript:void(0)" onclick="javascript:movie(par);return false; "> 正在热映 </a>
            <a class="ttt" href="javascript:void(0)" onclick="javascript:movie(f);return false; ">即将上映</a>
            <!--a class="more" href="#">查看全部&nbsp;&gt;</a-->
        </div>

        <div class="tab-content">

            <!-- 正在热映 -->
            <div class="tab-movie-list" >
                <?php
                include_once ("db/DbManage.php");
                $db = new DbManage();
                $sqlTxt = "select * from film_info WHERE time = 1" ;
                $result = $db->executeSqlTxt($sqlTxt);

                while($row = mysqli_fetch_array($result)) {
                    $a = $row["Film_id"];
                    ?>


                    <div class="movie-card-wrap">
                        <a href="<?php echo "movie1.php?new=".$a ?>"
                           class="movie-card">
                            <div class="movie-card-tag"></div>
                            <div class="movie-card-poster">
                                <img width="160" height="224"
                                     data-src="https://img.alicdn.com/bao/uploaded/i4/TB18cozaDqWBKNjSZFAXXanSpXa_.jpg_160x240.jpg"
                                     src=<?php echo $row["Film_image_path"] ?>>
                            </div>
                            <div class="movie-card-name">
                                <span class="bt-l"><?php echo $row["Film_name"] ?></span>
                                <span class="bt-r"><?php echo $row["Hot"] ?></span>
                            </div>

                            <div class="movie-card-info">
                                <div class="movie-card-mask"></div>
                                <div class="mask">
                                <div class="sub">

                                    <span>导演：<?php echo $row["Director"] ?></span>
                                    <span>主演：<?php echo $row["Actors"] ?></span>
                                    <span>类型：<?php echo $row["Type"] ?></span>
                                    <span>地区：<?php echo $row["chuntry"] ?></span>
                                    <span>语言：<?php echo $row["Language"] ?></span>
                                    </div>
                            </div>
                            </div>
                        </a>
                        <a href="<?php echo "movie1.php?new=" . $a ?>"
                           class="movie-card-buy">选座购票</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>