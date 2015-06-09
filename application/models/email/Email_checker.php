<?php
require 'email_validator.php';
$email  = 'email@domain.com';
if(Email_Validador::validate($email))
    echo "Valid email address.";
else echo "Invalid email address.";
?>