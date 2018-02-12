<?php

    //GET the form fields, remove html tags and white spaces.
$name = strip_tags(trim($_POST[name]));
$name = str_replace(array("\r","\n"),array(" ", " "),$name);
$email = filter_var(trim($_POST["message"]));

//check the data
if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: http://yelpcamp.tk/index.php?success=-1#form");
    exit;
}


//set the recipient email address. Update this to your desired mail 
$recipient = "ayan@yelpcamp.tk";

//set the new emil subject
$subject = "New Contact from $name";

///build the email content
$email_content = "Name: $name\n";
$email_content = "Email: $email\n\n";
$email_content = "Message: \n$message\n";

//Build the email headers
$email_headers = "From: $name <$email>";

//SEND the mail 
mail($recipient, $subject, $email_content, $email_headers);
    
    //redirect to the index.html page with success
    header("Location: http://yelpcamp.tk/index.php?success=1#form");



?>