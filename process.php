<?php
// set timezone
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit-contact'])) {
    // get the inputs
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    // split the email into 2 parts
    $splitted_email = explode('@', $email);

    // get the email username (index 0)
    $username = $splitted_email[0];

    // save the contact submission in a text file
    $filename = 'contact-submissions/' . date('Y-m-d-H-i-s', time()) . '-' . $username . '.txt';
    $file = fopen($filename, 'w');
    fwrite($file, "Date and Time: " . date('F d, Y @ h:i:s A', time()) . "\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage: $message\n\n");
    fclose($file);

    // redirect to thankyou page
    header('location: thankyou.html');
}

else {
    header('location: contact.html');
}