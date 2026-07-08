<?php
require __DIR__ . '/includes/db.php';

$sent = false;
$errors = [];
$name = $email = $phone = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') $errors[] = 'Please enter your name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if ($phone === '') $errors[] = 'Please enter your phone number.';
    if ($message === '') $errors[] = 'Please enter a message.';

    if (!$errors) {
        $pdo->prepare('INSERT INTO enquiries (name, email, phone, message, car_id) VALUES (?, ?, ?, ?, NULL)')
            ->execute([$name, $email, $phone, $message]);
        $sent = true;
        $name = $email = $phone = $message = '';
    }
}

$pageTitle = 'Contact — AutoHub';
$active = 'contact';
require __DIR__ . '/includes/header.php';
?>
  <section class="page-top">
    <div class="container">
      <h1>Contact Us</h1>
      <p class="crumb"><a href="index.php">Home</a> / Contact</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-5">
          <p class="section-tag">Visit or Call</p>
          <h2 class="section-title">We'd Love to Help</h2>
          <p>Have a question about a car or want to book a viewing? Reach out and our team will get back to you.</p>
          <ul class="info-list mt-4">
            <li><i class="bi bi-geo-alt-fill"></i> Kiambu Road, Nairobi</li>
            <li><i class="bi bi-telephone-fill"></i> +254 700 000 000</li>
            <li><i class="bi bi-envelope-fill"></i> sales@autohub.co.ke</li>
            <li><i class="bi bi-clock-fill"></i> Mon – Sat: 8:00 – 18:00</li>
          </ul>
        </div>
        <div class="col-lg-7">
          <?php if ($sent): ?><div class="alert alert-success">Thank you! Your message has been received — we'll be in touch shortly.</div><?php endif; ?>
          <?php if ($errors): ?><div class="alert alert-danger"><?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?></div><?php endif; ?>
          <form method="post" class="row g-3">
            <div class="col-md-6"><input type="text" name="name" class="form-control form-control-lg" placeholder="Name" value="<?= htmlspecialchars($name) ?>" required></div>
            <div class="col-md-6"><input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required></div>
            <div class="col-12"><input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone" value="<?= htmlspecialchars($phone) ?>" required></div>
            <div class="col-12"><textarea name="message" class="form-control" rows="5" placeholder="Your message" required><?= htmlspecialchars($message) ?></textarea></div>
            <div class="col-12"><button type="submit" class="btn btn-brand btn-lg">Send Message</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
