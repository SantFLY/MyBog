const searchInput = document.getElementById("searchInput");
const cards = document.querySelectorAll(".card"); // Cambia ".card" al selector que uses para los elementos que deseas filtrar

searchInput.addEventListener("input", function () {
    const searchTerm = searchInput.value.toLowerCase();

    cards.forEach(card => {
        const content = card.querySelector(".card__content p").textContent.toLowerCase();
        const title = card.querySelector("h3").textContent.toLowerCase();

        if (title.includes(searchTerm) || content.includes(searchTerm)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});