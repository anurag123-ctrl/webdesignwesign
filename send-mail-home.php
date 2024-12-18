<?php
// Receiver email address
$to = "Mr.rajrahul1804@gmail.com";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = htmlspecialchars(strip_tags(trim($_POST["fullname"])));
    $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Validate required fields
    if (empty($name) || empty($phone) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Email subject and body
    $subject = "New Appointment Request from $name";
    $body = "
    <h2>Appointment Details</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Email:</strong> " . (!empty($email) ? $email : "Not provided") . "</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
