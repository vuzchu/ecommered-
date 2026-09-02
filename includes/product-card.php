<?php
/**
 * Renders one product card. Expects $p (product array) to be set before include.
 */
$img = techora_placeholder_image($p['bg'], $p['category'], $p['brand'], 500);
$catLabel = techora_categories()[$p['category']] ?? '';
?>
<article class="product-card">
  <a href="/product.php?id=<?= $p['id'] ?>" class="product-media">
    <?php if (!empty($p['badge'])): ?>
      <span class="badge <?= $p['badge'] === 'Sale' ? 'badge-sale' : 'badge-new' ?>"><?= $p['badge'] ?></span>
    <?php endif; ?>
    <img src="<?= $img ?>" alt="<?= htmlspecialchars($p['name']) ?>" loading="lazy">
  </a>
  <button class="product-wish" aria-label="Thêm vào yêu thích">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
  </button>
  <div class="product-body">
    <span class="product-cat"><?= $catLabel ?></span>
    <a href="/product.php?id=<?= $p['id'] ?>" class="product-name"><?= htmlspecialchars($p['name']) ?></a>
    <div class="rating-line">
      <span class="stars">★★★★★</span>
      <span><?= $p['rating'] ?> (<?= $p['reviews'] ?>)</span>
    </div>
    <div class="product-price-row">
      <span class="product-price"><?= techora_format_price($p['price']) ?></span>
      <?php if (!empty($p['oldPrice'])): ?>
        <span class="product-price-old"><?= techora_format_price($p['oldPrice']) ?></span>
      <?php endif; ?>
    </div>
    <div class="product-actions">
      <a href="/product.php?id=<?= $p['id'] ?>" class="btn btn-outline btn-sm">Xem thêm</a>
      <a href="/product.php?id=<?= $p['id'] ?>" class="btn btn-dark btn-sm">Mua ngay</a>
    </div>
  </div>
</article>
