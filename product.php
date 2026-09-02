<?php
require_once __DIR__ . '/includes/data.php';

$id = (int) ($_GET['id'] ?? 0);
$p = techora_find_product($id);
if (!$p) {
    http_response_code(404);
    $pageTitle = 'Không tìm thấy sản phẩm';
    require __DIR__ . '/includes/header.php';
    echo '<div class="container"><div class="empty-state"><h3>Không tìm thấy sản phẩm</h3><p>Sản phẩm bạn tìm không tồn tại hoặc đã bị gỡ.</p><a href="/shop.php" class="btn btn-primary" style="margin-top:16px;">Quay lại cửa hàng</a></div></div>';
    require __DIR__ . '/includes/footer.php';
    exit;
}

$pageTitle = $p['name'];
$catLabel = techora_categories()[$p['category']] ?? '';
$related = techora_related_products($p, 5);
$discount = !empty($p['oldPrice']) ? round((1 - $p['price'] / $p['oldPrice']) * 100) : 0;
$saved = !empty($p['oldPrice']) ? $p['oldPrice'] - $p['price'] : 0;

$mainImg = techora_placeholder_image($p['bg'], $p['category'], $p['brand'], 700);
$thumbImgs = [];
$tints = [$p['bg'], 'F1F5F9', 'E7EEFE', 'F8FAFC'];
foreach ($tints as $tint) {
    $thumbImgs[] = techora_placeholder_image($tint, $p['category'], $p['brand'], 300);
}

require __DIR__ . '/includes/header.php';
?>

<div class="container">
  <div class="breadcrumb">
    <a href="/index.php">Trang chủ</a><span>/</span>
    <a href="/shop.php">Cửa hàng</a><span>/</span>
    <a href="/shop.php?category=<?= $p['category'] ?>"><?= $catLabel ?></a><span>/</span>
    <?= htmlspecialchars($p['name']) ?>
  </div>

  <div class="pd-grid">
    <div data-gallery>
      <div class="pd-gallery-main">
        <?php if ($discount > 0): ?><span class="badge badge-sale" style="position:absolute;top:14px;left:14px;">-<?= $discount ?>%</span><?php endif; ?>
        <img src="<?= $mainImg ?>" alt="<?= htmlspecialchars($p['name']) ?>">
        <span class="pd-zoom"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></span>
      </div>
      <div class="pd-thumbs">
        <?php foreach ($thumbImgs as $i => $thumb): ?>
          <div class="pd-thumb <?= $i === 0 ? 'active' : '' ?>"><img src="<?= $thumb ?>" alt="Ảnh sản phẩm <?= $i + 1 ?>"></div>
        <?php endforeach; ?>
      </div>
    </div>

    <div>
      <span class="pd-brand"><?= htmlspecialchars($p['brand']) ?></span>
      <h1 class="pd-title"><?= htmlspecialchars($p['name']) ?></h1>
      <div class="pd-rating">
        <span class="stars">★★★★★</span>
        <span><?= $p['rating'] ?></span>
        <a href="#reviews">(<?= $p['reviews'] ?> đánh giá)</a>
      </div>

      <div class="pd-price-row">
        <span class="pd-price"><?= techora_format_price($p['price']) ?></span>
        <?php if (!empty($p['oldPrice'])): ?>
          <span class="pd-price-old"><?= techora_format_price($p['oldPrice']) ?></span>
        <?php endif; ?>
      </div>
      <?php if ($saved > 0): ?>
        <div class="pd-save">Bạn tiết kiệm <?= techora_format_price($saved) ?> (<?= $discount ?>%)</div>
      <?php endif; ?>

      <div class="pd-option">
        <span class="pd-option-label">Màu sắc</span>
        <div class="swatches">
          <?php foreach ($p['colors'] as $i => $color): ?>
            <span class="swatch <?= $i === 0 ? 'active' : '' ?>" style="background:<?= $color ?>" title="Màu <?= $i + 1 ?>"></span>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="pd-option">
        <span class="pd-option-label">Số lượng</span>
        <div class="qty-stepper">
          <button type="button" data-step="down" aria-label="Giảm">−</button>
          <input type="text" value="1" min="1" max="10" readonly>
          <button type="button" data-step="up" aria-label="Tăng">+</button>
        </div>
      </div>

      <div class="pd-actions">
        <button class="btn btn-primary" type="button">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg>
          Thêm vào giỏ
        </button>
        <button class="btn-icon js-wishlist" type="button" aria-label="Yêu thích">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
        </button>
      </div>
      <button class="btn btn-dark btn-block pd-buy-now" type="button">Mua ngay</button>

      <div class="pd-delivery">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
        <?= $p['stock'] ? 'Còn hàng — Giao dự kiến ' . date('d/m', strtotime('+2 day')) . ' - ' . date('d/m', strtotime('+5 day')) : 'Tạm hết hàng' ?>
      </div>
    </div>
  </div>

  <section class="trust-strip" style="border-radius:var(--radius-md);border:1px solid var(--slate-200);margin-bottom:48px;">
    <div class="container" style="padding:22px 24px;">
      <div class="trust-item">
        <span class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7V8Z"/><circle cx="5.5" cy="18.5" r="1.5"/><circle cx="18.5" cy="18.5" r="1.5"/></svg></span>
        <div><strong>Miễn phí vận chuyển</strong><span>Cho mọi đơn hàng</span></div>
      </div>
      <div class="trust-item">
        <span class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 12a9 9 0 1 1-3.5-7.1"/><path d="M21 3v6h-6"/></svg></span>
        <div><strong>Đổi trả dễ dàng</strong><span>Trong vòng 30 ngày</span></div>
      </div>
      <div class="trust-item">
        <span class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2 4 5v6c0 5 3.4 8.7 8 11 4.6-2.3 8-6 8-11V5Z"/></svg></span>
        <div><strong>Thanh toán an toàn</strong><span>Bảo mật 100%</span></div>
      </div>
      <div class="trust-item">
        <span class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>
        <div><strong>Hỗ trợ trực tuyến</strong><span>Sẵn sàng 24/7</span></div>
      </div>
    </div>
  </section>

  <section class="pd-columns" style="margin-bottom:56px;" id="reviews">
    <div class="info-card">
      <h3>Mô tả sản phẩm</h3>
      <p><?= htmlspecialchars($p['description']) ?></p>
      <ul class="feature-list">
        <?php foreach ($p['features'] as $f): ?>
          <li><?= htmlspecialchars($f) ?></li>
        <?php endforeach; ?>
      </ul>

      <div class="accordion" style="margin-top:8px;">
        <div class="accordion-item">
          <button class="accordion-trigger">Thông số kỹ thuật <span class="chevron">+</span></button>
          <div class="accordion-panel"><div class="accordion-panel-inner">
            Thương hiệu: <?= htmlspecialchars($p['brand']) ?><br>
            Danh mục: <?= $catLabel ?><br>
            Bảo hành: 12 tháng chính hãng
          </div></div>
        </div>
        <div class="accordion-item">
          <button class="accordion-trigger">Trong hộp có gì <span class="chevron">+</span></button>
          <div class="accordion-panel"><div class="accordion-panel-inner">
            1x <?= htmlspecialchars($p['name']) ?>, cáp sạc/kết nối, sách hướng dẫn sử dụng, thẻ bảo hành.
          </div></div>
        </div>
      </div>
    </div>

    <div class="info-card">
      <h3>Đánh giá khách hàng</h3>
      <div class="rating-summary">
        <div class="big"><?= $p['rating'] ?> ★</div>
        <div>Dựa trên <?= $p['reviews'] ?> đánh giá</div>
        <div class="rating-bars">
          <?php
          $dist = [5 => 88, 4 => 6, 3 => 1, 2 => 0, 1 => 0];
          foreach ($dist as $star => $pct):
          ?>
            <div class="rating-bar-row">
              <span><?= $star ?> ★</span>
              <span class="rating-bar-track"><span class="rating-bar-fill" style="width:<?= $pct ?>%"></span></span>
              <span><?= $pct ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="review-item">
        <span class="stars">★★★★★</span>
        <p>Chất lượng âm thanh tuyệt vời, đúng như mô tả!</p>
        <div class="author">John D. <span class="verified">✓ Đã mua hàng</span></div>
      </div>
      <div class="review-item">
        <span class="stars">★★★★★</span>
        <p>Rất thoải mái khi đeo lâu, không bị mỏi tai.</p>
        <div class="author">Sarah M. <span class="verified">✓ Đã mua hàng</span></div>
      </div>
      <div class="review-item">
        <span class="stars">★★★★★</span>
        <p>Đáng đồng tiền, sản phẩm tốt nhất tôi từng dùng. Rất đáng để mua.</p>
        <div class="author">Michael T. <span class="verified">✓ Đã mua hàng</span></div>
      </div>
      <button class="btn btn-outline btn-block btn-sm">Xem tất cả đánh giá</button>
    </div>

    <div class="info-card">
      <h3>Câu hỏi thường gặp</h3>
      <div class="accordion">
        <div class="accordion-item open">
          <button class="accordion-trigger">Khả năng chống ồn thế nào? <span class="chevron">+</span></button>
          <div class="accordion-panel"><div class="accordion-panel-inner">Sản phẩm sử dụng công nghệ chống ồn chủ động hàng đầu, giảm tiếng ồn nền và âm thanh xung quanh hiệu quả.</div></div>
        </div>
        <div class="accordion-item">
          <button class="accordion-trigger">Thời lượng pin bao lâu? <span class="chevron">+</span></button>
          <div class="accordion-panel"><div class="accordion-panel-inner">Tuỳ sản phẩm, thời lượng pin dao động 20–40 giờ sử dụng liên tục, xem chi tiết ở phần thông số kỹ thuật.</div></div>
        </div>
        <div class="accordion-item">
          <button class="accordion-trigger">Có thể dùng khi đang sạc không? <span class="chevron">+</span></button>
          <div class="accordion-panel"><div class="accordion-panel-inner">Có, bạn hoàn toàn có thể vừa sạc vừa sử dụng bình thường.</div></div>
        </div>
        <div class="accordion-item">
          <button class="accordion-trigger">Có hỗ trợ trợ lý giọng nói không? <span class="chevron">+</span></button>
          <div class="accordion-panel"><div class="accordion-panel-inner">Sản phẩm hỗ trợ tương tác với các trợ lý giọng nói phổ biến trên điện thoại của bạn.</div></div>
        </div>
      </div>
      <button class="btn btn-outline btn-block btn-sm" style="margin-top:14px;">Xem tất cả câu hỏi</button>
    </div>
  </section>

  <section class="section" style="padding-top:0;">
    <div class="section-head">
      <div><span class="eyebrow">Có thể bạn thích</span><h2>Sản phẩm liên quan</h2></div>
    </div>
    <div class="product-grid">
      <?php foreach ($related as $p): include __DIR__ . '/includes/product-card.php'; endforeach; ?>
    </div>
  </section>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
