<?php /* expects $car */ ?>
<div class="col-sm-6 col-lg-4">
  <div class="car-card h-100">
    <a href="car.php?id=<?= (int) $car['id'] ?>" class="car-thumb">
      <img src="images/<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?>" loading="lazy">
      <?php if (!empty($car['featured'])): ?><span class="badge-featured">Featured</span><?php endif; ?>
    </a>
    <div class="car-body">
      <span class="car-type"><?= htmlspecialchars($car['body_type']) ?></span>
      <h3 class="car-title"><a href="car.php?id=<?= (int) $car['id'] ?>"><?= htmlspecialchars($car['make'] . ' ' . $car['model']) ?></a></h3>
      <p class="car-price"><?= money($car['price']) ?></p>
      <ul class="car-specs">
        <li><i class="bi bi-calendar3"></i> <?= (int) $car['year'] ?></li>
        <li><i class="bi bi-speedometer2"></i> <?= km($car['mileage']) ?></li>
        <li><i class="bi bi-fuel-pump"></i> <?= htmlspecialchars($car['fuel']) ?></li>
        <li><i class="bi bi-gear"></i> <?= htmlspecialchars($car['transmission']) ?></li>
      </ul>
      <a href="car.php?id=<?= (int) $car['id'] ?>" class="btn btn-brand w-100">View Details</a>
    </div>
  </div>
</div>
