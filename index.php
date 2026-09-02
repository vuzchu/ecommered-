<?php
require_once __DIR__ . '/includes/data.php';
$pageTitle = 'Trang chủ';
$products = techora_products();
$featured = array_slice($products, 0, 4);
$newArrivals = array_values(array_filter($products, fn($p) => $p['badge'] === 'Mới'));
$newArrivals = array_slice($newArrivals, 0, 4);
$categoryIcons = techora_category_icons();

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container">
    <div class="hero-inner">
      <div>
        <span class="hero-eyebrow">⚡ Bộ sưu tập 2026</span>
        <h1>Nâng tầm <span>công nghệ</span><br>mỗi ngày của bạn</h1>
        <p>Tai nghe, đồng hồ thông minh, bàn phím cơ và phụ kiện chính hãng — chọn lọc cho công việc, giải trí và cuộc sống di chuyển.</p>
        <div class="hero-cta">
          <a href="/shop.php" class="btn btn-primary">Khám phá cửa hàng</a>
          <a href="/shop.php?sale=1" class="btn btn-outline-light">Xem ưu đãi</a>
        </div>
        <div class="hero-meta">
          <div class="avatar-stack">
            <span></span><span></span><span></span><span></span>
          </div>
          <div class="hero-meta-text">
            <strong>25.000+ khách hàng</strong>
            ★★★★★ 4.9/5 (2.5k đánh giá)
          </div>
        </div>
      </div>
      <div class="hero-art">
        <div class="hero-art-frame">
          <div class="device-tile-grid">
            <?php $tileCats = ['tai-nghe', 'dong-ho', 'ban-phim', 'loa']; ?>
            <?php foreach ($tileCats as $i => $cat): ?>
              <div class="device-tile">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><?= $categoryIcons[$cat] ?></svg>
                <span><?= $categories[$cat] ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="hero-badge"><strong>-50%</strong><span>Giảm đến</span></div>
      </div>
    </div>
  </div>
</section>

<section class="trust-strip">
  <div class="container">
    <div class="trust-item">
      <span class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7V8Z"/><circle cx="5.5" cy="18.5" r="1.5"/><circle cx="18.5" cy="18.5" r="1.5"/></svg></span>
      <div><strong>Miễn phí vận chuyển</strong><span>Cho đơn hàng từ 990k</span></div>
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
      <div><strong>Hỗ trợ 24/7</strong><span>Luôn sẵn sàng giúp bạn</span></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div><span class="eyebrow">Danh mục</span><h2>Mua sắm theo nhu cầu</h2></div>
      <a href="/shop.php" class="link-arrow">Xem tất cả danh mục</a>
    </div>
    <div class="category-grid">
      <?php foreach ($categories as $slug => $label): ?>
        <a href="/shop.php?category=<?= $slug ?>" class="category-card">
          <span class="category-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><?= $categoryIcons[$slug] ?></svg></span>
          <strong><?= $label ?></strong>
          <span>Khám phá</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head">
      <div><span class="eyebrow">Nổi bật</span><h2>Sản phẩm được yêu thích</h2></div>
      <a href="/shop.php" class="link-arrow">Xem tất cả sản phẩm</a>
    </div>
    <div class="product-grid">
      <?php foreach ($featured as $p): include __DIR__ . '/includes/product-card.php'; endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="flash-banner">
      <div class="flash-left">
        <span class="flash-tag">⚡ Flash Sale</span>
        <h3>Giảm đến 70% phụ kiện công nghệ</h3>
        <p>Ưu đãi có hạn cho các sản phẩm phụ kiện chọn lọc.</p>
        <div class="countdown" data-hours="50">
          <div><strong>02</strong><span>Ngày</span></div>
          <div><strong>14</strong><span>Giờ</span></div>
          <div><strong>36</strong><span>Phút</span></div>
          <div><strong>22</strong><span>Giây</span></div>
        </div>
      </div>
      <div class="flash-right">
        <a href="/shop.php?sale=1" class="btn btn-primary">Mua ngay</a>
        <div class="flash-percent"><strong>-70%</strong><span>OFF</span></div>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head">
      <div><span class="eyebrow">Bộ sưu tập</span><h2>Được chọn lọc dành cho bạn</h2></div>
      <a href="/shop.php" class="link-arrow">Xem tất cả bộ sưu tập</a>
    </div>
    <div class="collection-grid">
      <a href="/shop.php?category=tai-nghe" class="collection-card tone-a">
        <svg class="collection-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><?= $categoryIcons['tai-nghe'] ?></svg>
        <div class="collection-body">
          <h3>Thiết bị âm thanh</h3>
          <p>Tai nghe, loa và thiết bị âm thanh cho cuộc sống hiện đại</p>
          <span class="btn btn-outline-light btn-sm">Khám phá ngay</span>
        </div>
      </a>
      <a href="/shop.php?category=balo" class="collection-card tone-b">
        <svg class="collection-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><?= $categoryIcons['balo'] ?></svg>
        <div class="collection-body">
          <h3>Phụ kiện di chuyển</h3>
          <p>Sẵn sàng cho mọi chuyến đi, mọi hành trình</p>
          <span class="btn btn-outline-light btn-sm">Khám phá ngay</span>
        </div>
      </a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div><span class="eyebrow">Mới về</span><h2>Hàng mới cập bến</h2></div>
      <a href="/shop.php" class="link-arrow">Xem tất cả</a>
    </div>
    <div class="product-grid">
      <?php foreach ($newArrivals as $p): include __DIR__ . '/includes/product-card.php'; endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="newsletter-banner">
      <div>
        <h3>Sẵn sàng đón công nghệ mới?</h3>
        <p>Đăng ký nhận bản tin để cập nhật sản phẩm mới và ưu đãi độc quyền dành riêng cho bạn.</p>
      </div>
      <form class="newsletter-form">
        <input type="email" placeholder="Nhập email của bạn" required>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
      </form>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
