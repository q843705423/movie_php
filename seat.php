<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/seat.css">
    <link rel="stylesheet" href="css/login_top.css">
    <style type="text/css">
        .demo{width:700px; margin:40px auto 0 auto; min-height:450px;}
        @media screen and (max-width: 360px) {.demo {width:340px}}

        .front{width: 300px;margin: 5px 32px 45px 32px;background-color: #f0f0f0;	color: #666;text-align: center;padding: 3px;border-radius: 5px;}
        .booking-details {float: right;position: relative;width:200px;height: 450px; }
        .booking-details h3 {margin: 5px 5px 0 0;font-size: 16px;}
        .booking-details p{line-height:26px; font-size:16px; color:#999}
        .booking-details p span{color:#666}
        div.seatCharts-cell {color: #182C4E;height: 29px;width: 29px;line-height: 25px;margin: 3px;float: left;text-align: center;outline: none;font-size: 13px;}
        div.seatCharts-seat {color: transparent;cursor: pointer;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}
        div.seatCharts-row {height: 52px;}
        div.seatCharts-seat.available {background: url(//img.alicdn.com/tps/i4/TB1Bbf2GXXXXXaiXpXXMUBxFVXX-26-25.png) center center no-repeat;
            background-size: auto 88%;}
        div.seatCharts-seat.focused {background: url(//img.alicdn.com/tps/i4/TB1Bbf2GXXXXXaiXpXXMUBxFVXX-26-25.png) center center no-repeat;
            background-size: auto 88%;
        }
        div.seatCharts-seat.selected {background:url("image/1.png")center center no-repeat;
            background-size: auto 88%;}
        div.seatCharts-seat.unavailable {cursor: not-allowed;
            background: url(//img.alicdn.com/tps/i1/TB1C5D7GXXXXXcTXXXXMUBxFVXX-26-25.png) center no-repeat;
            background-size: auto 88%;}
        div.seatCharts-container {border-right:width: 605px;padding: 37px;float: left;}
        div.seatCharts-legend {padding-left: 0px;position: absolute;bottom: 16px;}
        ul.seatCharts-legendList {padding-left: 0px;}
        .seatCharts-legendItem{float:left; width:90px;margin-top: 10px;line-height: 2;}
        span.seatCharts-legendDescription {margin-left: 5px;line-height: 30px;}
        .checkout-button {display: block;width:80px; height:24px; line-height:20px;margin: 10px auto;border:1px solid #999;font-size: 14px; cursor:pointer}
        #selected-seats {max-height: 150px;overflow-y: auto;overflow-x: none;width: 200px;}
        #selected-seats li{    float: left;
            color: #eb002a;
            padding: 0 5px;
            height: 26px;
            background: #fff;
            border: 1px solid #eb002a;
            text-align: center;
            margin: 0 24px 10px 0;}
    </style>
</head>
<script src="http://www.daimasucai.com/daima/template/1/js/jquery.min.js"></script>
<script type="text/javascript" src="jquery.seat-charts.min.js"></script>
<script language="javascript" src="js1/seat.js"></script>
<script>
    var price;
</script>
<body>
<?php include 'login_top.php';?>
<?php
    include_once ("db/DbManage.php");
    $fyt_plan = $_GET['new'];
    $db = new DbManage();
    $sqlTxt = "select Pos_x_y from sale_info where fyt_plan_id =".$fyt_plan;
    $result = $db->executeSqlTxt($sqlTxt);
    $cannot = "";
    while($row = mysqli_fetch_array($result)){
        if($cannot == ""){
            $cannot = $cannot.$row["Pos_x_y"];
        }else{
            $cannot = $cannot.",".$row["Pos_x_y"];
        }
    }
    echo "<script>var cannot=\"$cannot\"</script>";//传递给javascript


?>
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
<div id = "seat1">
<div class="center-wrap">
    <div class='seat-step'>
        <ul>
            <li class="down"><s></s>1.选择影片，场次</li>
            <li class="current">2.选座，填手机号</li>
            <li class="future">3.确认订单，支付</li>
            <li class="future">4.支付成功，影院取票观影</li>
        </ul>
    </div>
</div>
<div class="center-wrap seat-wrap">
    <div class="seat-left">
        <div class="clearfix">
            <?php
            include_once ("db/DbManage.php");
            $db = new DbManage();
            $sqlTxt = "select * from fyt_plan,fyt_info,film_info,dyy_info 
where fyt_plan.Fyt_id=fyt_info.Fyt_id and fyt_plan.Film_id = film_info.Film_id and
 fyt_info.Dyy_id=dyy_info.dyy_id and fyt_plan_id=
" .$fyt_plan;
            $result = $db->executeSqlTxt($sqlTxt);
            $row = mysqli_fetch_array($result);
            $para=$row["seat"];//定义一个字符串
            $rrr = $fyt_plan;
            echo "<script>var para=\"$para\"</script>";//传递给javascript
            echo "<script>var fyt_plan_id=\"$rrr\"</script>";//传递给javascript

            ?>
            <div class="seatContainer " id="seat-map" >
                <div class="seatTitle">
                    <h2>
                        <?php echo $row["dyy_name"];?> <?php echo $row["Fyt_name"]; ?> 银幕
                    </h2>
                    <s></s>
                </div>
            </div>

        </div>
        <div id="legend" hidden></div>



    </div>
    <div class="seat-right">
        <?php
        include_once ("db/DbManage.php");
        $db = new DbManage();
        $sqlTxt = "select * from fyt_plan,fyt_info,film_info,dyy_info 
where fyt_plan.Fyt_id=fyt_info.Fyt_id and fyt_plan.Film_id = film_info.Film_id and
 fyt_info.Dyy_id=dyy_info.dyy_id and fyt_plan_id=
" .$fyt_plan;

        $result = $db->executeSqlTxt($sqlTxt);
        $row = mysqli_fetch_array($result);
        $price = $row["Film_price"];
        echo "<script >var price=\"$price\"</script>";//传递给javascript
        ?>
        <div class="seatMovie clearfix">
            <div class="picBox">
                <a href="https://dianying.taobao.com/showDetail.htm?showId=213360&n_s=new">
                    <img src=<?php echo $row["Film_image_path"];?>></a>
            </div>
            <ul>
                <li><h3><?php echo $row["Film_name"];?>  </h3></li>
                <li>版本：<?php echo $row["Version"];?> </li>                <li>片长：<?php echo $row["film_time"];?>分钟 </li>            </ul>
        </div>
        <div class="seatContent">
            <ul>
                <li>
                    <label>影院：</label>
                    <strong><?php echo $row["dyy_name"];?></strong>
                </li>
                <li>
                    <label>影厅：</label>
                    <strong><?php echo $row["Fyt_name"];?></strong>
                </li>
                <li>
                    <label>场次：</label>
                    <a href="javascript:" class="changPlace J_show"><s></s>更换场次</a>
                    <em><?php echo $row["data"];?> <?php echo $row["Starttime"];?></em>
                </li>
                <li  class="line">
                    <!--<label>座位:</label>
                    <span class="No_set" style="">还未选择座位</span>
                    <div class="J_pewGroup"></div>
                    <p class="J_seatNum_tips" style="">点击<em>左侧座位图</em>选择座位，再次点击取消</p>
                    <p class="J_seatNum_text" style="display: none;">已选择<em id = "counter">0</em>个座位，再次点击座位可以取消</p>-->
                    <ul id="selected-seats"></ul>
                </li>
                <li>
                    <label>原价：</label>
                    <span class="J_originPrice originPrice" data-originprice="3500">&yen;<?php echo $row["Film_price"];?> x <i id = "counter">0</i></span>
                </li>

                <li class="total">
                    <label>总计:</label>
                    <div>
                        &yen;
                        <span class="J_price" data-price="3500" id = "total">
							0
						</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="seatForm">
            <input type="hidden" id="scheduleId" value="519662162" class="J_scheduleId">
            <input type="hidden" id="maxCanBuy" class="J_seatNum" value="4">
            <input type="hidden" id="seatInfo" class="J_seatNum">
            <input name='_tb_token_' type='hidden' value='e473453d38815'>
            <ul>
                <li>接收电子码的手机号(11位)</li>
                <li class="telphone">
                    <label class="placehold J_overTxtLabel"></label>
                    <input type="text" class="txt J_tel" id = "telephone1" value="" maxlength="11" onkeyup="value=value.replace(/[^\d]/g,'')">
                    <div class="telphone_show J-telphone_show" style="display: none;"></div>
                </li>
                <li>
                    <script type="text/javascript">
                        price = price*1;
                        var seat_sale = "";
                        var add = "";
                        var remove="";
                        var four = 0;
                        var seat = para.split(",");
                        $(document).ready(function() {
                            var $cart = $('#selected-seats'), //座位区
                                $counter = $('#counter'), //票数
                                $total = $('#total'); //总计金额

                            var sc = $('#seat-map').seatCharts({

                                map:seat,
                                naming : {
                                    top : false,
                                    getLabel : function (character, row, column) {
                                        return column;
                                    }
                                },
                                legend : { //定义图例
                                    node : $('#legend'),
                                    items : [
                                        [ 'a', 'available',   '可选座' ],
                                        [ 'a', 'unavailable', '已售出']
                                    ]
                                },
                                click: function () { //点击事件
                                    if (this.status() == 'available') { //可选座
                                        if(four < 4){
                                            $('<li>'+(this.settings.row+1)+'排'+this.settings.label+'座</li>')
                                                .attr('id', 'cart-item-'+this.settings.id)
                                                .data('seatId', this.settings.id)
                                                .appendTo($cart);
                                            if(seat_sale ==""){
                                                add = (this.settings.row+1)+"_"+this.settings.label;
                                            }else{
                                                add = ","+(this.settings.row+1)+"_"+this.settings.label;
                                            }
                                            seat_sale = seat_sale + add;
                                            $counter.text(sc.find('selected').length+1);
                                            $total.text(recalculateTotal(sc)+price);
                                            four = four + 1;
                                            return 'selected';
                                        }else{
                                            alert("一次选座不能超过4个");
                                            return 'available';
                                        }

                                    } else if (this.status() == 'selected') { //已选中
                                        four = four-1;
                                        //更新数量
                                        $counter.text(sc.find('selected').length-1);
                                        //更新总计
                                        $total.text(recalculateTotal(sc)-price);

                                        //删除已预订座位
                                        $('#cart-item-'+this.settings.id).remove();
                                        //可选座
                                        remove = (this.settings.row+1)+"_"+this.settings.label;

                                        var m = seat_sale.split(",");
                                        var n = new Array(m.length-1);
                                        var t = m.length;
                                        if(m.length == 1){
                                            seat_sale = "";
                                        }else{
                                            for(var i = 0;i<m.length;i++){

                                                if(m[i] == remove){
                                                    t = i;
                                                }
                                                if(i<n.length){
                                                    if(i>=t){
                                                        n[i] = m[i+1];

                                                    }else{
                                                        n[i] = m[i];

                                                    }
                                                }
                                            }
                                            for(var i = 0;i<n.length;i++){
                                                if(i ==0){
                                                    seat_sale = n[0];
                                                }else{
                                                    seat_sale = seat_sale + "," + n[i];
                                                }
                                            }
                                        }
                                        return 'available';
                                    } else if (this.status() == 'unavailable') { //已售出
                                        return 'unavailable';
                                    } else {
                                        return this.style();
                                    }
                                }
                            });
                            //已售出的座位
                            var seat_cannot = cannot.split(",");
                            for(var i = 0;i<seat_cannot.length;i++){
                                sc.get([seat_cannot[i]]).status('unavailable');
                            }
                        });
                        //计算总金额
                        function recalculateTotal(sc) {
                            var total = 0;
                            sc.find('selected').each(function () {
                                total += price;
                            });
                            return total;
                        }
                    </script>
                    <?php
                    if(isset($_COOKIE['username']))
                    {
                        $_SESSION['username']=$_COOKIE['username'];
                        $_SESSION['islogin']=1;
                        $username=$_SESSION['username'];
                        $sqlTxt1 = "select money from user_info where User_name = '".$_SESSION['username']."'";
                        $result1 = $db->executeSqlTxt($sqlTxt1);
                        $row = mysqli_fetch_array($result1);
                        $money1 = $row["money"];
                        echo "<script >var usename=\"$username\"</script>";//传递给javascript
                        echo "<script >var money1=\"$money1\"</script>";//传递给javascript
                    }
                    if(isset($_SESSION['islogin'])){
                    ?>
                        <a class="sub J_bt" href="javascript:;" onclick="seatbuy(seat_sale,fyt_plan_id,usename,money1)">确认信息，下单</a>
                        <?php
                    }else {
                        ?>
                        <a class="sub J_bt" href="<?php echo "login.html" ;?>" >确认信息，下单</a>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </div>

    </div>
</div>
</div>

</div>


</body>
</html>