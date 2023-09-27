function createSeats(seatAmount) {
    let createdSeats = 0;

    const parentDiv = document.getElementById("seats");

    while (createdSeats < seatAmount) {

        const newImg = document.createElement("img");
        newImg.src = "assets/img/seats/available-seat.png";
        newImg.setAttribute("onclick", 'changeImage(this)');

        parentDiv.appendChild(newImg);

        createdSeats++;
    }
}

function changeImage(image) {
    if (image.getAttribute('src') != "assets/img/seats/occupied-seat.png") {
        if (image.getAttribute("src") === "assets/img/seats/available-seat.png") {
            image.src = "assets/img/seats/selected-seat.png";
        }
        else if (image.getAttribute("src") === "assets/img/seats/selected-seat.png") {
            image.src = "assets/img/seats/available-seat.png";
        }
    }
}