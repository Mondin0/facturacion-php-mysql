//===================== TOMAMOS EL EVENTO SUBMIT DEL FORMULARIO ===================
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formCli").addEventListener('submit', validarFormulario); 
});

// ======== DEFINIMOS LA FUNCIÓN QUE SE EJECUTE CUANDO SE ENVIE EL FORMULARIO =======

function validarFormulario(evento){
    evento.preventDefault(); // prevenimos el envio por default

    // VALIDAMOS VARIABLE POR VARIABLE, si falta alguna, return

    var nombres = document.getElementById('nombres');
    if(nombres.value == ''|| nombres.value == null ){
        alert('El campo nombres es obligatorio');
        nombres.focus();
        return;
    };
    var domicilio = document.getElementById('domicilio');
    if (domicilio.value == ''|| domicilio.value == null){
        alert('El campo domicilio es obligatorio');
        domicilio.focus();
        return;
    };
    var localidad = document.getElementById('localidad');
    if (localidad.value == ''|| localidad.value == null ){
        alert('El campo localidad es obligatorio');
        localidad.focus();
        return;
    };
    var provincia = document.getElementById('provincia');
    if (provincia.value == ''|| provincia.value == null ){
        alert('El campo provincia es obligatorio');
        provincia.focus();
        return;
    };
    var telefono = document.getElementById('telefono');
    if (telefono.value == ''|| telefono.value == null){
        alert('El campo telefono es obligatorio');
        telefono.focus();
        return;
    };

    // SI TODO ESTA COMPLETO, SE ENVIA  EL FORMULARIO

    alert("Muchas gracias por enviar el formulario");
    this.submit();
};
/*
function valida_envia(){
    //valido el nombre
    if (document.fvalida.nombres.value.length==0){
        alert("Tiene que escribir su nombre")
        document.fvalida.nombres.focus()
        return ;
    };
    if (document.fvalida.domicilio.value.length==0){
        alert("Tiene que escribir su domicilio")
        document.fvalida.domicilio.focus()
        return ;
    };
    if (document.fvalida.localidad.value.length==0){
        alert("Tiene que escribir su localidad")
        document.fvalida.localidad.focus()
        return ;
    };
    if (document.fvalida.provincia.value.length==0){
        alert("Tiene que escribir su provincia")
        document.fvalida.nombres.focus()
        return ;
    };
    if (document.fvalida.telefono.value.length==0){
        alert("Tiene que escribir su teléfono")
        document.fvalida.telefono.focus()
        return;
    };
 
    //el formulario se envia
    alert("Muchas gracias por enviar el formulario");
    document.fvalida.submit();
}*/