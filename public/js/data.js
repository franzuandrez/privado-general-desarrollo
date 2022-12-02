$('#sendData').click(function(){
    var nombre = $('#nombre').val();
    var apellido = $('#apellido').val();
    var route = "http://localhost/becados/store";

    $.ajax({
        url: '/becados/store', 
        type: 'POST',
        dataType: 'json',
        data: {nombre: nombre, apellido: apellido}

    });
    
});