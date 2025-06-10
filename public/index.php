<?php

    require __DIR__ . "/../vendor/autoload.php";

    use App\Models\Contact;
    use App\Models\contactBook;

    $book = new contactBook(__DIR__ . "/../data/contacts.json");
    $contacts = $book->load();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $contact = new Contact($_POST["name"] ?? "", $_POST["email"] ?? "");
    
        if($contact->isValid()) {
            $contacts[] = $contact;
            $book->save(array_map(fn($c) => $c->toArray(), $contacts));
            $success = "Your contact has been added";
        } else {
            $error = "Please enter valid name and email";
        }
    }

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

    <?php if (!empty($success)) { echo "<p style='color:green'>$success</p>"; } ?>
    <?php if (!empty($error)) { echo "<p style='color:red'>$error</p>"; } ?>

    <form method="POST">
        <input name="name" placeholder="Your name.." required><br>
        <input name="email" type="email" placeholder="Your email.." required><br>
        <button type="submit">Submit</button>
    </form>

    <?php foreach($contacts as $c): ?>
        <li><?= htmlspecialchars($c->name) ?> (<?= htmlspecialchars("email") ?>)</li>
    <?php endforeach; ?>

</body>
</html>