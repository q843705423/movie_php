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
function movie_area(stuname){
    createXmlHttpRequestObject();

    var post_method= "a="+stuname;
    xmlHttp.open("POST","movie-area.php",true);
    xmlHttp.setRequestHeader
    ("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandler;
    xmlHttp.send(post_method);


}
function StatHandler(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){
        area.innerHTML = xmlHttp.responseText;
    }
}
function ChooseArea(obj){

    var m = document.getElementById('film_name');
    var film = m.innerText;
    var area = obj.innerText;
    var pass = film+"#"+area;

    movie_area(pass);

}