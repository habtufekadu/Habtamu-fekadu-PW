<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if ($name == "" || $email == "" || $message == "") {
        $error = "Please fill in all fields.";
    } else {
        $file = fopen("messages.txt", "a");
        fwrite($file, "Name: " . $name . " | Email: " . $email . " | Message: " . $message . "\n");
        fclose($file);

        $success = "Thank you, " . $name . ". Your message has been saved.";
    }
}

include 'includes/header.php';
?>

<h1>Contact Me</h1>

<?php
if ($error != "") {
    echo "<p style='color:red;'>" . $error . "</p>";
}
if ($success != "") {
    echo "<p style='color:green;'>" . $success . "</p>";
}
?>

<form method="post" action="contact.php">
  <label>Name:</label>
  <input type="text" name="name">

  <label>Email:</label>
  <input type="email" name="email">

  <label>Message:</label>
  <textarea name="message"></textarea>

  <button type="submit">Send</button>
</form>

<?php include 'includes/footer.php'; ?>