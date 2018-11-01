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
function movie_cinema(stuname){
    createXmlHttpRequestObject();

    var post_method= "a="+stuname;
    xmlHttp.open("POST","movie-cinema.php",true);
    xmlHttp.setRequestHeader
    ("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandler1;
    xmlHttp.send(post_method);


}
function StatHandler1(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){
        area.innerHTML = xmlHttp.responseText;
    }
}
function cinema(obj){


    var m = document.getElementById('film_name');
    var film = m.innerText;
    var cinema = obj.innerText;
    var T = document.getElementById('data');
    var time = T.innerText;
    var A = document.getElementById('area1_name');
    var area = A.innerText;


    var pass = film + "#" + time + "#" + cinema + "#" + area;


    movie_cinema(pass);

}