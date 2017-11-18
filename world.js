window.onload=function(){
    

    document.getElementById("lookup").addEventListener("click",function()
    {
        var country=document.getElementById("country").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("result").innerHTML=this.responseText;
            }
        };
        var box = document.getElementById("cbchicken").checked;
        if (box == true)
        {
            xhttp.open("GET", "world.php?all=true", true);
        } else {
            xhttp.open("GET", "world.php?country="+country, true);
        }
        xhttp.send();
    
    }); 
    
};
        