<?php
include_once("db/DbManage.php");
$stuName = $_POST['a'];

?>
<?php
    if($stuName == "now") {
        ?>
        <div class="left-wrap" data-spm="w2">
            <div class="tab-control tab-movie-tit">

                <a class="ppp" href="javascript:void(0)" onclick="javascript:movie(par)"> 正在热映 </a>
                <a class="ttt" href="javascript:void(0)" onclick="javascript:movie(f)">即将上映</a>
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
                                    <div class="movie-card-list">
                                        <span>导演：布拉德&middot;佩顿</span>
                                        <span>主演：道恩&middot;强森,娜奥米&middot;哈里斯,杰弗里&middot;迪恩&middot;摩根,玛琳&middot;阿克曼</span>
                                        <span>类型：动作,冒险,科幻</span>
                                        <span>地区：美国</span>
                                        <span>语言：英语</span>
                                        <span>片长：108分钟</span></div>
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

        <?php
    }else {
        ?>

        <div class="left-wrap" data-spm="w2">
            <div class="tab-control tab-movie-tit">

                <a class="aaa" href="javascript:void(0)" onclick="javascript:movie(par)"> 正在热映 </a>
                <a class="bbb" href="javascript:void(0)" onclick="javascript:movie(f)">即将上映</a>
                <!--a class="more" href="#">查看全部&nbsp;&gt;</a-->
            </div>

            <div class="tab-content">

                <!-- 正在热映 -->
                <div class="tab-movie-list" >
                    <?php
                    include_once ("db/DbManage.php");
                    $db = new DbManage();
                    $sqlTxt = "select * from film_info WHERE time = 0" ;
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
                                    <div class="movie-card-list">
                                        <span>导演：布拉德&middot;佩顿</span>
                                        <span>主演：道恩&middot;强森,娜奥米&middot;哈里斯,杰弗里&middot;迪恩&middot;摩根,玛琳&middot;阿克曼</span>
                                        <span>类型：动作,冒险,科幻</span>
                                        <span>地区：美国</span>
                                        <span>语言：英语</span>
                                        <span>片长：108分钟</span></div>
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
        <?php
    }
    ?>
