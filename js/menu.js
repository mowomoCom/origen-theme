// INDICACIONES JS
$(document).ready(function(){

    // ABRIR MENU AL PULSAR HAMBURGUESA Y ANIMACION
    $(".hamburguesa").click(function(){
        $(this).toggleClass('animacion');
        $(".menu-principal").toggleClass("mostrar");
    });

    // CREAR ELEMENTO PARA ABRIR MENU EN MOVIL (FLECHA)
    $(".menu-item-has-children").prepend('<span class="btn-mostrar"><i class="fas fa-angle-down"></i></span>');

    // TOGGLE CLASS SOLO UNA VEZ AL PULSAR LA FLECHA
    $(document).on('click', '.btn-mostrar' , function(){
        $(this).parent().find(".sub-menu").toggleClass("mostrar").stopPropagation();
    });

    $(".btn-mostrar").click(function(){
        $(this).toggleClass("rotar");
    });

});