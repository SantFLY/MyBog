function validarFormulario() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorMensaje = document.getElementById("errorMensaje");

    if (password !== confirmPassword) {
        errorMensaje.style.display = "block";
        return false;
    }

    errorMensaje.style.display = "none";
    return true;
}

