<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $comments = "";
     
    if(isset($_POST['name'])) {
        $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

     
    if(isset($_POST['comments'])) {
        $visitor_message = htmlspecialchars($_POST['comments']);
    }
     
    if($email == "") {
        $recipient = "luxewindowscreens@gmail.com";
    }
    else if($concerned_department == "marketing") {
        $recipient = "marketing@domain.com";
    }
    else if($concerned_department == "technical support") {
        $recipient = "tech.support@domain.com";
    }
    else {
        $recipient = "contact@domain.com";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($recipient, $comments, $headers)) {
        echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>