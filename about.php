<?php
$pageTitle = 'About — AutoHub';
$active = 'about';
require __DIR__ . '/includes/header.php';
?>
  <section class="page-top">
    <div class="container">
      <h1>About AutoHub</h1>
      <p class="crumb"><a href="index.php">Home</a> / About</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6"><img src="images/about.jpg" class="img-fluid rounded-4 shadow" alt="AutoHub showroom"></div>
        <div class="col-lg-6">
          <p class="section-tag">Who We Are</p>
          <h2 class="section-title">Cars You Can Trust</h2>
          <p>AutoHub has helped Kenyan drivers find the right car since 2012. Every vehicle in our showroom is inspected, road-tested, and honestly priced.</p>
          <p>We believe buying a car should be simple and stress-free — no hidden fees, no pressure, just good cars and straight talk.</p>
          <div class="row text-center mt-4">
            <div class="col-4"><h3 class="fw-bold mb-0" style="color:var(--accent)">10+</h3><span class="text-muted">Years</span></div>
            <div class="col-4"><h3 class="fw-bold mb-0" style="color:var(--accent)">2,500+</h3><span class="text-muted">Cars Sold</span></div>
            <div class="col-4"><h3 class="fw-bold mb-0" style="color:var(--accent)">4.8★</h3><span class="text-muted">Rating</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
