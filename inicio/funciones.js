function llenar_lista(){
     // console.log("Se ha llenado lista");
    // preCarga(1000,4);
    var fecha1,fecha2;
    fecha1=$("#fecha1").val();
    fecha2=$("#fecha2").val();
    
    $.ajax({
        url:"llenarLista.php",
        type:"POST",
        dateType:"html",
        data:{
             'fecha1':fecha1,
             'fecha2':fecha2
        },
        success:function(respuesta){
            $("#lista").html(respuesta);
            $("#lista").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    });	
}
function ultimoRegistro(){
    $.ajax({
        url:"ultimoRegistro.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            console.log(respuesta);
            if (respuesta.split(",")[0]!=''){
                $("#matricula").val(respuesta.split(",")[0]);
                $("#nombre").val(respuesta.split(",")[1]);
                $("#carrera").val(respuesta.split(",")[2]);
                $("#descripcion").val(respuesta.split(",")[3]);
                var matricula=(respuesta.split(",")[0]);
                $("#imgUA").attr("src","../images/"+matricula+".jpg");
            }else{ 
            }
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}
function verUltimoAcceso(){
    
    $("#ultimoRegistro").fadeIn('low');
    $("#btnVerRegistro").hide();
    $("#btnOcultarRegistro").show();
}
function ocultarUltimoAcceso(){
    
    $("#ultimoRegistro").slideUp('slow');
    $("#btnVerRegistro").fadeIn('low');
    $("#btnOcultarRegistro").hide();
}