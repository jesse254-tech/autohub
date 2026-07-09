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

  <section class="section bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <p class="section-tag">Happy Drivers</p>
        <h2 class="section-title">What Our Customers Say</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-4"><div class="testi-card"><p>"Smooth, honest process from start to finish. I drove away the same day in a great car."</p><div class="testi-who"><strong>Kevin M.</strong><span>Nairobi</span></div></div></div>
        <div class="col-md-4"><div class="testi-card"><p>"They let me take my time and answered every question. No pressure at all — just good service."</p><div class="testi-who"><strong>Faith W.</strong><span>Thika</span></div></div></div>
        <div class="col-md-4"><div class="testi-card"><p>"The car was exactly as described and the papers were clean. I'd happily buy from them again."</p><div class="testi-who"><strong>Samuel K.</strong><span>Nakuru</span></div></div></div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="text-center mb-5">
        <p class="section-tag">Good to Know</p>
        <h2 class="section-title">Frequently Asked Questions</h2>
      </div>
      <div class="accordion faq-acc" id="faqAcc">
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Do you offer financing?</button></h2>
          <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAcc"><div class="accordion-body">Yes. We work with several banks and SACCOs and can help you arrange asset finance with flexible repayment terms.</div></div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Are the cars inspected?</button></h2>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAcc"><div class="accordion-body">Every vehicle is checked by our mechanics and road-tested before it reaches the showroom floor.</div></div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Can I trade in my current car?</button></h2>
          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAcc"><div class="accordion-body">Absolutely. Bring your car in for a free valuation and we'll offset it against your next purchase.</div></div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">Do you help with logbook transfer?</button></h2>
          <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAcc"><div class="accordion-body">Yes. Our team handles the full NTSA transfer process so your ownership is sorted before you drive off.</div></div>
        </div>
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
