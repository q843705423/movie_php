var xmlHttp;
function createXmlHttpRequestObject(){
    if(window.ActiveXObject){
        try{
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp=false;
        }
    }else{
        try{
            xmlHttp=new XMLHttpRequest();
        }catch(e){
            xmlHttp=false;
        }
    }
    if(!xmlHttp)
        alert("aaaa");
    else
        return xmlHttp;
}
function Seatsearch(key){
    createXmlHttpRequestObject();
    var post_method='a='+ key;
    //alert(key);
    xmlHttp.open("POST","seat1.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandlerSeat;
    xmlHttp.send(post_method);
}
function StatHandlerSeat(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){

        seat1.innerHTML = xmlHttp.responseText;

    }
}
function seatbuy(seat,a,name,money1){

    var n=document.getElementById("telephone1").value;
    var m=document.getElementById("total");
    var money = m.innerText;
    var pass = seat +"#"+ a+"#"+name+"#"+money+"#"+n;
    if(seat == ""){
        seatno();
    }else if(n.length != 11){
        telephone();
    }else if(money1-money<0){
        money2();
    }else{
        Seatsearch(pass);
    }
}
function seatno() {
    alert("请选座");
}
function telephone() {
    alert("请输入正确的接收电话号码");
}
function money2() {
    alert("账户余额不足，请先充值！");
}