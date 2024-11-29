function validateForm(event) {

    event.preventDefault();

    //const profilePic = document.getElementById('profile-pic');
    const fullName = document.getElementById('fullName').value.trim();
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const birthdate = document.getElementById('dob').value;
    const gender = document.getElementById('genero').value;
    const role = document.getElementById('role').value;
    const errorMessage = document.getElementById('error-message');

    errorMessage.innerHTML = '';

    // Validar campos vacíos
    /*if (!profilePic.files[0]) {
        showError('Debe seleccionar una foto de perfil.');
        return false;
    }*/
    if (!fullName) {
        showError('El nombre completo no puede estar vacío.');
        return false;
    }
    if (!username) {
        showError('El nombre de usuario no puede estar vacío.');
        return false;
    }
    if (!email) {
        showError('El email no puede estar vacío.');
        return false;
    }
    if (!password) {
        showError('La contraseña no puede estar vacía.');
        return false;
    }
    if (!birthdate) {
        showError('La fecha de nacimiento no puede estar vacía.');
        return false;
    }
    if (!gender) {
        showError('Debe seleccionar un género.');
        return false;
    }
    if (!role) {
        showError('Debe seleccionar un rol.');
        return false;
    }

    //Validar imagen
    /*function validateForm(event) {
        const fileInput = document.getElementById('profile-pic');
        const errorMessage = document.getElementById('error-message');
        const filePath = fileInput.value;
    
        // Extensiones permitidas
        const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    
        if (!allowedExtensions.exec(filePath)) {
            errorMessage.innerText = 'Por favor, carga una imagen en formato .jpg o .png.';
            fileInput.value = ''; 
            event.preventDefault(); 
            return false;
        } else {
            errorMessage.innerText = ''; 
        }
        
        return true; 
    }*/
    

    // Validar nombre completo (solo letras)
    const namePattern = /^[a-zA-Z\s]+$/;
    if (!namePattern.test(fullName)) {
        showError('El nombre completo solo puede contener letras.');
        return false;
    }

    // Validar email
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        showError('El email no es válido.');
        return false;
    }

    // Validar contraseña (al menos 8 caracteres, una mayúscula, un número y un carácter especial)
    const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
    if (!passwordPattern.test(password)) {
        showError('La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.');
        return false;
    }

    // Validar fecha de nacimiento (no puede ser futura)
    const today = new Date();
    const birthDate = new Date(birthdate);
    if (birthDate > today) {
        showError('La fecha de nacimiento no puede ser en el futuro.');
        return false;
    }

    

    /*alert('Registro exitoso');
    window.location.href = 'Principal.php';*/
    event.target.submit();
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
