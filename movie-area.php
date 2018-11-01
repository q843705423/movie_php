<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/4/15
 * Time: 16:31
 */

include_once("db/DbManage.php");
$db = new DbManage();
$key = trim($_POST["a"]);
$key_arr = explode("#",$key);

$cinema_name = "";



?>
<h4 id = "area1_name" ><?php
    echo $key_arr[1];
    ?></h4>
<div class="filter-wrap">
    <div class="center-wrap">
        <?php
        if($key_arr[1] == "全部区域") {
            ?>
            <ul class="filter-select">
                <li>
                    <label>选择区域</label>

                    <div class="select-tags">
                        <a class="current" href="javascript:;" id="area1" onclick="ChooseArea(this)">全部区域</a>
                        <?php
                        include_once("db/DbManage.php");
                        $db = new DbManage();
                        $sqlTxt = "select * from area_info";
                        $result = $db->executeSqlTxt($sqlTxt);

                        while ($row = mysqli_fetch_array($result)) {
                            $g = $row["Area_name"];
                            ?>

                            <a href="javascript:;" onclick="ChooseArea(this) "
                               name="area2"><?php echo $row["Area_name"] ?></a>
                            <?php
                        }
                        ?>
                    </div>


                </li>


                <li>
                    <label>选择影城</label>
                    <div class="select-tags">
                        <?php
                        include_once("db/DbManage.php");
                        $db = new DbManage();
                        $sqlTxt = "select * from dyy_info";
                        $result = $db->executeSqlTxt($sqlTxt);
                        $row = mysqli_fetch_array($result);

                        $cinema_name = $row["dyy_name"];


                        ?>
                        <a href="javascript:;" class="current" onclick="cinema(this)"
                           id="ar1"><?php echo $row["dyy_name"] ?></a>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <a href="javascript:;" onclick="cinema(this)" name="ar2"> <?php echo $row["dyy_name"] ?></a>
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
            <?php
        }else{
        ?>
            <ul class="filter-select">
                <li>
                    <label>选择区域</label>

                    <div class="select-tags">
                        <a  href="javascript:;" id="area1" onclick="ChooseArea(this)" >全部区域</a>
                        <?php
                        include_once("db/DbManage.php");
                        $db = new DbManage();
                        $sqlTxt = "select * from area_info";
                        $result = $db->executeSqlTxt($sqlTxt);

                        while ($row = mysqli_fetch_array($result)) {
                            if($row["Area_name"]==$key_arr[1]) {
                                $Area_id = $row["Area_id"];
                                ?>

                                <a href="javascript:;" onclick="ChooseArea(this) "
                                   name="area2" class="current"><?php echo $row["Area_name"] ?></a>
                                <?php
                            }else {
                                ?>
                                <a href="javascript:;" onclick="ChooseArea(this) "
                                   name="area2"><?php echo $row["Area_name"] ?></a>
                                <?php
                            }
                                ?>
                            <?php
                        }
                        ?>
                    </div>


                </li>


                <li>
                    <label>选择影城</label>
                    <div class="select-tags">
                        <?php
                        include_once("db/DbManage.php");
                        $db = new DbManage();
                        $sqlTxt = "select * from dyy_info WHERE Area_id ='".$Area_id."'";
                        $result = $db->executeSqlTxt($sqlTxt);
                        $row = mysqli_fetch_array($result);
                        $qer = $row["dyy_id"];
                        $cinema_name = $row["dyy_name"];


                        ?>
                        <a href="javascript:;" class="current" onclick="cinema(this)"
                           id="ar1"><?php echo $row["dyy_name"] ?></a>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <a href="javascript:;" onclick="cinema(this)" name="ar2"> <?php echo $row["dyy_name"] ?></a>
                            <?php
                        }
                        ?>
                    </div>
                    <a class="J_show select-show" href="javascript:;">更多&gt;</a>

                </li>
                <li>
                    <label>选择时间</label>
                    <div class="select-tags">
                        <script>
                            var a = <?php echo $qer; ?>
                        </script>
                        <a class="current" href="javascript:;"  onclick="ChooseTime(this,1)" id = "time1"><?php echo  date("m")."月".date("d")."日"; ?>（今天）</a>
                        <a href="javascript:;"  onclick="ChooseTime(this,2)" name = "time2"><?php $d=strtotime("tomorrow");echo  date("m",$d)."月".date("d",$d)."日";?></a>

                    </div>
                </li>
            </ul>
        <?php
        }
        ?>
    </div>
</div>
<!-- Cinema bar -->
<div id = "plan">

<h4 id = "film_name" ><?php echo $key_arr[0]?></h4>
<h4 id = "data" ><?php echo date("Y-m-d")?></h4>
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
            if ($row["Dyy_id"] == $i && $row["data"] == date("Y-m-d") && $row["Film_id"] == $key_arr[0]) {
                $go_seat = $row["fyt_plan_id"];
                if ($m % 2 == 1) {
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
                            <a class="seat-btn" href="<?php echo "seat.php?new=" . $go_seat ?>">选座购票</a>
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
