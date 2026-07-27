<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->ProductName }} - Verdant Harmony</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Nvt_style.css') }}">
</head>
<body class="pt-5">

    <!-- Header Navigation -->
    <header class="fixed-top nvt-navbar border-bottom py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand nvt-font-title fs-3 fw-bold text-success">
                Verdant Harmony
            </a>
            
            <nav class="nav d-none d-md-flex gap-4">
                <a class="nav-link nvt-nav-link" href="{{ route('home') }}">Trang chủ</a>
                <a class="nav-link nvt-nav-link" href="{{ route('products') }}">Sản phẩm</a>
                <a class="nav-link nvt-nav-link" href="#">Bán chạy</a>
                <a class="nav-link nvt-nav-link" href="#">Chăm sóc cây</a>
                <a class="nav-link nvt-nav-link" href="#">Giới thiệu</a>
            </nav>

            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-link text-dark p-0"><span class="material-symbols-outlined">person</span></button>
                <button class="btn btn-link text-dark p-0 position-relative">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container my-5 pt-4">
        <!-- Product Hero Section -->
        <section class="row g-5 align-items-start mb-5">
            
            <!-- Gallery (Left) -->
            <div class="col-md-6">
                <div class="nvt-product-img-wrapper rounded-4 mb-3 shadow-sm">
                    <img id="NvtMainImg" 
                         src="{{ asset('images/' . ($product->Image ?? 'default.jpg')) }}" 
                         class="nvt-product-img" 
                         alt="{{ $product->ProductName }}"
                         onerror="this.src='https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=800&q=80'">
                </div>
                <!-- Gallery Thumbnails -->
                <div class="d-flex gap-2 overflow-auto pb-2">
                    <button class="nvt-thumb-btn active" onclick="changeImage(this, 'https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=800&q=80')">
                        <img src="https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=200&q=80" alt="Thumb 1">
                    </button>
                    <button class="nvt-thumb-btn" onclick="changeImage(this, 'https://images.unsplash.com/photo-1545241047-6083a3684587?auto=format&fit=crop&w=800&q=80')">
                        <img src="https://images.unsplash.com/photo-1545241047-6083a3684587?auto=format&fit=crop&w=200&q=80" alt="Thumb 2">
                    </button>
                    <button class="nvt-thumb-btn" onclick="changeImage(this, 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=800&q=80')">
                        <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=200&q=80" alt="Thumb 3">
                    </button>
                </div>
            </div>

            <!-- Product Details (Right) -->
            <div class="col-md-6 ps-lg-4">
                <div class="mb-3">
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle">
                            Chịu ánh sáng yếu
                        </span>
                        <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle">
                            Lọc không khí
                        </span>
                    </div>
                    <h1 class="nvt-font-title display-5 fw-bold text-success mb-2">{{ $product->ProductName }}</h1>
                    <p class="fs-3 fw-bold" style="color: var(--nvt-terracotta);">
                        {{ number_format($product->Price, 0, ',', '.') }}₫
                    </p>
                </div>

                <p class="text-secondary leading-relaxed mb-4">
                    {{ $product->Description ?? 'Nổi tiếng với những chiếc lá xẻ tự nhiên độc đáo, đây là loại cây cảnh dễ chăm sóc, mang lại cảm giác nhiệt đới hiện đại và sang trọng cho không gian sống của bạn.' }}
                </p>

                <!-- Pot Size Selector -->
                <div class="mb-4">
                    <label class="form-label text-uppercase fw-semibold text-muted small mb-2">Kích thước chậu</label>
                    <div class="d-flex gap-3">
                        <label class="nvt-size-option">
                            <input type="radio" name="pot_size" value="6" checked>
                            <span class="nvt-size-btn">6"</span>
                        </label>
                        <label class="nvt-size-option">
                            <input type="radio" name="pot_size" value="8">
                            <span class="nvt-size-btn">8"</span>
                        </label>
                        <label class="nvt-size-option">
                            <input type="radio" name="pot_size" value="10">
                            <span class="nvt-size-btn">10"</span>
                        </label>
                    </div>
                </div>

                <!-- Add to Cart CTA -->
                <div class="d-flex gap-3 mb-4">
                    <button class="btn nvt-btn-add-cart flex-grow-1 d-flex justify-content-center align-items-center gap-2">
                        <span class="material-symbols-outlined fs-5">shopping_bag</span>
                        Thêm vào giỏ hàng
                    </button>
                    <button class="btn nvt-btn-wishlist">
                        <span class="material-symbols-outlined">favorite_border</span>
                    </button>
                </div>
            </div>
        </section>

        <hr class="my-5 text-muted opacity-25">

        <!-- Care Guide Tabs Section -->
        <section class="max-w-4xl mx-auto my-5">
            <ul class="nav nav-tabs nvt-nav-tabs justify-content-center mb-4" id="NvtTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="care-tab" data-bs-toggle="tab" data-bs-target="#care" type="button">Hướng dẫn chăm sóc</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">Thông tin bổ sung</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Đánh giá (24)</button>
                </li>
            </ul>

            <div class="tab-content pt-3" id="NvtTabContent">
                <!-- Tab Care Guide -->
                <div class="tab-pane fade show active" id="care">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="nvt-care-card h-100">
                                <div class="nvt-icon-circle">
                                    <span class="material-symbols-outlined">light_mode</span>
                                </div>
                                <h3 class="fs-5 fw-bold text-success mb-2">Ánh sáng</h3>
                                <p class="text-muted small mb-0">Phát triển tốt nhất ở nơi có ánh sáng gián tiếp sáng. Có thể chịu được ánh sáng yếu hơn.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nvt-care-card h-100">
                                <div class="nvt-icon-circle">
                                    <span class="material-symbols-outlined">water_drop</span>
                                </div>
                                <h3 class="fs-5 fw-bold text-success mb-2">Tưới nước</h3>
                                <p class="text-muted small mb-0">Tưới nước 1-2 tuần/lần, chờ đất khô giữa các lần tưới. Tưới thường xuyên hơn nếu ở nơi nhiều sáng.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nvt-care-card h-100">
                                <div class="nvt-icon-circle">
                                    <span class="material-symbols-outlined">thermostat</span>
                                </div>
                                <h3 class="fs-5 fw-bold text-success mb-2">Nhiệt độ</h3>
                                <p class="text-muted small mb-0">Thích hợp nhiệt độ phòng trung bình từ 18°C-29°C. Tránh gió lạnh dưới 15°C.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Info -->
                <div class="tab-pane fade text-center py-4" id="info">
                    <p class="text-muted">Xuất xứ: Nam Mỹ | Chiều cao trung bình: 60cm - 120cm | An toàn cho cún/mèo: Không nên nuốt.</p>
                </div>

                <!-- Tab Reviews -->
                <div class="tab-pane fade text-center py-4" id="reviews">
                    <p class="text-muted">Chưa có đánh giá mới nào cho sản phẩm này.</p>
                </div>
            </div>
        </section>

        <!-- You May Also Like Section -->
        <section class="mt-5 pt-4">
            <h2 class="nvt-font-title text-center text-success mb-4">Sản phẩm tương tự</h2>
            <div class="row g-4">
                @foreach($relatedProducts as $item)
                <div class="col-6 col-md-3">
                    <div class="card nvt-product-card h-100">
                        <div class="nvt-product-img-wrapper">
                            <img src="{{ asset('images/' . ($item->Image ?? 'default.jpg')) }}" 
                                 class="nvt-product-img" 
                                 alt="{{ $item->ProductName }}"
                                 onerror="this.src='https://images.unsplash.com/photo-1545241047-6083a3684587?auto=format&fit=crop&w=500&q=80'">
                        </div>
                        <div class="card-body p-3">
                            <h3 class="fs-6 fw-bold text-success mb-1">{{ $item->ProductName }}</h3>
                            <p class="fw-bold mb-0" style="color: var(--nvt-terracotta);">
                                {{ number_format($item->Price, 0, ',', '.') }}₫
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-5 border-top mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="fw-bold text-success nvt-font-title fs-4 mb-3">Verdant Harmony</h5>
                    <p class="text-muted small">
                        Mang sự thanh bình của thiên nhiên vào không gian đô thị của bạn với những loại cây trồng trong nhà cao cấp.
                    </p>
                </div>
                <div class="col-md-8 d-flex flex-wrap gap-5 justify-md-content-end">
                    <div>
                        <h6 class="fw-bold mb-3">Khám phá</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Về chúng tôi</a></li>
                            <li class="mb-2"><a href="{{ route('products') }}" class="text-decoration-none text-muted">Tất cả sản phẩm</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Mẹo chăm sóc cây</a></li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-3">Hỗ trợ</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Liên hệ</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 border-top pt-4 text-center">
                    <p class="text-muted small mb-0">© 2026 Verdant Harmony. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS + JS Chuyển Ảnh Gallery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeImage(element, src) {
            document.getElementById('NvtMainImg').src = src;
            document.querySelectorAll('.nvt-thumb-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
</body>
</html>