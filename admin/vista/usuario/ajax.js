function buscarPorCedula(){

    var cedula = document.getElementById("cedula").value;
    if(cedula==""){
        document.getElementById("informacion").innerHTML="";
    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
            //verifica si el navegador utilizado es actual
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            //para navegadores no actuales
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("informacion").innerHTML = this.respondeText;
            }
        }
        xmlhttp.open("Get","buscar.php?cedula="+cedula, true);
        xmlhttp.send();
    }
}