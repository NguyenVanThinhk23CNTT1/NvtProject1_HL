<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách cây cảnh - Verdant Harmony</title>
    
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
                <a class="nav-link nvt-nav-link active" href="{{ route('products') }}">Sản phẩm</a>
                <a class="nav-link nvt-nav-link" href="{{ route('nvt.care.guide') }}">Chăm sóc cây</a>
                <a class="nav-link nvt-nav-link" href="{{ route('nvt.about') }}">Giới thiệu</a>
            </nav>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.products') }}" class="btn btn-link text-dark p-0" title="Admin"><span class="material-symbols-outlined">person</span></a>
                <a href="{{ route('nvt.cart') }}" class="btn btn-link text-dark p-0 position-relative" title="Giỏ hàng">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </a>
            </div>
        </div>
    </header>

    <!-- Page Header Banner -->
    <section class="nvt-page-header text-center my-4">
        <div class="container">
            <h1 class="display-5 fw-bold text-success mb-3">Tất cả các loại cây</h1>
            <p class="lead text-muted mx-auto" style="max-width: 650px;">
                Khám phá bộ sưu tập cây trồng trong nhà được tuyển chọn cẩn thận của chúng tôi, mang thiên nhiên thanh bình vào không gian sống của bạn.
            </p>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="container mb-5">
        <div class="row g-4">
            
            <!-- Sidebar Filters -->
            <aside class="col-md-3">
                <div class="sticky-top" style="top: 90px;">
                    <!-- Filter: Kích thước -->
                    <div class="mb-4">
                        <h3 class="nvt-font-title nvt-filter-title">Kích thước</h3>
                        <div class="nvt-custom-checkbox">
                            <div class="form-check mb-2">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="sizeSmall" data-group="size" value="small">
                                <label class="form-check-label text-muted" for="sizeSmall">Nhỏ</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="sizeMedium" data-group="size" value="medium">
                                <label class="form-check-label text-muted" for="sizeMedium">Trung bình</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="sizeLarge" data-group="size" value="large">
                                <label class="form-check-label text-muted" for="sizeLarge">Lớn</label>
                            </div>
                        </div>
                    </div>

                    <!-- Filter: Ánh sáng -->
                    <div class="mb-4">
                        <h3 class="nvt-font-title nvt-filter-title">Ánh sáng</h3>
                        <div class="nvt-custom-checkbox">
                            <div class="form-check mb-2">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="lightLow" data-group="light" value="low">
                                <label class="form-check-label text-muted" for="lightLow">Ánh sáng yếu</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="lightIndirect" data-group="light" value="indirect">
                                <label class="form-check-label text-muted" for="lightIndirect">Ánh sáng gián tiếp</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="lightDirect" data-group="light" value="direct">
                                <label class="form-check-label text-muted" for="lightDirect">Nắng trực tiếp</label>
                            </div>
                        </div>
                    </div>

                    <!-- Filter: Thú cưng -->
                    <div class="mb-4">
                        <h3 class="nvt-font-title nvt-filter-title">Thú cưng</h3>
                        <div class="nvt-custom-checkbox">
                            <div class="form-check">
                                <input class="form-check-input nvt-filter-cb" type="checkbox" id="petFriendly" data-group="pet" value="friendly">
                                <label class="form-check-label text-muted" for="petFriendly">Thân thiện với thú cưng</label>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Product Grid Area -->
            <section class="col-md-9">
                <!-- Sort Bar -->
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <span class="text-muted small" id="product-count">Hiển thị {{ count($products) }} sản phẩm</span>
                    <div class="d-flex align-items-center gap-2">
                        <label for="sort" class="fw-semibold text-success small mb-0">Sắp xếp theo:</label>
                        <select class="form-select form-select-sm border-0 bg-light w-auto fw-semibold" id="sort">
                            <option>Bán chạy nhất</option>
                            <option>Mới nhất</option>
                            <option>Giá: Thấp đến Cao</option>
                            <option>Giá: Cao đến Thấp</option>
                        </select>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="row g-4">
                    @foreach($products as $product)
                    @php
                        $size = ['small', 'medium', 'large'][$product->ProductId % 3];
                        $light = ['low', 'indirect', 'direct'][$product->ProductId % 3];
                        $pet = ['friendly', 'toxic'][$product->ProductId % 2];
                    @endphp
                    <div class="col-sm-6 col-lg-4 nvt-product-item" data-size="{{ $size }}" data-light="{{ $light }}" data-pet="{{ $pet }}">
                        <a href="{{ route('product.detail', $product->ProductId) }}" class="text-decoration-none">
                        <div class="card nvt-product-card h-100">
                            <div class="nvt-product-img-wrapper">
                                <img src="{{ asset('images/' . ($product->Image ?? 'default.jpg')) }}" 
                                     class="nvt-product-img" 
                                     alt="{{ $product->ProductName }}"
                                     onerror="this.src='https://images.unsplash.com/photo-1545241047-6083a3684587?auto=format&fit=crop&w=500&q=80'">
                                <span class="nvt-badge-custom">{{ $product->CategoryName }}</span>
                            </div>
                            <div class="card-body d-flex flex-column p-3">
                                <h2 class="fs-6 fw-bold text-success mb-1">{{ $product->ProductName }}</h2>
                                <p class="fw-bold mb-3" style="color: var(--nvt-terracotta);">
                                    {{ number_format($product->Price, 0, ',', '.') }}₫
                                </p>
                                <span class="btn nvt-btn-cart mt-auto">Xem chi tiết &rarr;</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
                    <button class="btn btn-outline-secondary btn-sm p-1" disabled>
                        <span class="material-symbols-outlined align-middle">chevron_left</span>
                    </button>
                    <span class="fw-bold text-success small">1 / 4</span>
                    <button class="btn btn-outline-success btn-sm p-1">
                        <span class="material-symbols-outlined align-middle">chevron_right</span>
                    </button>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-5 border-top">
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
                            <li class="mb-2"><a href="{{ route('nvt.about') }}" class="text-decoration-none text-muted">Về chúng tôi</a></li>
                            <li class="mb-2"><a href="{{ route('products') }}" class="text-decoration-none text-success fw-bold">Tất cả sản phẩm</a></li>
                            <li><a href="{{ route('nvt.care.guide') }}" class="text-decoration-none text-muted">Mẹo chăm sóc cây</a></li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-3">Hỗ trợ</h6>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><a href="{{ route('home') }}#footer" class="text-decoration-none text-muted">Liên hệ</a></li>
                            <li><a href="{{ route('home') }}#footer" class="text-decoration-none text-muted">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 border-top pt-4 text-center">
                    <p class="text-muted small mb-0">© 2026 Verdant Harmony. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.nvt-filter-cb');
            const products = document.querySelectorAll('.nvt-product-item');
            const countLabel = document.getElementById('product-count');

            checkboxes.forEach(cb => {
                cb.addEventListener('change', filterProducts);
            });

            function filterProducts() {
                const activeFilters = {
                    size: Array.from(document.querySelectorAll('.nvt-filter-cb[data-group="size"]:checked')).map(cb => cb.value),
                    light: Array.from(document.querySelectorAll('.nvt-filter-cb[data-group="light"]:checked')).map(cb => cb.value),
                    pet: Array.from(document.querySelectorAll('.nvt-filter-cb[data-group="pet"]:checked')).map(cb => cb.value)
                };

                let visibleCount = 0;

                products.forEach(product => {
                    const pSize = product.getAttribute('data-size');
                    const pLight = product.getAttribute('data-light');
                    const pPet = product.getAttribute('data-pet');

                    const matchSize = activeFilters.size.length === 0 || activeFilters.size.includes(pSize);
                    const matchLight = activeFilters.light.length === 0 || activeFilters.light.includes(pLight);
                    const matchPet = activeFilters.pet.length === 0 || activeFilters.pet.includes(pPet);

                    if (matchSize && matchLight && matchPet) {
                        product.style.display = '';
                        visibleCount++;
                    } else {
                        product.style.display = 'none';
                    }
                });

                countLabel.textContent = 'Hiển thị ' + visibleCount + ' sản phẩm';
            }
        });
    </script>
</body>
</html>