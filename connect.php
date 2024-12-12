<?php

    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // database connection

    $conn = new mysqli('localhost', 'root', '', 'HSMQTQwpj247!', 'inkanyezi-creatives');
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
?>