<?php
$page_title = "Contact | Habtamu Fekadu";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if ($name == "" || $email == "" || $message == "") {
    $error = "Please fill in all fields.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valid email address.";
} else {
        $file = fopen("messages.txt", "a");
        fwrite($file, "Name: " . $name . " | Email: " . $email . " | Message: " . $message . "\n");
        fclose($file);

      $success = "Thank you, " . htmlspecialchars($name) . ". Your message has been saved.";
    }
}

include 'includes/header.php';
?>

<section class="hero">
  <div class="hero-text">
    <h1>Contact Me</h1>
    <p>If you'd like to get in touch, send me a message using the form below. I'll reply as soon as I can.</p>
    <p>You can also reach me at: <strong>habtufekadu4@gmail.com</strong></p>
  </div>
</section>

<section class="contact-box">

  <?php
  if ($error != "") {
      echo "<p class='msg-error'>" . $error . "</p>";
  }
  if ($success != "") {
      echo "<p class='msg-success'>" . $success . "</p>";
  }
  ?>

  <form method="post" action="contact.php">
    <label>Name:</label>
    <input type="text" name="name">

    <label>Email:</label>
    <input type="email" name="email">

    <label>Message:</label>
    <textarea name="message" rows="5"></textarea>

    <button type="submit">Send Message</button>
  </form>

</section>

<?php include 'includes/footer.php'; ?>