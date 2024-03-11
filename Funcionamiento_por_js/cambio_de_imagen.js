function cambiarImagen() {
    var imagen1 = document.getElementById("imagen1");
    var imagen2 = document.getElementById("imagen2");

    if (imagen1.style.display === "none") {
        imagen1.style.display = "inline";
        imagen2.style.display = "none";
    } else {
        imagen1.style.display = "none";
        imagen2.style.display = "inline";
    }
}