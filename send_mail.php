<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : "Not provided";
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : "No message";

    // Your email where you want to receive messages
    // $to = "Mr.rajrahul1804@gmail.com";
    $to = "kashyapanuuuuu@gmail.com";
    $subject = "New Contact Form Submission";

    // Email Content
    $email_content = "
    <html>
        <head>
            <title>Contact Form Details</title>
        </head>
        <body>
            <h2>New Contact Form Submission</h2>
            <table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%;'>
                <tr>
                    <th>Name</th>
                    <td>$name</td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>$mobile</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>$email</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>$message</td>
                </tr>
            </table>
        </body>
    </html>
    ";

    // Email Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Send Email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    echo "Invalid Request!";
}
?>
