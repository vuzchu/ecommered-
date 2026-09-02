document.addEventListener('DOMContentLoaded', function () {

  // Mobile nav toggle
  var navToggle = document.getElementById('navToggle');
  var mainNav = document.getElementById('mainNav');
  if (navToggle && mainNav) {
    navToggle.addEventListener('click', function () {
      mainNav.classList.toggle('open');
      mainNav.style.display = mainNav.classList.contains('open') ? 'block' : '';
    });
  }

  // Wishlist heart toggle (product cards + detail page)
  document.querySelectorAll('.product-wish, .js-wishlist').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      btn.classList.toggle('is-active');
    });
  });

  // Quantity stepper
  document.querySelectorAll('.qty-stepper').forEach(function (stepper) {
    var input = stepper.querySelector('input');
    var min = parseInt(input.getAttribute('min') || '1', 10);
    var max = parseInt(input.getAttribute('max') || '99', 10);
    stepper.querySelectorAll('button').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var value = parseInt(input.value, 10) || min;
        value += btn.dataset.step === 'down' ? -1 : 1;
        value = Math.max(min, Math.min(max, value));
        input.value = value;
      });
    });
  });

  // Product gallery: swap main image on thumbnail click
  document.querySelectorAll('.pd-thumb').forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      var gallery = thumb.closest('[data-gallery]');
      if (!gallery) return;
      gallery.querySelectorAll('.pd-thumb').forEach(function (t) { t.classList.remove('active'); });
      thumb.classList.add('active');
      var mainImg = gallery.querySelector('.pd-gallery-main img');
      if (mainImg) mainImg.src = thumb.querySelector('img').src;
    });
  });

  // Color swatch selection
  document.querySelectorAll('.swatches').forEach(function (group) {
    group.querySelectorAll('.swatch').forEach(function (swatch) {
      swatch.addEventListener('click', function () {
        group.querySelectorAll('.swatch').forEach(function (s) { s.classList.remove('active'); });
        swatch.classList.add('active');
      });
    });
  });

  // Accordion (FAQ / product details)
  document.querySelectorAll('.accordion-trigger').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var item = trigger.closest('.accordion-item');
      var wasOpen = item.classList.contains('open');
      item.parentElement.querySelectorAll('.accordion-item').forEach(function (i) { i.classList.remove('open'); });
      if (!wasOpen) item.classList.add('open');
    });
  });

  // Flash sale countdown
  document.querySelectorAll('.countdown').forEach(function (el) {
    var endsInHours = parseFloat(el.dataset.hours || '48');
    var end = Date.now() + endsInHours * 3600 * 1000;
    function tick() {
      var diff = Math.max(0, end - Date.now());
      var d = Math.floor(diff / 86400000);
      var h = Math.floor((diff % 86400000) / 3600000);
      var m = Math.floor((diff % 3600000) / 60000);
      var s = Math.floor((diff % 60000) / 1000);
      var vals = el.querySelectorAll('strong');
      if (vals[0]) vals[0].textContent = String(d).padStart(2, '0');
      if (vals[1]) vals[1].textContent = String(h).padStart(2, '0');
      if (vals[2]) vals[2].textContent = String(m).padStart(2, '0');
      if (vals[3]) vals[3].textContent = String(s).padStart(2, '0');
    }
    tick();
    setInterval(tick, 1000);
  });

  // Mobile filter sidebar toggle (shop page)
  var filterToggle = document.getElementById('filterToggle');
  var filterSidebar = document.getElementById('filterSidebar');
  if (filterToggle && filterSidebar) {
    filterToggle.addEventListener('click', function () {
      filterSidebar.classList.toggle('open');
    });
  }
});
