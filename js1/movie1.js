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
function movie(stuname){
    createXmlHttpRequestObject();

    var post_method= "a="+stuname;
    xmlHttp.open("POST","all-movie-go.php",true);
    xmlHttp.setRequestHeader
    ("Content-Type","application/x-www-form-urlencoded;");
    xmlHttp.onreadystatechange=StatHandler;
    xmlHttp.send(post_method);


}
function StatHandler(){
    if(xmlHttp.readyState==4 && xmlHttp.status==200){
        student_list.innerHTML = xmlHttp.responseText;
    }
}