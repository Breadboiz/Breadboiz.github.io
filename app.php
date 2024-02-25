<?php
    error_reporting(0);
    // echo "This message is sent from PHP file";
    
    $name = $_POST['name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $website = $_POST['website'];
    $message = $_POST['message'];
    if(!empty($email) && !empty($message)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $receiver = "khanhhuynh3508@gmail.com";
            $subject = "From :<$name>";
            $body = "Name: $name\nEmail: $email\nPhone number: $phone_number\nWebsite: $website\nMessage: $message";
            $sender = "From: $email";
            if(mail($receiver, $subject, $body, $sender))
            {
                echo "Your message has been sent";
            }
            else{
                echo "Sorry, failed to send your message!!!";
            }
        }
        else{
            echo "Please enter a valid address";
        }
    }
    else{
        echo "Email and message field is required";
    }
?>