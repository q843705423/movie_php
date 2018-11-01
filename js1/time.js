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
function Timesearch(key){
    createXmlHttpRequestObject();
    var post_method='a='+ key;
    //alert(key);
    xmlHttp.open("POST","movie-time.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandlerTime;
    xmlHttp.send(post_method);
}
function StatHandlerTime(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){

        plan.innerHTML = xmlHttp.responseText;

    }
}



function ChooseTime(obj,type){

    var a = document.getElementById('time1');
    a.style.color="#000";

    a.style.background="none";
    var b = document.getElementsByName("time2");
    for(var i=0;i<b.length;i++){
        b[i].style="background:none;color:#000;";

    }
    var n = document.getElementById('dyy_name');
    var name = n.innerText;
    var m = document.getElementById('film_name');
    var film = m.innerText;
    //alert(name);


    var pass = type +"#"+ name+"#"+film;

    //alert(pass);

    obj.style.color="#FFF";
    obj.style.background="#f42429";
    Timesearch(pass);

}