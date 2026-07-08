<?php
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$stmt = $pdo->prepare('SELECT * FROM cars WHERE id = ?');
$stmt->execute([$id]);
$car = $stmt->fetch();
if (!$car) { header('Location: inventory.php'); exit; }

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

    if (!$errors) {
        $body = $message !== '' ? $message : 'Enquiry about the ' . $car['make'] . ' ' . $car['model'];
        $pdo->prepare('INSERT INTO enquiries (name, email, phone, message, car_id) VALUES (?, ?, ?, ?, ?)')
            ->execute([$name, $email, $phone, $body, $id]);
        $sent = true;
        $name = $email = $phone = $message = '';
    }
}

$pageTitle = $car['make'] . ' ' . $car['model'] . ' — AutoHub';
$active = 'inventory';
require __DIR__ . '/includes/header.php';
?>
  <section class="page-top">
    <div class="container">
      <h1><?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?></h1>
      <p class="crumb"><a href="index.php">Home</a> / <a href="inventory.php">Inventory</a> / <?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?></p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-7 detail-media">
          <img src="images/<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?>">
        </div>
        <div class="col-lg-5">
          <span class="car-type"><?= htmlspecialchars($car['body_type']) ?></span>
          <h2 class="mt-1"><?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?></h2>
          <p class="detail-price"><?= money($car['price']) ?></p>
          <table class="spec-table">
            <tr><th>Year</th><td><?= (int) $car['year'] ?></td></tr>
            <tr><th>Mileage</th><td><?= km($car['mileage']) ?></td></tr>
            <tr><th>Fuel</th><td><?= htmlspecialchars($car['fuel']) ?></td></tr>
            <tr><th>Transmission</th><td><?= htmlspecialchars($car['transmission']) ?></td></tr>
            <tr><th>Body Type</th><td><?= htmlspecialchars($car['body_type']) ?></td></tr>
          </table>
          <p><?= htmlspecialchars($car['description']) ?></p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-8">
          <h3 class="mb-3">Enquire About This Car</h3>
          <?php if ($sent): ?><div class="alert alert-success">Thank you! Your enquiry has been sent — our team will contact you shortly.</div><?php endif; ?>
          <?php if ($errors): ?><div class="alert alert-danger"><?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?></div><?php endif; ?>
          <form method="post" class="row g-3">
            <div class="col-md-4"><input type="text" name="name" class="form-control" placeholder="Name" value="<?= htmlspecialchars($name) ?>" required></div>
            <div class="col-md-4"><input type="email" name="email" class="form-control" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required></div>
            <div class="col-md-4"><input type="text" name="phone" class="form-control" placeholder="Phone" value="<?= htmlspecialchars($phone) ?>" required></div>
            <div class="col-12"><textarea name="message" class="form-control" rows="3" placeholder="Your message (optional)"><?= htmlspecialchars($message) ?></textarea></div>
            <div class="col-12"><button type="submit" class="btn btn-brand btn-lg">Send Enquiry</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
