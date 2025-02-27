<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $surname = htmlspecialchars(trim($_POST["surname"]));
    $arrival = htmlspecialchars(trim($_POST["arrival"]));
    $departure = htmlspecialchars(trim($_POST["departure"]));
    $guests = intval($_POST["guests"]);
    $requests = htmlspecialchars(trim($_POST["requests"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));

    // Validate data
    if (strlen($name) < 2 || strlen($surname) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || $guests < 1) {
        die("Validation error! Please fill in all fields correctly.");
    }

    // Send email
    $to = "maksim4091838@gmail.com"; // Replace with your email address
    $subject = "New Booking Request from $name $surname";
    $body = "
        Name: $name $surname
        Arrival Date: $arrival
        Departure Date: $departure
        Number of Guests: $guests
        Special Requests: $requests
        Email: $email
        Phone: $phone
    ";
    $headers = "From: maksim4091838@gmail.com";

    if (mail($to, $subject, $body, $headers)) {
        echo "Booking confirmed! Your details have been sent to the admin.";
    } else {
        echo "Sorry, there was an error processing your booking.";
    }
} else {
    echo "Invalid request.";
}
?>
