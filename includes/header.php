<?php
require_once __DIR__ . '/data.php';
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$categories = techora_categories();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' — TECHORA' : 'TECHORA — Công nghệ chính hãng, giá tốt mỗi ngày' ?></title>
<meta name="description" content="TECHORA — cửa hàng đồ công nghệ: tai nghe, đồng hồ thông minh, bàn phím cơ, loa, phụ kiện chính hãng.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<div class="topbar">
  <div class="container">
    <span>🚚 Miễn phí vận chuyển cho đơn hàng từ 990.000đ</span>
    <div class="topbar-links">
      <a href="#">Theo dõi đơn hàng</a>
      <a href="#">Trợ giúp</a>
      <a href="#">VI / VND</a>
    </div>
  </div>
</div>

<header class="site-header">
  <div class="container header-main">
    <a href="/index.php" class="logo">
      <span class="logo-mark">T</span>
      TECHORA<span class="dot">.</span>
    </a>

    <form class="search-form" action="/shop.php" method="get">
      <select name="category">
        <option value="all">Tất cả danh mục</option>
        <?php foreach ($categories as $slug => $label): ?>
          <option value="<?= $slug ?>"><?= $label ?></option>
        <?php endforeach; ?>
      </select>
      <input type="text" name="q" placeholder="Tìm kiếm sản phẩm công nghệ..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
      <button type="submit" aria-label="Tìm kiếm">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </button>
    </form>

    <div class="header-actions">
      <a href="#" class="header-action">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        Tài khoản
      </a>
      <a href="#" class="header-action">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
        Yêu thích
        <span class="count">3</span>
      </a>
      <a href="#" class="header-action">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg>
        Giỏ hàng
        <span class="count">2</span>
      </a>
      <button class="nav-toggle" id="navToggle" aria-label="Mở menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
  </div>

  <nav class="main-nav" id="mainNav">
    <div class="container">
      <div class="nav-categories">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="18" x2="14" y2="18"/></svg>
        Tất cả danh mục
      </div>
      <div class="nav-links">
        <a href="/index.php" class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">Trang chủ</a>
        <a href="/shop.php" class="<?= $currentPage === 'shop.php' ? 'active' : '' ?>">Cửa hàng</a>
        <a href="/shop.php?sale=1">Khuyến mãi</a>
        <a href="#">Hàng mới về</a>
        <a href="#">Thương hiệu</a>
        <a href="#">Liên hệ</a>
      </div>
    </div>
  </nav>
</header>
