document.write("<h4>Hola</>")

function saludar(saludo){
    alert(saludo)
}

function suma(){
    //var o let para variabkes
    var n1 = Number(document.getElementById("numero1").value)
    var n2 = Number(document.getElementById("numero2").value)

    

    var res = n1+n2
    //alert(res)
    document.getElementById("resultado").value = res
}

function restar(){
    var n1 = Number(document.getElementById("numero1").value)
    var n2 = Number(document.getElementById("numero1").value)

    var res= n1-n2
    document.getElementById("resultado") = res
}

function multiplicar(){
    var n1 = Number(document.getElementById("numero1").value)
    var n2 = Number(document.getElementById("numero1").value)

    var res= n1*n2
    document.getElementById("resultado") = res
}

function dividir(){
    var n1 = Number(document.getElementById("numero1").value)
    var n2 = Number(document.getElementById("numero1").value)

    var res= n1/n2
    document.getElementById("resultado") = res
}

function operaciones(){
    if(document.getElementById("operaciones")==document.getElementById("sumar")){
        var n1 = Number(document.getElementById("numero1").value)
        var n2 = Number(document.getElementById("numero2").value)

    

        var res = n1+n2
        document.getElementById("operaciones").value = res
    }else{
        if(document.getElementById("resultado")==document.getElementById("restar")){
            var n1 = Number(document.getElementById("numero1").value)
            var n2 = Number(document.getElementById("numero2").value)

    

        var res = n1-n2
        document.getElementById("resultado").value = res
        }
    }
}