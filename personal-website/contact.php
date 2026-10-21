<?php
$message_sent = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') {
        $errors[] = 'Name is required.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email is required.';
    }
    if ($message === '') {
        $errors[] = 'Message is required.';
    }

    if (empty($errors)) {
        $message_sent = true;
    }
}

include 'includes/header.php';
?>

<h1>Contact Me</h1>

<?php if ($message_sent): ?>
    <p class="success">Thank you, <?php echo htmlspecialchars($name); ?>. Your message has been received.</p>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="contact.php">
  <label>Name:</label>
  <input type="text" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>">

  <label>Email:</label>
  <input type="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">

  <label>Message:</label>
  <textarea name="message"><?php echo htmlspecialchars($message ?? ''); ?></textarea>

  <button type="submit">Send</button>
</form>

<?php include 'includes/footer.php'; ?>