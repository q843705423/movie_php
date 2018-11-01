function ChooseArea(obj){
        var a = document.getElementById('arealist');

        a.style.color="#000";
        a.style.background="none";
        var b = document.getElementsByName("arealist2");
        for(var i=0;i<b.length;i++){
            b[i].style="background:none;color:#000;";

        }

        obj.style.color="#FFF";
        obj.style.background="#f42429";
        AreaSearch(obj.innerText);


    }
