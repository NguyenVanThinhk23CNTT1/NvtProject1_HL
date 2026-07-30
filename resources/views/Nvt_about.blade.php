<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Giới Thiệu - Verdant Harmony</title>
    
    <!-- Bootstrap 5 CSS & Icons -->
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
        .nvt-bg-hero {
            background-image: linear-gradient(to bottom, rgba(248, 249, 250, 0.3), rgba(248, 249, 250, 0.95)), 
                              url('https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
        }
        .nvt-timeline-border {
            border-left: 2px solid #c1c8c2;
        }
        .nvt-timeline-dot {
            width: 16px;
            height: 16px;
            background-color: #1b4332;
            border-radius: 50%;
            position: absolute;
            left: -9px;
            top: 24px;
        }
        .nvt-card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .nvt-card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
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
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('nvt.care.guide') }}">Chăm sóc cây</a></li>
                    <li class="nav-item"><a class="nav-link active text-success border-bottom border-success border-2" href="{{ route('nvt.about') }}">Giới thiệu</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.products') }}" class="text-dark"><span class="material-symbols-outlined fs-4">person</span></a>
                    <a href="{{ route('nvt.cart') }}" class="text-dark"><span class="material-symbols-outlined fs-4">shopping_cart</span></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        
        <!-- Hero Section -->
        <section class="nvt-bg-hero py-5 text-center min-vh-50 d-flex align-items-center justify-content-center">
            <div class="container py-5 my-3">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="nvt-font-title fw-bold text-success display-4 mb-3">Câu Chuyện Của Chúng Tôi</h1>
                        <p class="text-muted fs-5 lead">
                            Tại Verdant Harmony, chúng tôi tin rằng thiên nhiên là liều thuốc chữa lành tĩnh lặng nhất. Hành trình của chúng tôi bắt đầu từ mong muốn mang sự yên bình của rừng rậm vào từng góc nhỏ không gian sống thành thị.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Values (Bento Grid) -->
        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Sứ mệnh -->
                    <div class="col-lg-8">
                        <div class="bg-light p-4 p-md-5 rounded-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-center">
                            <span class="material-symbols-outlined text-success fs-1 mb-2">eco</span>
                            <h2 class="nvt-font-title fw-bold text-success fs-2 mb-3">Sứ Mệnh</h2>
                            <p class="text-muted fs-6 mb-0">
                                Chúng tôi cam kết cung cấp những mầm xanh khỏe mạnh nhất, được tuyển chọn kỹ lưỡng, cùng với kiến thức chăm sóc chuyên sâu, giúp bạn dễ dàng tạo ra một hệ sinh thái nhỏ, nuôi dưỡng tâm hồn ngay trong chính ngôi nhà của mình.
                            </p>
                        </div>
                    </div>

                    <!-- Bền vững -->
                    <div class="col-lg-4">
                        <div class="bg-success text-white p-4 p-md-5 rounded-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-center">
                            <span class="material-symbols-outlined fs-1 mb-2 text-warning">compost</span>
                            <h3 class="nvt-font-title fw-bold fs-3 mb-2">Bền Vững</h3>
                            <p class="text-white-50 mb-0">Thân thiện trong từng chiếc chậu đất nung và giá thể hữu cơ tự nhiên.</p>
                        </div>
                    </div>

                    <!-- Sự thư thái -->
                    <div class="col-lg-4">
                        <div class="bg-light p-4 rounded-4 h-100 shadow-sm border-0 d-flex flex-column justify-content-center">
                            <span class="material-symbols-outlined text-success fs-1 mb-2">spa</span>
                            <h3 class="nvt-font-title fw-bold text-success fs-4 mb-2">Thư Thái</h3>
                            <p class="text-muted small mb-0">Mang đến sự tĩnh tại, nhẹ nhàng qua từng khoảng xanh không gian.</p>
                        </div>
                    </div>

                    <!-- Chuyên môn -->
                    <div class="col-lg-8">
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm text-white position-relative min-vh-30">
                            <img src="https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=1000&q=80" class="card-img h-100 object-fit-cover" style="min-height: 220px;" alt="Chuyên môn">
                            <div class="card-img-overlay d-flex flex-column justify-content-center p-4 p-md-5" style="background: linear-gradient(to right, rgba(1, 45, 29, 0.9), rgba(1, 45, 29, 0.4));">
                                <span class="material-symbols-outlined text-warning fs-1 mb-2">school</span>
                                <h3 class="nvt-font-title fw-bold fs-3 mb-2">Chuyên Môn Thực Vật</h3>
                                <p class="text-white-50 max-w-lg mb-0">Đội ngũ chuyên gia giàu kinh nghiệm luôn sẵn sàng đồng hành cùng bạn trên mọi chặng đường chăm sóc cây.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline -->
        <section class="py-5 bg-white">
            <div class="container max-w-2xl">
                <h2 class="nvt-font-title fw-bold text-success fs-2 text-center mb-5">Hành Trình Trưởng Thành</h2>
                
                <div class="position-relative nvt-timeline-border ms-3 ms-md-auto ps-4">
                    <!-- 2021 -->
                    <div class="position-relative mb-5">
                        <div class="nvt-timeline-dot"></div>
                        <div class="bg-light p-4 rounded-4 shadow-sm">
                            <span class="badge bg-success mb-2 px-3 py-1">Năm 2021</span>
                            <h4 class="nvt-font-title fw-bold text-success fs-5 mb-2">Hạt Giống Đầu Tiên</h4>
                            <p class="text-muted small mb-0">Bắt đầu từ một vườn ươm nhỏ tại ban công, lan tỏa tình yêu cây cỏ đến những người bạn xung quanh.</p>
                        </div>
                    </div>

                    <!-- 2023 -->
                    <div class="position-relative mb-5">
                        <div class="nvt-timeline-dot"></div>
                        <div class="bg-light p-4 rounded-4 shadow-sm">
                            <span class="badge bg-success mb-2 px-3 py-1">Năm 2023</span>
                            <h4 class="nvt-font-title fw-bold text-success fs-5 mb-2">Vươn Cành Cửa Hàng Đầu Tiên</h4>
                            <p class="text-muted small mb-0">Mở cửa không gian xanh Verdant Harmony đầu tiên, trở thành chốn dừng chân bình yên giữa lòng phố thị.</p>
                        </div>
                    </div>

                    <!-- Present -->
                    <div class="position-relative">
                        <div class="nvt-timeline-dot"></div>
                        <div class="bg-light p-4 rounded-4 shadow-sm">
                            <span class="badge bg-warning text-dark mb-2 px-3 py-1 fw-bold">Hiện Tại</span>
                            <h4 class="nvt-font-title fw-bold text-success fs-5 mb-2">Hệ Sinh Thái Hoàn Thiện</h4>
                            <p class="text-muted small mb-0">Phát triển dịch vụ chăm sóc và thiết kế mảng xanh trọn gói, kiến tạo không gian sống bền vững.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="nvt-font-title fw-bold text-success fs-2 mb-2">Những Người Ươm Mầm</h2>
                    <p class="text-muted">Đội ngũ đứng sau không gian xanh Verdant Harmony</p>
                </div>

                <div class="row justify-content-center g-4">
                    <!-- Founder 1 -->
                    <div class="col-md-5 col-lg-4 text-center">
                        <div class="card border-0 bg-transparent nvt-card-hover">
                            <div class="mx-auto mb-3 overflow-hidden rounded-circle shadow-sm" style="width: 180px; height: 180px;">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80" class="w-100 h-100 object-fit-cover" alt="Linh Đan">
                            </div>
                            <h3 class="nvt-font-title fw-bold text-success fs-4 mb-1">Linh Đan</h3>
                            <p class="text-success fw-semibold small mb-2">Nhà Sáng Lập & Chuyên Gia Thực Vật</p>
                            <p class="text-muted small px-3">Người thổi hồn vào từng mầm cây với niềm đam mê sinh học bất tận.</p>
                        </div>
                    </div>

                    <!-- Founder 2 -->
                    <div class="col-md-5 col-lg-4 text-center">
                        <div class="card border-0 bg-transparent nvt-card-hover">
                            <div class="mx-auto mb-3 overflow-hidden rounded-circle shadow-sm" style="width: 180px; height: 180px;">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80" class="w-100 h-100 object-fit-cover" alt="Hoàng Nam">
                            </div>
                            <h3 class="nvt-font-title fw-bold text-success fs-4 mb-1">Hoàng Nam</h3>
                            <p class="text-success fw-semibold small mb-2">Đồng Sáng Lập & Thiết Kế Không Gian</p>
                            <p class="text-muted small px-3">Kiến tạo sự hài hòa giữa kiến trúc hiện đại và thiên nhiên tĩnh lặng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5 bg-success text-white text-center">
            <div class="container py-3">
                <h2 class="nvt-font-title fw-bold fs-2 mb-3">Bắt Đầu Không Gian Xanh Của Bạn</h2>
                <p class="text-white-50 max-w-2xl mx-auto mb-4 fs-6">Hãy để chúng tôi đồng hành cùng bạn trên hành trình mang thiên nhiên vào cuộc sống thường nhật.</p>
                <a href="{{ route('products') }}" class="btn btn-warning text-white px-5 py-3 rounded-pill fw-bold shadow-sm">Khám Phá Cửa Hàng</a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-4">
        <div class="container text-center text-muted small">
            <p class="mb-0">© 2026 Verdant Harmony. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>