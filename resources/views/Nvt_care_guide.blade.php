<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Chăm Sóc Cây - Verdant Harmony</title>
    
    <!-- Bootstrap 5 CSS & Material Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    
    <!-- CSS Custom Chung của Dự Án -->
    <link rel="stylesheet" href="{{ asset('css/Nvt_style.css') }}">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
            color: #191c1d;
        }
        .nvt-font-title {
            font-family: 'Playfair Display', serif;
        }
        .nvt-card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .nvt-card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .nvt-badge-level {
            background-color: rgba(116, 198, 157, 0.2);
            color: #1B4332;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand nvt-font-title fw-bold text-success fs-3" href="{{ route('home') }}">Verdant Harmony</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto fw-semibold">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('products') }}">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link active text-success border-bottom border-success border-2" href="{{ route('nvt.care.guide') }}">Chăm sóc cây</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('nvt.about') }}">Giới thiệu</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    @if(Session::has('customer_id'))
                        @if((string)Session::get('customer_role') === '1')
                            <a href="{{ route('admin.products') }}" class="text-primary me-2" title="Quản trị Admin"><span class="material-symbols-outlined fs-4">admin_panel_settings</span></a>
                        @endif
                        <a href="{{ route('nvt.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger" title="Đăng xuất ({{ Session::get('customer_name') }})"><span class="material-symbols-outlined fs-4">logout</span></a>
                        <form id="logout-form" action="{{ route('nvt.logout') }}" method="POST" class="d-none">@csrf</form>
                    @else
                        <a href="{{ route('nvt.login') }}" class="text-dark" title="Đăng nhập"><span class="material-symbols-outlined fs-4">account_circle</span></a>
                    @endif
                    <a href="{{ route('nvt.cart') }}" class="text-dark"><span class="material-symbols-outlined fs-4">shopping_cart</span></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-5">
        <div class="container">
            
            <!-- Header & Search -->
            <header class="text-center mb-5">
                <h1 class="nvt-font-title fw-bold text-success display-5 mb-3">Cẩm Nang Chăm Sóc Cây</h1>
                <p class="text-muted fs-5 max-w-2xl mx-auto mb-4">Khám phá bí quyết để mang thiên nhiên vào không gian sống của bạn. Tìm kiếm hướng dẫn chăm sóc chi tiết cho từng loại cây.</p>
                
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden">
                            <span class="input-group-text bg-white border-0 ps-4">
                                <span class="material-symbols-outlined text-muted">search</span>
                            </span>
                            <input type="text" class="form-control border-0 bg-white shadow-none fs-6" placeholder="Tìm kiếm tên cây (VD: Monstera, Kim Tiền...)">
                        </div>
                    </div>
                </div>
            </header>

            <!-- Cấp độ chăm sóc -->
            <section class="mb-5">
                <div class="d-flex justify-content-between items-center mb-4 border-bottom pb-2">
                    <h2 class="nvt-font-title fw-bold text-success fs-3 m-0">Cấp độ chăm sóc</h2>
                </div>
                
                <div class="row g-4">
                    <!-- Beginner -->
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm nvt-card-hover h-100 position-relative text-white">
                            <img src="https://images.unsplash.com/photo-1545241047-6083a3684587?auto=format&fit=crop&w=600&q=80" class="card-img" style="height: 380px; object-fit: cover;" alt="Dễ chăm sóc">
                            <div class="card-img-overlay d-flex flex-column justify-content-end p-4" style="background: linear-gradient(to top, rgba(1, 45, 29, 0.85), transparent);">
                                <span class="badge nvt-badge-level align-self-start mb-2 px-3 py-2 rounded-pill">Dễ chăm sóc</span>
                                <h3 class="nvt-font-title fw-bold fs-4 mb-2">Người Mới Bắt Đầu</h3>
                                <p class="card-text text-white-50 small">Những loại cây bền bỉ, dễ sống, ít cần sự chú ý. Hoàn hảo cho người bận rộn.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Intermediate -->
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm nvt-card-hover h-100 position-relative text-white">
                            <img src="https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=600&q=80" class="card-img" style="height: 380px; object-fit: cover;" alt="Trung bình">
                            <div class="card-img-overlay d-flex flex-column justify-content-end p-4" style="background: linear-gradient(to top, rgba(1, 45, 29, 0.85), transparent);">
                                <span class="badge nvt-badge-level align-self-start mb-2 px-3 py-2 rounded-pill">Chú ý vừa phải</span>
                                <h3 class="nvt-font-title fw-bold fs-4 mb-2">Trung Bình</h3>
                                <p class="card-text text-white-50 small">Cần lịch tưới đều đặn và ánh sáng phù hợp. Dành cho người đã có chút kinh nghiệm.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Advanced -->
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm nvt-card-hover h-100 position-relative text-white">
                            <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=600&q=80" class="card-img" style="height: 380px; object-fit: cover;" alt="Nâng cao">
                            <div class="card-img-overlay d-flex flex-column justify-content-end p-4" style="background: linear-gradient(to top, rgba(1, 45, 29, 0.85), transparent);">
                                <span class="badge nvt-badge-level align-self-start mb-2 px-3 py-2 rounded-pill">Đòi hỏi kỹ thuật</span>
                                <h3 class="nvt-font-title fw-bold fs-4 mb-2">Nâng Cao</h3>
                                <p class="card-text text-white-50 small">Yêu cầu độ ẩm cao, ánh sáng khắt khe. Thử thách thú vị cho người yêu cây.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Detailed Plant Cards -->
            <section class="mb-5">
                <h2 class="nvt-font-title fw-bold text-success fs-3 text-center mb-4">Hướng Dẫn Nổi Bật</h2>
                
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-lg-6">
                        <div class="card border-0 rounded-4 p-3 shadow-sm nvt-card-hover h-100">
                            <div class="row g-3 h-100 align-items-center">
                                <div class="col-sm-5">
                                    <img src="https://images.unsplash.com/photo-1592150621744-aca64f48394a?auto=format&fit=crop&w=500&q=80" class="img-fluid rounded-3 w-100 h-100 object-fit-cover" style="min-height: 200px;" alt="Cỏ Đồng Tiền">
                                </div>
                                <div class="col-sm-7 d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h3 class="nvt-font-title fw-bold fs-5 text-success m-0">Cỏ Đồng Tiền</h3>
                                            <span class="badge nvt-badge-level rounded-pill">Pilea</span>
                                        </div>
                                        <p class="text-muted small mb-3">Loài cây mang ý nghĩa phong thủy tốt lành, lá tròn trịa đáng yêu. Phù hợp trang trí bàn làm việc.</p>
                                    </div>
                                    
                                    <div class="bg-light p-2 rounded-3 text-center">
                                        <div class="row g-1 text-muted" style="font-size: 11px;">
                                            <div class="col-4 border-end">
                                                <span class="material-symbols-outlined fs-6 text-warning d-block">light_mode</span>
                                                <span>Sáng gián tiếp</span>
                                            </div>
                                            <div class="col-4 border-end">
                                                <span class="material-symbols-outlined fs-6 text-success d-block">water_drop</span>
                                                <span>1 lần/tuần</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="material-symbols-outlined fs-6 text-info d-block">air</span>
                                                <span>Ẩm trung bình</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-6">
                        <div class="card border-0 rounded-4 p-3 shadow-sm nvt-card-hover h-100">
                            <div class="row g-3 h-100 align-items-center">
                                <div class="col-sm-5">
                                    <img src="https://images.unsplash.com/photo-1597055181300-e3633a207519?auto=format&fit=crop&w=500&q=80" class="img-fluid rounded-3 w-100 h-100 object-fit-cover" style="min-height: 200px;" alt="Trầu Bà Vàng">
                                </div>
                                <div class="col-sm-7 d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h3 class="nvt-font-title fw-bold fs-5 text-success m-0">Trầu Bà Vàng</h3>
                                            <span class="badge nvt-badge-level rounded-pill">Epipremnum</span>
                                        </div>
                                        <p class="text-muted small mb-3">Cây leo cực kỳ dễ trồng, lọc không khí tuyệt vời. Có thể trồng thủy sinh hoặc đất.</p>
                                    </div>
                                    
                                    <div class="bg-light p-2 rounded-3 text-center">
                                        <div class="row g-1 text-muted" style="font-size: 11px;">
                                            <div class="col-4 border-end">
                                                <span class="material-symbols-outlined fs-6 text-warning d-block">wb_twilight</span>
                                                <span>Sáng yếu/TB</span>
                                            </div>
                                            <div class="col-4 border-end">
                                                <span class="material-symbols-outlined fs-6 text-success d-block">water_drop</span>
                                                <span>Khi đất khô</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="material-symbols-outlined fs-6 text-info d-block">air</span>
                                                <span>Ẩm thấp</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-warning text-white px-4 py-2 rounded-pill fw-semibold shadow-sm">Xem tất cả thư viện cây</button>
                </div>
            </section>

            <!-- Common Issues -->
            <section class="bg-white rounded-4 p-4 p-md-5 shadow-sm">
                <h2 class="nvt-font-title fw-bold text-success fs-3 text-center mb-2">Vấn Đề Thường Gặp & Cách Khắc Phục</h2>
                <p class="text-muted text-center max-w-2xl mx-auto mb-4">Đừng hoảng sợ khi cây của bạn có dấu hiệu bất thường. Dưới đây là cách chuẩn bệnh và xử lý.</p>
                
                <div class="row g-4">
                    <!-- Issue 1 -->
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light d-flex gap-3 h-100">
                            <div class="rounded-circle bg-danger bg-opacity-10 text-danger p-3 d-flex align-items-center justify-content-center shrink-0" style="width: 50px; height: 50px;">
                                <span class="material-symbols-outlined">eco</span>
                            </div>
                            <div>
                                <h4 class="fw-bold fs-6 text-success mb-1">Lá chuyển vàng</h4>
                                <p class="text-muted small mb-2">Nguyên nhân phổ biến nhất là do tưới quá nhiều nước gây úng rễ, hoặc thiếu ánh sáng kéo dài.</p>
                                <p class="text-success fw-semibold small mb-0 d-flex align-items-center gap-1">
                                    <span class="material-symbols-outlined fs-6">build</span> Giải pháp: Giảm tần suất tưới, kiểm tra lỗ thoát nước.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Issue 2 -->
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light d-flex gap-3 h-100">
                            <div class="rounded-circle bg-warning bg-opacity-10 text-warning p-3 d-flex align-items-center justify-content-center shrink-0" style="width: 50px; height: 50px;">
                                <span class="material-symbols-outlined">dry</span>
                            </div>
                            <div>
                                <h4 class="fw-bold fs-6 text-success mb-1">Rìa lá khô cháy</h4>
                                <p class="text-muted small mb-2">Thường do độ ẩm không khí quá thấp, tiếp xúc trực tiếp với gió điều hòa, hoặc tưới nước không đều.</p>
                                <p class="text-success fw-semibold small mb-0 d-flex align-items-center gap-1">
                                    <span class="material-symbols-outlined fs-6">build</span> Giải pháp: Phun sương, sử dụng máy tạo ẩm, dời xa luồng gió.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center text-muted small">
            <p class="mb-0">© 2026 Verdant Harmony. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>