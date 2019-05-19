function buscarCorreo(){
    var remitente=document.getElementById("barraBusqueda").value;

    // console.log(remitente);

    if(remitente==""){
        document.getElementById("tabla").innerHTML="";

    }else{
        
        if(window.XMLHttpRequest){
            XMLHttp=new XMLHttpRequest();
        }else{
            XMLHttp=new ActiveXObject("Microsoft.XMLHttp")
        }
        XMLHttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                document.getElementById("tabla").innerHTML=this.responseText;
            }
        }
        XMLHttp.open("GET", "../../../admin/controladores/usuario/buscar.php?remitente="+remitente,true);
        XMLHttp.send();

    }

}