// eventos
const formulario = document.querySelector('#formulario');
cargarEventListeners()
function cargarEventListeners() {
    document.addEventListener("DOMContentLoaded", () => {
        // clear()
        console.log("DOMContentLoaded")
        // productos.
    });
    
}
formulario.addEventListener('submit', clear);

// funciones
function clear(e) {
    e.preventDefault();
    // console.log("Limpiando")
    // console.log('<?php echo "Hola mundo"; ?>')
    // document.getElementById("productos").innerHTML = '';
    // return false;
}