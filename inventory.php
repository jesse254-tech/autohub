<?php
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

$makes = $pdo->query('SELECT DISTINCT make FROM cars ORDER BY make')->fetchAll(PDO::FETCH_COLUMN);
$types = $pdo->query('SELECT DISTINCT body_type FROM cars ORDER BY body_type')->fetchAll(PDO::FETCH_COLUMN);

$make = $_GET['make'] ?? '';
$type = $_GET['type'] ?? '';
$maxPrice = (int) ($_GET['max_price'] ?? 0);
$q = trim($_GET['q'] ?? '');

$where = [];
$params = [];
if ($make !== '') { $where[] = 'make = ?'; $params[] = $make; }
if ($type !== '') { $where[] = 'body_type = ?'; $params[] = $type; }
if ($maxPrice > 0) { $where[] = 'price <= ?'; $params[] = $maxPrice; }
if ($q !== '') { $where[] = '(make LIKE ? OR model LIKE ?)'; $params[] = "%$q%"; $params[] = "%$q%"; }
$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$stmt = $pdo->prepare("SELECT * FROM cars $whereSql ORDER BY featured DESC, created_at DESC");
$stmt->execute($params);
$cars = $stmt->fetchAll();

$pageTitle = 'Inventory — AutoHub';
$active = 'inventory';
require __DIR__ . '/includes/header.php';
?>
  <section class="page-top">
    <div class="container">
      <h1>Our Inventory</h1>
      <p class="crumb"><a href="index.php">Home</a> / Inventory</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <form class="filter-card" method="get" action="inventory.php">
        <div class="row g-3 align-items-end">
          <div class="col-md-3">
            <label>Make</label>
            <select name="make" class="form-select">
              <option value="">All makes</option>
              <?php foreach ($makes as $m): ?><option value="<?= htmlspecialchars($m) ?>" <?= $make === $m ? 'selected' : '' ?>><?= htmlspecialchars($m) ?></option><?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label>Body Type</label>
            <select name="type" class="form-select">
              <option value="">All types</option>
              <?php foreach ($types as $t): ?><option value="<?= htmlspecialchars($t) ?>" <?= $type === $t ? 'selected' : '' ?>><?= htmlspecialchars($t) ?></option><?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label>Max Price (KSh)</label>
            <input type="number" name="max_price" class="form-control" value="<?= $maxPrice > 0 ? $maxPrice : '' ?>" placeholder="Any" min="0" step="50000">
          </div>
          <div class="col-md-3">
            <label>Search</label>
            <input type="text" name="q" class="form-control" value="<?= htmlspecialchars($q) ?>" placeholder="e.g. Toyota">
          </div>
          <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-brand">Apply Filters</button>
            <a href="inventory.php" class="btn btn-outline-secondary">Reset</a>
          </div>
        </div>
      </form>

      <p class="text-muted mb-4"><?= count($cars) ?> car<?= count($cars) === 1 ? '' : 's' ?> found</p>

      <?php if (!$cars): ?>
        <div class="alert alert-light border">No cars match your filters. <a href="inventory.php">Clear filters</a>.</div>
      <?php else: ?>
        <div class="row g-4">
          <?php foreach ($cars as $car): ?>
            <?php require __DIR__ . '/includes/car-card.php'; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php require __DIR__ . '/includes/footer.php'; ?>
