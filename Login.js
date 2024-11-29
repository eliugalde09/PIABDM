function validateForm(event){

    event.preventDefault(); //desactivar submit de Login.php

    var usuario = document.getElementById("email").value;
    var pass = document.getElementById("password").value;


    if(usuario == "" || pass == ""){

        showError('Debe llenar todos los campos.');
        return false;
        
    } 

    event.target.submit(); //activar submit de Login.php
    return true;
}

function showError(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.innerHTML = message;

    // Hacer desaparecer el mensaje después de 5 segundos
    setTimeout(() => {
        errorMessage.innerHTML = '';
    }, 5000);
}