const searchInput = document.getElementById("searchInput");
const searchResult = document.getElementById("searchResult");

const searchTerms = {
    "Mundo Aventura": "mundo_aventura.php",
    "Calendario": "calendario.php",
    "Parque Central Bavaria": "./mouse/parquecentral.php",
    // Agrega más términos de búsqueda y enlaces aquí si es necesario
};

searchInput.addEventListener("input", function () {
    const searchTerm = searchInput.value.trim();
    searchResult.innerHTML = ''; // Limpia el contenido anterior

    if (searchTerm) {
        let index = 0; // Variable para llevar un seguimiento de los resultados
        for (const term in searchTerms) {
            if (term.toLowerCase().includes(searchTerm.toLowerCase())) {
                const listItem = document.createElement("li");
                const link = document.createElement("a");
                link.href = searchTerms[term];
                link.textContent = term;
                listItem.appendChild(link);

                // Aplica estilos intercalados a los resultados
                if (index % 2 === 0) {
                    listItem.classList.add("fondo-amarillo");
                } else {
                    listItem.classList.add("fondo-rojo");
                }

                // Agrega estilos generales para los resultados
                listItem.classList.add("resultado");

                searchResult.appendChild(listItem);
                index++;
                
                // Agrega un separador (por ejemplo, una línea horizontal) después de cada resultado
                const separator = document.createElement("hr");
                separator.style.height = "0px"; // Ajusta la altura del hr
                separator.style.margin = "0px";
                searchResult.appendChild(separator);
            }
        }
    }
});
