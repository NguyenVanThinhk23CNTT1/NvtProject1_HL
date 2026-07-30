<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - Verdant Harmony</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Nvt_style.css') }}">
</head>
<body class="bg-light text-dark d-flex flex-column min-vh-100">

    <!-- Header Component / Thanh điều hướng Nav -->
    <nav class="navbar navbar-expand-md bg-white navbar-light sticky-top shadow-sm py-3">
        <div class="container max-w-container-max">
            <a class="navbar-brand nvt-font-title fs-3 fw-bold text-success" href="{{ route('home') }}">Verdant Harmony</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nvtNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nvtNavbar">
                <!-- Việt hóa Menu chính -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-md fw-medium">
                    <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('products') }}">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('nvt.care.guide') }}">Chăm sóc cây</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="{{ route('nvt.about') }}">Giới thiệu</a></li>
                </ul>
                
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('nvt.cart') }}" class="btn position-relative p-1 text-success">
                        <span class="material-symbols-outlined fs-4">shopping_cart</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $totalQuantity ?? count($cartItems ?? []) }}
                        </span>
                    </a>
                    <a href="{{ route('admin.products') }}" class="btn p-1 text-success" title="Quản trị Admin">
                        <span class="material-symbols-outlined fs-4">person</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính Giỏ hàng -->
    <main class="flex-grow-1 py-5">
        <div class="container max-w-container-max">
            
            <!-- Tiêu đề trang -->
            <header class="mb-4">
                <h1 class="nvt-font-title fs-1 fw-bold text-success mb-2">Giỏ hàng của bạn</h1>
                <p class="text-muted fs-5 mb-0">
                    {{ $totalQuantity ?? count($cartItems ?? []) }} sản phẩm đang chờ để làm xanh không gian của bạn.
                </p>
            </header>

            <div class="row g-4 items-start">
                
                <!-- Danh sách sản phẩm trong giỏ -->
                <div class="col-lg-8">
                    <div class="d-flex flex-column gap-3">
                        
                        @forelse($cartItems as $item)
                        <!-- Thẻ sản phẩm đơn lẻ -->
                        <div class="nvt-cart-item d-flex flex-column flex-sm-row gap-3 align-items-center align-items-sm-start">
                            <div class="nvt-cart-img-wrapper">
                                <img src="{{ asset('images/' . ($item->Image ?? 'default.jpg')) }}" 
                                     alt="{{ $item->ProductName }}"
                                     onerror="this.src='https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=300&q=80'">
                            </div>
                            
                            <div class="flex-grow-1 d-flex flex-column justify-content-between w-100 h-100">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <h3 class="nvt-font-title fs-5 fw-bold text-success mb-1">{{ $item->ProductName }}</h3>
                                        <p class="text-muted small mb-0">{{ $item->Attributes ?? 'Chậu mặc định' }}</p>
                                    </div>
                                    <form action="{{ route('nvt.cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-muted p-0 text-decoration-none hover-danger" title="Xóa sản phẩm">
                                            <span class="material-symbols-outlined">close</span>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-end mt-3">
                                    <!-- Nút tăng giảm số lượng -->
                                    <div class="nvt-qty-control">
                                        <button type="button" class="nvt-qty-btn">
                                            <span class="material-symbols-outlined fs-6">remove</span>
                                        </button>
                                        <input type="text" class="nvt-qty-input" value="{{ $item->Quantity }}" readonly>
                                        <button type="button" class="nvt-qty-btn">
                                            <span class="material-symbols-outlined fs-6">add</span>
                                        </button>
                                    </div>
                                    
                                    <!-- Thành tiền món -->
                                    <p class="nvt-font-title fs-5 fw-bold text-success mb-0">
                                        {{ number_format($item->Price * $item->Quantity, 0, ',', '.') }} ₫
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- Trạng thái giỏ hàng trống -->
                        <div class="bg-white rounded-4 p-5 text-center shadow-sm">
                            <span class="material-symbols-outlined fs-1 text-muted mb-3">shopping_basket</span>
                            <h4 class="fw-bold text-muted">Giỏ hàng trống</h4>
                            <p class="text-muted">Chưa có sản phẩm nào trong giỏ hàng của bạn.</p>
                            <a href="{{ route('products') }}" class="btn btn-success rounded-pill px-4">Tiếp tục mua sắm</a>
                        </div>
                        @endforelse

                    </div>
                </div>

                <!-- Thẻ tóm tắt hóa đơn -->
                <div class="col-lg-4">
                    <div class="nvt-summary-card sticky-top" style="top: 100px;">
                        <h2 class="nvt-font-title fs-4 fw-bold text-success mb-4">Tóm tắt đơn hàng</h2>
                        
                        <div class="d-flex flex-column gap-2 mb-4">
                            <div class="d-flex justify-content-between text-muted">
                                <span>Tạm tính ({{ $totalQuantity ?? 0 }} sản phẩm)</span>
                                <span>{{ number_format($subtotal ?? 0, 0, ',', '.') }} ₫</span>
                            </div>
                            <div class="d-flex justify-content-between text-muted">
                                <span>Phí vận chuyển</span>
                                <span>{{ number_format($shippingFee ?? 0, 0, ',', '.') }} ₫</span>
                            </div>
                            
                            <hr class="my-2 text-muted opacity-25">
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="nvt-font-title fs-5 fw-bold text-success">Tổng cộng</span>
                                <span class="nvt-font-title fs-4 fw-bold text-success">{{ number_format($grandTotal ?? 0, 0, ',', '.') }} ₫</span>
                            </div>
                            <small class="text-end text-muted">Đã bao gồm VAT nếu có</small>
                        </div>

                        <!-- Chuyển hướng sang trang Thanh toán -->
                        <a href="{{ route('nvt.checkout') }}" class="btn nvt-btn-checkout d-flex align-items-center justify-content-center gap-2">
                            <span>Tiến hành thanh toán</span>
                            <span class="material-symbols-outlined fs-5">arrow_forward</span>
                        </a>

                        <div class="mt-3 d-flex align-items-center justify-content-center gap-2 text-muted small">
                            <span class="material-symbols-outlined fs-6">lock</span>
                            <span>Thanh toán an toàn & bảo mật</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer Việt hóa -->
    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container max-w-container-max d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div>
                <p class="nvt-font-title fs-5 fw-bold text-success mb-1">Verdant Harmony</p>
                <small class="text-muted">© 2026 Verdant Harmony. Mang thiên nhiên thanh bình vào không gian sống của bạn.</small>
            </div>
            <div class="d-flex flex-wrap gap-3 small text-muted">
                <a href="#" class="text-decoration-none text-muted">Chính sách bảo mật</a>
                <a href="#" class="text-decoration-none text-muted">Giao hàng & Đổi trả</a>
                <a href="#" class="text-decoration-none text-muted">Bán buôn / Đại lý</a>
                <a href="#" class="text-decoration-none text-muted">Liên hệ chúng tôi</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>