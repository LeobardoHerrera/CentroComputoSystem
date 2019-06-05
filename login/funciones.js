function entrando(){
    window.location='../inicio/index.php';
}

function cambioContra(){
    $("#cuerpo").hide();
    $("#cambiarContra").fadeIn('low');
    alertify.warning("Debes de cambiar tu contraseña , ya que es tu primer ingreso al sistema",3);
    $("#vContra1").val('');
    $("#vContra2").val('');
    $("#vContra1").focus();
}

$("#frmIngreso").submit(function(e){
    var usuario,contra;
    var usuario = $("#username").val();
    var contra  = $("#pass").val();
    var usuario=usuario.trim();
    
    // contra=contra.trim();
    if(usuario=='' || contra==''){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Acceso denegado',
            'label':'Aceptar',
            'message': 'Debes de colocar nombre de usuario y contraseña' ,
            'onok': function(){ 
                alertify.message('Gracias !');
                $("#username").val('');
                $("#pass").val('');
                $("#username").focus();
            }
        }).show();
        return false;    
    }else{
        $.ajax({
            url:"verificar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra
                 },
            success:function(respuesta){
              console.log(respuesta);
              respuesta=parseInt(respuesta);
              switch(respuesta){
                  case 0 :
                        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

                        alertify.alert()
                        .setting({
                            'title':'Acceso denegado',
                            'label':'Aceptar',
                            'message': 'Nombre de usuario o contraseña incorrectos' ,
                            'onok': function(){ 
                                alertify.message('Gracias !');
                                $("#username").val('');

                            }
                        }).show();   
                    break;
                  case 1 :
                        var valorChk=$('#chkContra').val();
                        if(valorChk=='si'){
                            cambioContra();
                            $("#usuario").val(usuario);                       
                        }else{
                            alertify.success('Ingresando....') ; 
                            preCarga(2000,2);
                            setInterval(entrando, 2000);
                    }
                    break;
                  case 2 :
                        cambioContra();
                        $("#usuario").val(usuario);

                    break;
              }

            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
    } 
        e.preventDefault();
        return false;
});

function evaluarCheck(valor){
    
    if(valor=='no'){
        $('#chkContra').val('si');
    }else{
        $('#chkContra').val('no');
    }

    console.log(valor);
   
}

function cancelar(){
        // console.log("Saliendo del sistema...")
        alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
        alertify.confirm(
            'Sistema de Registro de Alumnos', 
            '¿ Deseas cancelar el cambio de contraseña?', 
            function(){ 
                $("#cuerpo").fadeIn();
                $("#cambiarContra").hide('low'); 
                $("#frmIngreso")[0].reset();   
                $("#frmCambiar")[0].reset();    
                $("#username").focus();      
                }, 
            function(){ 
                    alertify.error('Cancelar') ; 
                    console.log('cancelado')}
        ).set('labels',{ok:'Si',cancel:'No'});
}
$("#frmCambiar").submit(function(e){
      // var usuario,contra,vContra;
      var usuario = $("#usuario").val();
      var contra  = $("#vContra1").val();
      var vContra = $("#vContra2").val();
    
       // validacion para que las contraseñas coincidan
       if(contra != vContra){
           alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
   
           alertify.alert()
           .setting({
               'title':'Información',
               'label':'Salir',
               'message': 'Las contraseñas deben de ser iguales.' ,
               'onok': function(){ alertify.message('Gracias !');}
           }).show();
           $("#contra").focus();
           return false;       
       }
       // var ide = $("#usuario").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            entrando();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});
// RELOJ
var iniciarHora = function (){

var fechaActual = new Date();
var tiempoHoras = fechaActual.getHours();
var tiempoMinutos= fechaActual.getMinutes();
var tiempoSegundos=fechaActual.getSeconds();

var mesActual= fechaActual.getMonth();
var diaActual = fechaActual.getDay();
var diaDelMes= fechaActual.getDate();
var  aActual =fechaActual.getFullYear();
var amOpm;

var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
var esteMes = meses[mesActual];

  var diasDeLaSemana = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
  var diaDeHoy = diasDeLaSemana[diaActual];

  amOpm = (tiempoHoras > 12) ? "pm": "am";
  tiempoHoras = (tiempoHoras > 12) ? tiempoHoras - 12 : tiempoHoras;
  tiempoHoras = (tiempoHoras < 10) ? "0" + tiempoHoras : tiempoHoras;
  tiempoMinutos = (tiempoMinutos < 10) ? "0" + tiempoMinutos : tiempoMinutos;
  tiempoSegundos = (tiempoSegundos <10) ? "0" + tiempoSegundos:tiempoSegundos;

  document.getElementById("laFechaR").innerHTML = diaDeHoy +" "+diaDelMes + " de "+esteMes + " del " +aActual;
  document.getElementById("infoR").innerHTML = tiempoHoras+":"+tiempoMinutos+":"+tiempoSegundos+" "+amOpm;
}

iniciarHora();
setInterval(iniciarHora, 1000);
// FIN RELOJ
function registros(){
    $("#cuerpo").hide();
    $("#registros").fadeIn('low');
    $("#clave").focus();
}
function salir(){
        alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
        alertify.confirm(
            'Sistema de Registro de Alumnos', 
            '¿Deseas salir del Registro de Alumnos?', 
            function(){ 
                $("#cuerpo").fadeIn();
                $("#registros").hide('low'); 
                // $("#frmIngreso")[0].reset();   
                $("#frmRegistros")[0].reset();    
                $("#username").focus();      
                }, 
            function(){
                    alertify.error('Operacion Cancelada');
                    console.log('cancelado')}
        ).set('labels',{ok:'Si',cancel:'No'});
}
$("#frmRegistros").on('keypress',function(e) {
    if(e.which == 13) {        
    // Variables
      var clave = $("#clave").val();
    
    $.ajax({
            url:"verificar_matricula.php",
            type:"POST",
            dateType:"html",
            data:{
                    'clave':clave
                 },
            success:function(respuesta){
                console.log(respuesta);
            if (respuesta.split(",")[0]!=''){
                 
                $("#mensaje").val(respuesta.split(",")[0]);
                $("#descripcion").val(respuesta.split(",")[1]);
                $("#nombre").val(respuesta.split(",")[2]);
                $("#carrera").val(respuesta.split(",")[3]);
                var sexo=respuesta.split(",")[4];
                var ruta=respuesta.split(",")[5];
                if (ruta=="1") {
                    $("#img").attr("src","../images/"+clave+".jpg");
                }
                else{
                    if (sexo=='M') {
                        $("#img").attr("src","../images/hombre.jpg");
                    }else{
                        $("#img").attr("src","../images/mujer.jpg");
                    }
                }
                
                var nombre=respuesta.split(",")[2];
                var situacion=respuesta.split(",")[0];
                hablar(nombre,situacion);
                $("#clave").val('');
                
                setTimeout(limpiarDatos,4000);
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Registro Exitoso');
            }else{
                alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

                        alertify.alert()
                        .setting({
                            'title':'Operación Denegada',
                            'label':'Aceptar',
                            'message': 'Esta clave no existe intente de nuevo.' ,
                            'onok': function(){ 
                                alertify.message('Gracias !');
                                $("#clave").val('');
                                $("#clave").focus();

                            }
                        }).show();  
            }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
    }
});
function limpiarDatos(){
    $("#mensaje").val('');
    $("#descripcion").val('');
    $("#nombre").val('');
    $("#carrera").val('');
    // $('#img').attr("src","");
    $("#img").attr("src","../images/logo.JPG");
}
function hablar(nombre,situacion){
        var nombre=nombre.toString();
        var situacion=situacion.toString();
        
        //textoAtraducir=$("#texto").val(); 
        responsiveVoice.speak("El alumno "+nombre+" ha registrado una "+situacion ,"Spanish Female"); 
        //alert(textoAtraducir);
}

