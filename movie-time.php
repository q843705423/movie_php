<?php
include_once("db/DbManage.php");
$db = new DbManage();
$key = trim($_POST["a"]);
$key_arr = explode("#",$key);
if($key_arr[0] == 1){
    $date = date("Y-m-d");
}else{
    $d=strtotime("tomorrow");
    $date = date("Y-m-d",$d);
}


?>
<h4 id = "film_name"><?php echo $key_arr[2]?></h4>
<h4 id = "data"><?php echo  $date ?></h4>
<div class="center-wrap cinemabar-wrap" id = "ee">
    <h4 id = "dyy_name"><?php echo $key_arr[1] ?></h4>

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

        <tbody >

        <?php
        include_once ("db/DbManage.php");
        $db = new DbManage();
        $sqlTxt = "select * from dyy_info WHERE dyy_name='".$key_arr[1]."'";
        $result = $db->executeSqlTxt($sqlTxt);
        if($row = mysqli_fetch_array($result)){
            $i = $row["dyy_id"];

        }

        $sqlTxt = "select * from fyt_plan,fyt_info where fyt_plan.Fyt_id=fyt_info.Fyt_id" ;
        $result = $db->executeSqlTxt($sqlTxt);

        $m = 2;
        while($row = mysqli_fetch_array($result)) {

            if ($row["Dyy_id"] == $i && $row["data"] == $date && $row["Film_id"] == $key_arr[2]) {
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
