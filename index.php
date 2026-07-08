<?php
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

$featured = $pdo->query('SELECT * FROM cars WHERE featured = 1 ORDER BY created_at DESC LIMIT 6')->fetchAll();

$pageTitle = 'AutoHub — Quality Cars in Kenya';
$active = 'home';
require __DIR__ . '/includes/header.php';
?>
  <header class="hero d-flex align-items-center text-white" id="home">
    <div class="container">
      <p class="hero-tag">Nairobi's Trusted Car Dealer</p>
      <h1 class="hero-title">Find Your Next Car<br>With Confidence</h1>
      <p class="hero-sub">Hand-picked, fully inspected vehicles at honest prices. Drive away happy.</p>
      <div class="d-flex gap-2 flex-wrap">
        <a href="inventory.php" class="btn btn-brand btn-lg">Browse Inventory</a>
        <a href="contact.php" class="btn btn-outline-light btn-lg">Talk to Us</a>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="text-center mb-5">
        <p class="section-tag">Handpicked</p>
        <h2 class="section-title">Featured Cars</h2>
      </div>
      <div class="row g-4">
        <?php foreach ($featured as $car): ?>
          <?php require __DIR__ . '/includes/car-card.php'; ?>
        <?php endforeach; ?>
      </div>
      <div class="text-center mt-5"><a href="inventory.php" class="btn btn-brand btn-lg">View All Cars</a></div>
    </div>
  </section>

  <section class="why-band">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-6 col-md-3"><i class="bi bi-patch-check"></i><h5>Inspected</h5><p>Every car checked by our mechanics.</p></div>
        <div class="col-6 col-md-3"><i class="bi bi-cash-coin"></i><h5>Fair Prices</h5><p>Honest, market-based pricing.</p></div>
        <div class="col-6 col-md-3"><i class="bi bi-file-earmark-text"></i><h5>Clean Papers</h5><p>Verified logbooks and records.</p></div>
        <div class="col-6 col-md-3"><i class="bi bi-headset"></i><h5>After Sales</h5><p>We are here long after you buy.</p></div>
      </div>
    </div>
  </section>

  <section class="cta-band">
    <div class="container">
      <h2>Ready to find your car?</h2>
      <p class="mb-4">Browse our full inventory or reach out and we will help you choose.</p>
      <a href="inventory.php" class="btn btn-lg">Browse Inventory</a>
    </div>
  </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
