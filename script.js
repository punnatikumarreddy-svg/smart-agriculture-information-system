function searchItems(inputId, cardClass) {
    let input = document.getElementById(inputId);
    let filter = input.value.toLowerCase();
    let cards = document.getElementsByClassName(cardClass);

    for (let i = 0; i < cards.length; i++) {
        let text = cards[i].innerText.toLowerCase();

        if (text.includes(filter)) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}

function showMessage(message) {
    alert(message);
}