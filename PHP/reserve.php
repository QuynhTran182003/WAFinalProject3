<?php
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $time = $_POST["time"];
    $numberPeople = $_POST["numberPeople"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    
    // echo $numberPeople;
    $subject = 'Confirmation of reservation';
    $message = " Dear $name $lastName, your reservation has been confirmed.
    \nSummary of reservation:
    \nName: $name $lastName
    \nNumber of people: $numberPeople
    \nDate & Time: $date  at $time
    \nWe are looking forward seeing you!
    \nBest regards, Shiba Team ";
    $headers = "From: quynhtran182003@gmail.com";
    
    // Send email
    if (mail($email, $subject, $message, $headers)) {
        header('location: ..\\HTML\\orderComplete.php');
    } else {
      echo "Failed to send email.";
    }

    