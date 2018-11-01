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
function Moneysearch(){
    var n=document.getElementById("text1").value;
    alert("充值成功");
    createXmlHttpRequestObject();
    var post_method='a='+ n;
    //alert(key);
    xmlHttp.open("POST","add_money.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=MoneyHandler;
    xmlHttp.send(post_method);
}
function MoneyHandler(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){
        add_money.innerHTML = xmlHttp.responseText;
    }
}
