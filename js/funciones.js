$("#frmEditarContra").submit(function(e){
    
    var contra  = $("#contraC").val();
    var vContra = $("#vContraC").val();
   
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
           //$("#contraC").focus();
           return false;       
       }

    var ide = $("#idC").val();
    //alert(ide);

        $.ajax({
            url:"../inicio/cambiarContra.php",
            type:"POST",
            dateType:"html",
            data:{
                    'contra':contra,
                    'ide':ide
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            //$("#frmActuliza")[0].reset();
            $("#modalEditarContra").modal("hide");
            //llenar_lista();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});
function mostrarContra(){
    var btnMostrar=$('#btnMostrar').val();
    // console.log(btnMostrar);
    preCarga(300,2);
    if(btnMostrar=='oculto'){
        $("#contraC").attr("type","text");
        $("#vContraC").attr("type","text");
        $("#btnMostrar").attr("value","visto");
        $("#icoMostrar").removeClass("far fa-eye fa-lg");
        $("#icoMostrar").addClass("far fa-eye-slash fa-lg");
    }
    else{
        $("#contraC").attr("type","password");
        $("#vContraC").attr("type","password");
        $("#btnMostrar").attr("value","oculto");
        $("#icoMostrar").removeClass("far fa-eye-slash fa-lg");
        $("#icoMostrar").addClass("far fa-eye fa-lg");       
    }
}