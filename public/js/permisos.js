function isMenuCollapsed(btnMenu){

    let menu = btnMenu.className.split(' ');

    return menu.length>3;

}
function habilitarOpciones(element){

    //console.log(element.checked);
    let idMenu = element.id.split('-');
    let btnMenu = getBtnMenu(idMenu);

    let isCollapsed = isMenuCollapsed(btnMenu);
    let divOpciones = getDivOpciones(idMenu);


    if(element.checked){
        btnMenu.disabled=false;
    }else{
        clearOpciones(divOpciones);
        divOpciones.style.height="";
        divOpciones.classList.remove('in');
        btnMenu.disabled = true;
    }

}



function getBtnMenu(idMenu){

    return document.getElementById('btn-'+idMenu[1]);
}
function getDivOpciones(idMenu){
    let opciones= document.getElementById('opciones-'+idMenu[1]);
    return opciones;

}

function clearOpciones(divOpciones){

    let opcionesObj = document.querySelectorAll('#'+divOpciones.id+' input');
    var opcionesArray = Object.keys(opcionesObj).map(function(key) {
        return [Number(key), opcionesObj[key]];
    });

    opcionesArray.forEach(function(elemento){


        elemento[1].checked=false;


    })


}
