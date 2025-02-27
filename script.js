document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(document.getElementById("bookingForm"));

    fetch("send_booking.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("message").innerHTML = data;
    })
    .catch(error => console.error("Error:", error));
});