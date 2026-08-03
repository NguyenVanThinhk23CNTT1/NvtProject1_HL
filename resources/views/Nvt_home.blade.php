<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Verdant Harmony</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Custom CSS của sinh viên -->
    <link rel="stylesheet" href="{{ asset('css/Nvt_style.css') }}">
</head>

<body>

    <!-- Header Navigation -->
    <header class="fixed-top nvt-navbar border-bottom py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand nvt-font-title fs-3 fw-bold text-success">
                Verdant Harmony
            </a>

            <nav class="nav d-none d-md-flex gap-4">
                <a class="nav-link nvt-nav-link" href="{{ route('home') }}">Trang chủ</a>
                <!-- Thêm route('products') cho Sản phẩm -->
                <a class="nav-link nvt-nav-link" href="{{ route('products') }}">Sản phẩm</a>
                <a class="nav-link nvt-nav-link" href="{{ route('nvt.care.guide') }}">Chăm sóc cây</a>
                <a class="nav-link nvt-nav-link" href="{{ route('nvt.about') }}">Giới thiệu</a>
            </nav>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('products') }}" class="btn btn-link text-dark p-0" title="Tìm kiếm"><span class="material-symbols-outlined">search</span></a>
                @if(Session::has('customer_id'))
                    @if((string)Session::get('customer_role') === '1')
                        <a href="{{ route('admin.products') }}" class="btn btn-link text-primary p-0 me-2" title="Quản trị Admin"><span class="material-symbols-outlined">admin_panel_settings</span></a>
                    @endif
                    <a href="{{ route('nvt.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-link text-danger p-0" title="Đăng xuất ({{ Session::get('customer_name') }})"><span class="material-symbols-outlined">logout</span></a>
                    <form id="logout-form" action="{{ route('nvt.logout') }}" method="POST" class="d-none">@csrf</form>
                @else
                    <a href="{{ route('nvt.login') }}" class="btn btn-link text-dark p-0" title="Đăng nhập"><span class="material-symbols-outlined">account_circle</span></a>
                @endif
                <a href="{{ route('nvt.cart') }}" class="btn btn-link text-dark p-0 position-relative" title="Giỏ hàng">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </a>
            </div>
        </div>
    </header>

    <main style="margin-top: 70px;">
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                    <span class="fw-bold">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- Hero Section -->
        <section class="nvt-hero-section d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="display-4 fw-bold mb-3 text-dark">Mang thiên nhiên vào ngôi nhà của bạn</h1>
                        <p class="lead text-muted mb-4">Khám phá bộ sưu tập cây cảnh trong nhà được tuyển chọn kỹ lưỡng, mang lại sự bình yên và không gian xanh mát.</p>
                        <a href="{{ route('products') }}" class="btn nvt-btn-primary shadow">Mua ngay</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Section (Lấy dữ liệu động từ DB) -->
        <section class="py-5 container">
            <div class="text-center mb-5">
                <h2 class="nvt-font-title fw-bold fs-2 text-dark">Danh mục nổi bật</h2>
                <div class="mx-auto bg-success rounded mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row text-center g-4 justify-content-center">
                @forelse($categories as $index => $category)
                <div class="col-6 col-md-4 nvt-category-item">
                    <a href="{{ route('products') }}" class="text-decoration-none text-dark d-block">
                        <img src="https://images.unsplash.com/photo-1545241047-6083a3684587?auto=format&fit=crop&w=500&q=80"
                            class="nvt-category-img mb-3 {{ $index % 2 == 1 ? 'nvt-shape-organic' : 'rounded-circle' }}"
                            alt="{{ $category->CategoryName }}">

                        <!-- Hiển thị tên danh mục và tự động viết hoa chữ cái đầu các từ -->
                        <h4 class="fs-5 fw-bold text-success">
                            {{ ucwords(mb_strtolower($category->CategoryName, 'UTF-8')) }}
                        </h4>
                    </a>
                </div>
                @empty
                <p class="text-muted">Đang cập nhật danh mục...</p>
                @endforelse
            </div>
        </section>

        <!-- Best Sellers Section (Động từ DB) -->
        <section class="py-5 bg-white border-top border-bottom">
            <div class="container">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Sản phẩm bán chạy</h2>
                        <p class="text-muted mb-0">Những lựa chọn được yêu thích nhất từ cửa hàng.</p>
                    </div>
                    <a href="{{ route('products') }}" class="text-success text-decoration-none fw-semibold">Xem tất cả &rarr;</a>
                </div>

                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('product.detail', $product->ProductId) }}" class="text-decoration-none">
                        <div class="card nvt-product-card h-100 p-3">
                            <div class="nvt-product-img-wrapper mb-3" style="border-radius: 12px;">
                                <img src="{{ asset('images/' . ($product->Image ?? 'default.jpg')) }}"
                                    class="nvt-product-img"
                                    alt="{{ $product->ProductName }}"
                                    onerror="this.src='https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=500&q=80'">
                                <span class="nvt-badge-custom">Hot Sale</span>
                            </div>
                            <div class="card-body d-flex flex-column p-0">
                                <h5 class="card-title fs-6 fw-bold text-dark mb-1">{{ $product->ProductName }}</h5>
                                <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->Description, 40) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-success fs-5">{{ number_format($product->Price, 0, ',', '.') }}₫</span>
                                    <span class="nvt-btn-add d-flex align-items-center justify-content-center">
                                        <span class="material-symbols-outlined fs-6">arrow_forward</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-5 border-top">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="fw-bold text-success nvt-font-title fs-4">Verdant Harmony</h5>
                    <p class="text-muted small">Mang hơi thở thiên nhiên vào không gian sống của bạn.</p>
                </div>
                <div class="col-md-2">
                    <h6 class="fw-bold">Khám phá</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('products') }}" class="text-decoration-none text-muted">Sản phẩm</a></li>
                        <li><a href="{{ route('products') }}" class="text-decoration-none text-muted">Mẹo chăm sóc</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6 class="fw-bold">Về chúng tôi</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('home') }}#footer" class="text-decoration-none text-muted">Liên hệ</a></li>
                        <li><a href="{{ route('nvt.about') }}" class="text-decoration-none text-muted">Giới thiệu</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-md-end">
                    <p class="text-muted small">© 2026 Verdant Harmony. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>