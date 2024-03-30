<?php

$name = $_POST['fullName'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// database connection

$conn = new mysqli('localhost', 'root', '', 'HSMQTQwpj247!', 'testing');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);    
}else{
    $stmt = $conn-> prepare("insert into registration(name, email, subject, message)
        values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    echo "registration Successfully...";
    $stmt->close();
    $conn->close();
}

// $mailheader = "From:".$name."<".$email.">\r\n";

// $recipient = "lehlohonolomonareng@yahoo.com";

// mail($recipient, $subject, $message, $mailheader) 
// or die("You have an error!. Please check the error and return to the page");

// echo'

// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta http=equiv="X-UA-Compatible" content="IE=edge">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Contact Form</title>
//     <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
//     <link rel= "stylesheet" href= "css/style.css"
// </head>
// <body>
//     <div class="container">
//         <h1>Thank you for contacting us. We will get back to you as soon as possible</h1>
//         <p class="back">Go back to the <a href="index.html">Homepage</a></p>
//     </div>
// </body>
// </html>

// '

?>