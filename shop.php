<?php
require_once __DIR__ . '/includes/data.php';
$pageTitle = 'Cửa hàng';

$query = trim($_GET['q'] ?? '');
$category = $_GET['category'] ?? 'all';
$sort = $_GET['sort'] ?? '';
$onSale = isset($_GET['sale']);
$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 9;

$all = techora_filter_products(techora_products(), $query, $category, $sort);
if ($onSale) {
    $all = array_values(array_filter($all, fn ($p) => !empty($p['oldPrice'])));
}

$totalResults = count($all);
$totalPages = max(1, (int) ceil($totalResults / $perPage));
$page = min($page, $totalPages);
$pageItems = array_slice($all, ($page - 1) * $perPage, $perPage);

$categories = techora_categories();
$counts = [];
foreach ($categories as $slug => $label) {
    $counts[$slug] = count(array_filter(techora_products(), fn ($p) => $p['category'] === $slug));
}

$recommended = array_slice(techora_products(), -5);

function techora_query_with(array $overrides): string
{
    $base = $_GET;
    foreach ($overrides as $k => $v) {
        if ($v === null) {
            unset($base[$k]);
        } else {
            $base[$k] = $v;
        }
    }
    return '/shop.php?' . http_build_query($base);
}

require __DIR__ . '/includes/header.php';
?>

<section class="shop-hero">
  <h1>SHOP</h1>
  <div class="container shop-hero-content">
    <p>Cung cấp mọi thiết bị bạn cần</p>
    <form class="shop-search-box" action="/shop.php" method="get">
      <input type="text" name="q" placeholder="Tìm kiếm trên TECHORA..." value="<?= htmlspecialchars($query) ?>">
      <button type="submit">Tìm kiếm</button>
    </form>
  </div>
</section>

<div class="container">
  <div class="shop-layout">
    <aside class="filter-sidebar" id="filterSidebar">
      <div class="filter-card">
        <h4>Danh mục</h4>
        <a href="<?= techora_query_with(['category' => null, 'page' => null]) ?>" class="filter-option <?= $category === 'all' ? 'active-cat' : '' ?>">
          Tất cả sản phẩm <span class="filter-count"><?= count(techora_products()) ?></span>
        </a>
        <?php foreach ($categories as $slug => $label): ?>
          <a href="<?= techora_query_with(['category' => $slug, 'page' => null]) ?>" class="filter-option <?= $category === $slug ? 'active-cat' : '' ?>">
            <?= $label ?> <span class="filter-count"><?= $counts[$slug] ?></span>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="filter-card">
        <h4>Ưu đãi</h4>
        <a href="<?= techora_query_with(['sale' => $onSale ? null : 1, 'page' => null]) ?>" class="filter-option <?= $onSale ? 'active-cat' : '' ?>">
          🔥 Đang giảm giá
        </a>
      </div>

      <div class="filter-card">
        <h4>Đánh giá</h4>
        <label class="filter-option"><input type="checkbox" disabled checked> ★★★★★ trở lên</label>
        <label class="filter-option"><input type="checkbox" disabled> ★★★★ trở lên</label>
        <label class="filter-option"><input type="checkbox" disabled> ★★★ trở lên</label>
      </div>
    </aside>

    <div>
      <div class="shop-toolbar">
        <button class="btn btn-outline btn-sm filter-toggle-btn" id="filterToggle">Bộ lọc</button>
        <div class="result-count">
          <?php if ($query): ?>
            Kết quả cho “<?= htmlspecialchars($query) ?>”: <strong><?= $totalResults ?></strong> sản phẩm
          <?php else: ?>
            Hiển thị <strong><?= count($pageItems) ?></strong> trong <strong><?= $totalResults ?></strong> sản phẩm
          <?php endif; ?>
        </div>
        <form method="get" style="display:flex;gap:8px;">
          <?php foreach (['q' => $query, 'category' => $category] as $k => $v): if ($v && $v !== 'all'): ?>
            <input type="hidden" name="<?= $k ?>" value="<?= htmlspecialchars($v) ?>">
          <?php endif; endforeach; ?>
          <select name="sort" onchange="this.form.submit()">
            <option value="">Sắp xếp: Nổi bật</option>
            <option value="price-asc" <?= $sort === 'price-asc' ? 'selected' : '' ?>>Giá: Thấp đến cao</option>
            <option value="price-desc" <?= $sort === 'price-desc' ? 'selected' : '' ?>>Giá: Cao đến thấp</option>
            <option value="rating" <?= $sort === 'rating' ? 'selected' : '' ?>>Đánh giá cao nhất</option>
          </select>
        </form>
      </div>

      <?php if (empty($pageItems)): ?>
        <div class="empty-state">
          <h3>Không tìm thấy sản phẩm phù hợp</h3>
          <p>Hãy thử từ khoá khác hoặc bỏ bớt bộ lọc.</p>
          <a href="/shop.php" class="btn btn-primary" style="margin-top:16px;">Xem tất cả sản phẩm</a>
        </div>
      <?php else: ?>
        <div class="product-grid product-grid-3">
          <?php foreach ($pageItems as $p): include __DIR__ . '/includes/product-card.php'; endforeach; ?>
        </div>

        <?php if ($totalPages > 1): ?>
          <div class="pagination">
            <a href="<?= techora_query_with(['page' => max(1, $page - 1)]) ?>">‹</a>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <?php if ($i === $page): ?>
                <span class="active"><?= $i ?></span>
              <?php else: ?>
                <a href="<?= techora_query_with(['page' => $i]) ?>"><?= $i ?></a>
              <?php endif; ?>
            <?php endfor; ?>
            <a href="<?= techora_query_with(['page' => min($totalPages, $page + 1)]) ?>">›</a>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<section class="section section-alt">
  <div class="container">
    <div class="section-head">
      <div><span class="eyebrow">Gợi ý</span><h2>Khám phá đề xuất cho bạn</h2></div>
    </div>
    <div class="product-grid">
      <?php foreach (array_slice($recommended, 0, 4) as $p): include __DIR__ . '/includes/product-card.php'; endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="newsletter-banner">
      <div>
        <h3>Sẵn sàng nâng cấp thiết bị?</h3>
        <p>TECHORA đồng hành cùng công việc, học tập và những chuyến đi của bạn — với giải pháp công nghệ phù hợp nhất.</p>
      </div>
      <form class="newsletter-form">
        <input type="email" placeholder="Nhập email của bạn" required>
        <button type="submit" class="btn btn-primary">Gửi</button>
      </form>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
