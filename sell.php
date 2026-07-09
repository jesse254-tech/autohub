<?php
require __DIR__ . '/includes/db.php';

$sent = false;
$errors = [];
$name = $email = $phone = $vehicle = $price = $notes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $vehicle = trim($_POST['vehicle'] ?? '');
    $price   = trim($_POST['price'] ?? '');
    $notes   = trim($_POST['notes'] ?? '');

    if ($name === '') $errors[] = 'Please enter your name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if ($phone === '') $errors[] = 'Please enter your phone number.';
    if ($vehicle === '') $errors[] = 'Please tell us the car you want to sell.';

    if (!$errors) {
        $message = "Car for sale: $vehicle";
        if ($price !== '') $message .= " | Asking price: KSh $price";
        if ($notes !== '') $message .= " | Notes: $notes";
        $pdo->prepare('INSERT INTO enquiries (name, email, phone, message, car_id) VALUES (?, ?, ?, ?, NULL)')
            ->execute([$name, $email, $phone, $message]);
        $sent = true;
        $name = $email = $phone = $vehicle = $price = $notes = '';
    }
}

$pageTitle = 'Sell Your Car — AutoHub';
$active = 'sell';
require __DIR__ . '/includes/header.php';
?>
  <section class="page-top">
    <div class="container">
      <h1>Sell Your Car</h1>
      <p class="crumb"><a href="index.php">Home</a> / Sell Your Car</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-5">
          <p class="section-tag">Fast &amp; Fair</p>
          <h2 class="section-title">Get a Free Valuation</h2>
          <p>Tell us about your car and our team will get back to you with a fair, no-obligation offer. We handle the paperwork and pay promptly.</p>
          <ul class="info-list mt-4">
            <li><i class="bi bi-cash-stack"></i> Competitive, honest offers</li>
            <li><i class="bi bi-lightning-charge"></i> Quick response within 24 hours</li>
            <li><i class="bi bi-file-earmark-check"></i> We handle the transfer</li>
          </ul>
        </div>
        <div class="col-lg-7">
          <?php if ($sent): ?><div class="alert alert-success">Thank you! We've received your details and will contact you with a valuation shortly.</div><?php endif; ?>
          <?php if ($errors): ?><div class="alert alert-danger"><?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?></div><?php endif; ?>
          <form method="post" class="sell-form row g-3">
            <div class="col-md-6"><input type="text" name="name" class="form-control form-control-lg" placeholder="Your Name" value="<?= htmlspecialchars($name) ?>" required></div>
            <div class="col-md-6"><input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required></div>
            <div class="col-md-6"><input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone" value="<?= htmlspecialchars($phone) ?>" required></div>
            <div class="col-md-6"><input type="text" name="vehicle" class="form-control form-control-lg" placeholder="Car (e.g. Toyota Axio 2018)" value="<?= htmlspecialchars($vehicle) ?>" required></div>
            <div class="col-12"><input type="text" name="price" class="form-control" placeholder="Asking price in KSh (optional)" value="<?= htmlspecialchars($price) ?>"></div>
            <div class="col-12"><textarea name="notes" class="form-control" rows="4" placeholder="Anything else we should know? (mileage, condition, etc.)"><?= htmlspecialchars($notes) ?></textarea></div>
            <div class="col-12"><button type="submit" class="btn btn-brand btn-lg">Request Valuation</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
