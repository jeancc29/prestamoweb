var form = document.form_login;
var inputBuscar = document.getElementById("input-buscar");
var animalContainer = document.getElementById("resultado_busqueda");

var d = "";
var enviar = function(e){
    e.preventDefault();
    // var cargando = document.getElementById("cargando").style;
    // var correcto = document.getElementById("correcto").style;
    // cargando.display= "block";
    for(var i=0; i < form.length; i++){
        d += form[i].name + "=" + form[i].value;
        if(form[i+1] != undefined) d+="&&";
    }
    var r = new XMLHttpRequest();


    r.open('POST', '/prestamo/clases/consultaajax.php', true);
    r.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    window.setTimeout(function(){
        // cargando.display= "none";
        // correcto.display= "block";
    },2000);
    r.onload = function(){


        var data = r;
        console.log(data);
        console.log(data.responseText);
    }
    r.send(d);
    console.log(e);
}


 function buscar(e){
    if(inputBuscar.value == "") alert("hola");
    d = "";
    d = "buscar_cliente=";
     d += inputBuscar.value;
    console.log(inputBuscar.value);
     var r = new XMLHttpRequest();
     r.open('POST', '/prestamo/clases/consultaajax.php', true);
     r.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
     window.setTimeout(function(){
         // cargando.display= "none";
         // correcto.display= "block";
     },2000);
     r.onload = function(){
         var ourData = JSON.parse(r.responseText);
         console.log(ourData.resultados);
         renderHTML(ourData.resultados);
     }
     r.send(d);
}

//inputBuscar.onchange(buscar);
inputBuscar.addEventListener("input", buscar);
//form.addEventListener("submit", enviar);


function renderHTML(ourData){
    var htmlString = "";

    animalContainer.innerHTML = "";


    for (var i = 0; i < ourData.length; i++) {
        //htmlString += "<div class='col-10'>" + ourData[i].name + " is a " + ourData[i].species + ".</div>";
        htmlString +="<div class=\"row justify-content-center\"> " +
                        "<div class=\"col-3 d-inline\">"+ourData[i].identificacion+"</div>" +
                        "<div class=\"col-4 d-inline \">"+ourData[i].nombre+"</div>" +
                        "<div class=\"col-5 d-inline \">"+ourData[i].correo+"</div>" +
                    "</div>";

    }

    animalContainer.insertAdjacentHTML('beforeend', htmlString);
}
