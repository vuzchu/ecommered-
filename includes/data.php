<?php
/**
 * Static product catalog + helpers.
 * No database yet — this powers home/shop/detail pages with plain PHP arrays.
 */

function techora_categories(): array
{
    return [
        'tai-nghe'        => 'Tai nghe',
        'tai-nghe-khong-day' => 'Tai nghe không dây',
        'dong-ho'         => 'Đồng hồ thông minh',
        'ban-phim'        => 'Bàn phím',
        'chuot'           => 'Chuột',
        'loa'             => 'Loa',
        'sac-du-phong'    => 'Sạc dự phòng',
        'balo'            => 'Balo laptop',
        'man-hinh'        => 'Màn hình',
        'phu-kien'        => 'Phụ kiện',
    ];
}

function techora_products(): array
{
    static $products = null;
    if ($products !== null) {
        return $products;
    }

    $products = [
        [
            'id' => 1,
            'name' => 'Sony WH-1000XM4 Wireless Headphones',
            'brand' => 'Sony',
            'category' => 'tai-nghe',
            'price' => 6499000,
            'oldPrice' => 7499000,
            'rating' => 4.9,
            'reviews' => 95,
            'badge' => 'Sale',
            'bg' => 'EEF2FF',
            'colors' => ['#0B1220', '#EFE6DA', '#3B4A63', '#2952E3'],
            'stock' => true,
            'description' => 'Trải nghiệm khả năng chống ồn hàng đầu ngành cùng chất âm cao cấp. Thiết kế cho cả ngày đeo thoải mái, thích ứng với môi trường và mang lại trải nghiệm nghe nhạc sống động.',
            'features' => [
                'Chống ồn chủ động hàng đầu ngành',
                'Thời lượng pin lên đến 30 giờ',
                'Sạc nhanh: 10 phút dùng được 5 giờ',
                'Điều khiển cảm ứng thông minh',
                'Speak-to-Chat tự tạm dừng nhạc khi bạn nói chuyện',
                'Kết nối đa điểm với 2 thiết bị',
            ],
        ],
        [
            'id' => 2,
            'name' => 'Apple AirPods Max',
            'brand' => 'Apple',
            'category' => 'tai-nghe',
            'price' => 12490000,
            'oldPrice' => null,
            'rating' => 4.8,
            'reviews' => 38,
            'badge' => null,
            'bg' => 'F1F5F9',
            'colors' => ['#0B1220', '#94A3B8', '#2952E3'],
            'stock' => true,
            'description' => 'Âm thanh không gian cao cấp với thiết kế khung nhôm nguyên khối, đệm tai lưới mềm mại và khả năng chống ồn chủ động vượt trội.',
            'features' => ['Âm thanh không gian động', 'Chống ồn chủ động', 'Khung nhôm cao cấp', 'Pin 20 giờ sử dụng'],
        ],
        [
            'id' => 3,
            'name' => 'JBL Tune 760NC',
            'brand' => 'JBL',
            'category' => 'tai-nghe',
            'price' => 1290000,
            'oldPrice' => 1590000,
            'rating' => 4.6,
            'reviews' => 52,
            'badge' => 'Sale',
            'bg' => 'E7EEFE',
            'colors' => ['#0B1220', '#2952E3'],
            'stock' => true,
            'description' => 'Âm thanh JBL Pure Bass đặc trưng kết hợp chống ồn chủ động, mang lại trải nghiệm nghe nhạc mạnh mẽ trong một thiết kế gọn nhẹ.',
            'features' => ['Âm Bass mạnh mẽ đặc trưng JBL', 'Chống ồn chủ động', 'Pin 35 giờ', 'Gấp gọn tiện lợi'],
        ],
        [
            'id' => 4,
            'name' => 'Sennheiser HD 450BT',
            'brand' => 'Sennheiser',
            'category' => 'tai-nghe',
            'price' => 1990000,
            'oldPrice' => null,
            'rating' => 4.5,
            'reviews' => 29,
            'badge' => 'Mới',
            'bg' => 'F8FAFC',
            'colors' => ['#0B1220', '#E2E8F0'],
            'stock' => true,
            'description' => 'Chất âm tinh chỉnh chuẩn audiophile với công nghệ chống ồn chủ động, hỗ trợ aptX HD cho chất lượng không dây vượt trội.',
            'features' => ['Chuẩn âm audiophile', 'Hỗ trợ aptX HD', 'Pin 30 giờ', 'Điều khiển cảm ứng'],
        ],
        [
            'id' => 5,
            'name' => 'Anker Soundcore Life Q30',
            'brand' => 'Anker',
            'category' => 'tai-nghe',
            'price' => 1190000,
            'oldPrice' => null,
            'rating' => 4.7,
            'reviews' => 81,
            'badge' => null,
            'bg' => 'EEF2FF',
            'colors' => ['#F8FAFC', '#0B1220'],
            'stock' => true,
            'description' => 'Chống ồn đa chế độ, chất âm Hi-Res chứng nhận cùng mức giá dễ tiếp cận cho mọi người dùng.',
            'features' => ['Chống ồn 3 chế độ', 'Hi-Res Audio', 'Pin 40 giờ', 'Ứng dụng tùy chỉnh EQ'],
        ],
        [
            'id' => 6,
            'name' => 'Apple AirPods Pro 2',
            'brand' => 'Apple',
            'category' => 'tai-nghe-khong-day',
            'price' => 4890000,
            'oldPrice' => 5990000,
            'rating' => 4.8,
            'reviews' => 1248,
            'badge' => 'Sale',
            'bg' => 'F1F5F9',
            'colors' => ['#F8FAFC'],
            'stock' => true,
            'description' => 'Chip H2 mang lại khả năng chống ồn chủ động thông minh hơn, âm thanh không gian cá nhân hoá và thời lượng pin cải thiện.',
            'features' => ['Chống ồn chủ động thế hệ mới', 'Âm thanh không gian cá nhân hoá', 'Chống nước IP54', 'Hộp sạc MagSafe'],
        ],
        [
            'id' => 7,
            'name' => 'Stuffus R175 True Wireless',
            'brand' => 'Stuffus',
            'category' => 'tai-nghe-khong-day',
            'price' => 819000,
            'oldPrice' => null,
            'rating' => 4.8,
            'reviews' => 2400,
            'badge' => 'Mới',
            'bg' => 'E7EEFE',
            'colors' => ['#0B1220', '#3B6BFA'],
            'stock' => true,
            'description' => 'Tai nghe true wireless nhỏ gọn, chống ồn chủ động và pin dùng cả ngày cho công việc lẫn giải trí.',
            'features' => ['Chống ồn chủ động', 'Pin 28 giờ kèm hộp sạc', 'Chống nước IPX5', 'Kết nối Bluetooth 5.3'],
        ],
        [
            'id' => 8,
            'name' => 'TWS Bujug Sport',
            'brand' => 'Bujug',
            'category' => 'tai-nghe-khong-day',
            'price' => 699000,
            'oldPrice' => null,
            'rating' => 5.0,
            'reviews' => 1200,
            'badge' => null,
            'bg' => 'F8FAFC',
            'colors' => ['#2952E3', '#0B1220'],
            'stock' => true,
            'description' => 'Thiết kế thể thao ôm tai chắc chắn, chống nước tốt, phù hợp cho các buổi tập luyện cường độ cao.',
            'features' => ['Ôm tai chống rơi khi vận động', 'Chống nước IPX7', 'Pin 24 giờ', 'Điều khiển cảm ứng'],
        ],
        [
            'id' => 9,
            'name' => 'Samsung Galaxy Watch 6 Classic',
            'brand' => 'Samsung',
            'category' => 'dong-ho',
            'price' => 6990000,
            'oldPrice' => 8390000,
            'rating' => 4.6,
            'reviews' => 892,
            'badge' => 'Sale',
            'bg' => 'F1F5F9',
            'colors' => ['#0B1220', '#94A3B8'],
            'stock' => true,
            'description' => 'Viền xoay vật lý kinh điển kết hợp loạt cảm biến sức khoẻ toàn diện: đo điện tâm đồ, chỉ số căng thẳng và theo dõi giấc ngủ nâng cao.',
            'features' => ['Viền xoay vật lý', 'Đo điện tâm đồ & huyết áp', 'Theo dõi giấc ngủ nâng cao', 'Pin dùng đến 40 giờ'],
        ],
        [
            'id' => 10,
            'name' => 'Fossil Gen 6 Smartwatch',
            'brand' => 'Fossil',
            'category' => 'dong-ho',
            'price' => 4590000,
            'oldPrice' => null,
            'rating' => 4.4,
            'reviews' => 785,
            'badge' => 'Mới',
            'bg' => 'EEF2FF',
            'colors' => ['#0B1220', '#3B6BFA', '#E2E8F0'],
            'stock' => true,
            'description' => 'Thiết kế thời trang cổ điển kết hợp nền tảng Wear OS mượt mà, tích hợp đầy đủ tính năng theo dõi sức khoẻ hằng ngày.',
            'features' => ['Nền tảng Wear OS by Google', 'Đo nhịp tim & SpO2', 'Chống nước 3ATM', 'Sạc nhanh 30 phút dùng cả ngày'],
        ],
        [
            'id' => 11,
            'name' => 'Aduku Smart Air Cleaner',
            'brand' => 'Aduku',
            'category' => 'phu-kien',
            'price' => 699000,
            'oldPrice' => null,
            'rating' => 4.4,
            'reviews' => 1000,
            'badge' => null,
            'bg' => 'F8FAFC',
            'colors' => ['#F8FAFC', '#0B1220'],
            'stock' => true,
            'description' => 'Máy lọc không khí mini thông minh, vận hành êm ái, phù hợp cho bàn làm việc hoặc phòng ngủ nhỏ.',
            'features' => ['Lọc HEPA 3 lớp', 'Vận hành êm dưới 30dB', 'Điều khiển qua app', 'Thiết kế nhỏ gọn'],
        ],
        [
            'id' => 12,
            'name' => 'Herschel Classic Backpack',
            'brand' => 'Herschel',
            'category' => 'balo',
            'price' => 2190000,
            'oldPrice' => null,
            'rating' => 4.5,
            'reviews' => 664,
            'badge' => 'Mới',
            'bg' => 'E7EEFE',
            'colors' => ['#0B1220', '#475569'],
            'stock' => true,
            'description' => 'Thiết kế tối giản, ngăn đệm chống sốc cho laptop 15", chất liệu bền bỉ cho sử dụng hằng ngày.',
            'features' => ['Ngăn đệm chống sốc laptop 15"', 'Chất liệu chống nước nhẹ', 'Nhiều ngăn tổ chức đồ', 'Quai đeo êm vai'],
        ],
        [
            'id' => 13,
            'name' => 'JBL Go 3 Speaker',
            'brand' => 'JBL',
            'category' => 'loa',
            'price' => 1190000,
            'oldPrice' => null,
            'rating' => 4.7,
            'reviews' => 2365,
            'badge' => 'Mới',
            'bg' => 'F1F5F9',
            'colors' => ['#0B1220', '#EF4444', '#2952E3'],
            'stock' => true,
            'description' => 'Loa Bluetooth siêu nhỏ gọn, chống nước IP67, mang âm thanh JBL đi khắp mọi nơi.',
            'features' => ['Chống nước & bụi IP67', 'Pin 5 giờ liên tục', 'Thiết kế bỏ túi', 'Kết nối Bluetooth 5.1'],
        ],
        [
            'id' => 14,
            'name' => 'Kaysdry K2 Mechanical Keyboard',
            'brand' => 'Kaysdry',
            'category' => 'ban-phim',
            'price' => 2190000,
            'oldPrice' => null,
            'rating' => 4.6,
            'reviews' => 892,
            'badge' => 'Mới',
            'bg' => 'EEF2FF',
            'colors' => ['#0B1220', '#94A3B8'],
            'stock' => true,
            'description' => 'Bàn phím cơ 75% với đèn RGB tuỳ chỉnh, kết nối không dây 3 chế độ, switch hot-swap linh hoạt.',
            'features' => ['Switch hot-swap', 'Kết nối 3 chế độ: Bluetooth/2.4GHz/dây', 'Đèn RGB tuỳ chỉnh', 'Khung nhôm CNC'],
        ],
        [
            'id' => 15,
            'name' => 'Anker 737 Power Bank 24000mAh',
            'brand' => 'Anker',
            'category' => 'sac-du-phong',
            'price' => 2490000,
            'oldPrice' => null,
            'rating' => 4.5,
            'reviews' => 654,
            'badge' => 'Mới',
            'bg' => 'F8FAFC',
            'colors' => ['#0B1220', '#475569'],
            'stock' => true,
            'description' => 'Dung lượng khủng 24.000mAh, sạc nhanh 140W đủ sức sạc đầy laptop, màn hình LED hiển thị % pin.',
            'features' => ['Dung lượng 24.000mAh', 'Sạc nhanh 140W', 'Màn hình LED thông minh', '3 cổng sạc cùng lúc'],
        ],
        [
            'id' => 16,
            'name' => 'Stuffus Peker 32 Webcam',
            'brand' => 'Stuffus',
            'category' => 'phu-kien',
            'price' => 990000,
            'oldPrice' => null,
            'rating' => 5.0,
            'reviews' => 1300,
            'badge' => null,
            'bg' => 'E7EEFE',
            'colors' => ['#F8FAFC'],
            'stock' => true,
            'description' => 'Webcam Full HD 1080p tự động lấy nét, micro khử tiếng ồn tích hợp, hoàn hảo cho họp trực tuyến.',
            'features' => ['Full HD 1080p 60fps', 'Tự động lấy nét', 'Micro khử ồn kép', 'Kẹp gắn linh hoạt'],
        ],
    ];

    return $products;
}

function techora_find_product(int $id): ?array
{
    foreach (techora_products() as $p) {
        if ($p['id'] === $id) {
            return $p;
        }
    }
    return null;
}

function techora_related_products(array $product, int $limit = 5): array
{
    $related = array_values(array_filter(
        techora_products(),
        fn ($p) => $p['id'] !== $product['id'] && $p['category'] === $product['category']
    ));

    if (count($related) < $limit) {
        $others = array_values(array_filter(
            techora_products(),
            fn ($p) => $p['id'] !== $product['id'] && $p['category'] !== $product['category']
        ));
        $related = array_merge($related, $others);
    }

    return array_slice($related, 0, $limit);
}

function techora_format_price(int $vnd): string
{
    return number_format($vnd, 0, ',', '.') . 'đ';
}

/**
 * Line-art icon paths (24x24 viewBox) per category, shared between the
 * category nav grid and the generated product placeholder art.
 */
function techora_category_icons(): array
{
    return [
        'tai-nghe'            => '<path d="M4 14v-2a8 8 0 0 1 16 0v2"/><rect x="2" y="14" width="5" height="7" rx="2"/><rect x="17" y="14" width="5" height="7" rx="2"/>',
        'tai-nghe-khong-day'  => '<circle cx="8" cy="12" r="3"/><circle cx="16" cy="12" r="3"/><path d="M8 9V7a4 4 0 0 1 8 0v2"/>',
        'dong-ho'             => '<circle cx="12" cy="13" r="7"/><path d="M12 10v3l2 2M9 4h6M10 4v3M14 4v3"/>',
        'ban-phim'            => '<rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 10h.01M10 10h.01M14 10h.01M18 10h.01M6 14h12"/>',
        'chuot'               => '<rect x="7" y="3" width="10" height="18" rx="5"/><line x1="12" y1="3" x2="12" y2="9"/>',
        'loa'                 => '<rect x="6" y="2" width="12" height="20" rx="3"/><circle cx="12" cy="8" r="2"/><circle cx="12" cy="15" r="3.5"/>',
        'sac-du-phong'        => '<rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 7l-2 5h3l-1 5 4-6h-3l1-4Z"/>',
        'balo'                => '<path d="M6 8a6 6 0 0 1 12 0v10a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2Z"/><path d="M9 8h6M9 21v-6h6v6"/>',
        'man-hinh'            => '<rect x="2" y="4" width="20" height="13" rx="2"/><path d="M8 21h8M12 17v4"/>',
        'phu-kien'            => '<circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 2"/>',
    ];
}

/**
 * Self-hosted product art: an inline SVG data URI (tinted background +
 * category line-icon + brand label). Used instead of an external
 * placeholder image service so product cards never depend on outside
 * network access and always render the same way.
 */
function techora_placeholder_image(string $bgHex, string $category, string $label, int $size = 600): string
{
    $icons = techora_category_icons();
    $iconPaths = $icons[$category] ?? '<circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/>';

    $iconSize = (int) round($size * 0.32);
    $offsetX = ($size - $iconSize) / 2;
    $offsetY = $offsetX - $size * 0.05;
    $scale = round($iconSize / 24, 3);
    $fontSize = (int) round($size * 0.048);
    $safeLabel = mb_strtoupper(htmlspecialchars($label, ENT_XML1 | ENT_QUOTES, 'UTF-8'));

    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $size . ' ' . $size . '">'
        . '<rect width="100%" height="100%" fill="#' . $bgHex . '"/>'
        . '<g transform="translate(' . $offsetX . ',' . $offsetY . ') scale(' . $scale . ')" fill="none" stroke="#0b1220" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" opacity="0.68">' . $iconPaths . '</g>'
        . '<text x="50%" y="' . round($size * 0.87) . '" text-anchor="middle" font-family="Inter, Arial, sans-serif" font-size="' . $fontSize . '" font-weight="700" letter-spacing="1" fill="#0b1220" opacity="0.5">' . $safeLabel . '</text>'
        . '</svg>';

    return 'data:image/svg+xml;utf8,' . rawurlencode($svg);
}

function techora_filter_products(array $products, string $query = '', string $category = '', string $sort = ''): array
{
    if ($query !== '') {
        $needle = mb_strtolower($query);
        $products = array_values(array_filter($products, function ($p) use ($needle) {
            return str_contains(mb_strtolower($p['name']), $needle) || str_contains(mb_strtolower($p['brand']), $needle);
        }));
    }

    if ($category !== '' && $category !== 'all') {
        $products = array_values(array_filter($products, fn ($p) => $p['category'] === $category));
    }

    switch ($sort) {
        case 'price-asc':
            usort($products, fn ($a, $b) => $a['price'] <=> $b['price']);
            break;
        case 'price-desc':
            usort($products, fn ($a, $b) => $b['price'] <=> $a['price']);
            break;
        case 'rating':
            usort($products, fn ($a, $b) => $b['rating'] <=> $a['rating']);
            break;
        default:
            break;
    }

    return $products;
}
