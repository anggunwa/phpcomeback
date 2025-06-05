<?php

require __DIR__ . "/../vendor/autoload.php";

session_start();

use App\Models\Contact;

// Get contacts from session
$contacts = $_SESSION["Contact"] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Form</h1>

    <h2>Saved Contact</h2>
    <ul>
        <?php
        
        foreach ($contacts as $contact) {
            echo $contact;
        }
        
        ?>
        
    </ul>
</body>
</html>