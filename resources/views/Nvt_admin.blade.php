<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý Sản phẩm | Verdant Harmony</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Nvt_style.css') }}">
</head>
<body class="bg-light">

    <!-- SideNavBar Admin Component -->
    <aside class="nvt-admin-sidebar p-3 d-flex flex-column">
        <!-- Brand / User Header -->
        <div class="d-flex align-items-center gap-3 mb-4 px-2">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" 
                 class="rounded-circle object-fit-cover shadow-sm" 
                 width="40" height="40" alt="Admin Avatar">
            <div>
                <h2 class="nvt-font-title fs-6 fw-bold text-success mb-0">Admin Console</h2>
                <small class="text-muted">Verdant Harmony</small>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="nav flex-column gap-1 flex-grow-1">
            <a class="nvt-sidebar-link" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>
            <a class="nvt-sidebar-link active" href="{{ route('admin.products') }}">
                <span class="material-symbols-outlined">potted_plant</span>
                Kho hàng
            </a>
            <a class="nvt-sidebar-link" href="#">
                <span class="material-symbols-outlined">shopping_bag</span>
                Đơn hàng
            </a>
            <a class="nvt-sidebar-link" href="#">
                <span class="material-symbols-outlined">group</span>
                Khách hàng
            </a>
            <a class="nvt-sidebar-link" href="#">
                <span class="material-symbols-outlined">settings</span>
                Cài đặt
            </a>
        </nav>

        <!-- Bottom Action Logout -->
        <a class="nvt-sidebar-link text-danger mt-auto" href="{{ route('home') }}">
            <span class="material-symbols-outlined">logout</span>
            Đăng xuất
        </a>
    </aside>

    <!-- Main Content Area -->
    <main class="nvt-admin-main">
        <div class="container-fluid max-w-container-max p-0">
            
            <!-- Page Header & Actions -->
            <header class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <div>
                    <h1 class="nvt-font-title fs-2 fw-bold text-success mb-1">Quản lý Sản phẩm</h1>
                    <p class="text-muted mb-0">Quản lý danh sách cây cảnh, chậu trồng và phụ kiện trong kho.</p>
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <!-- Search Input -->
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted">
                            <span class="material-symbols-outlined fs-5">search</span>
                        </span>
                        <input type="text" class="form-control border-start-0 shadow-none" placeholder="Tìm kiếm sản phẩm...">
                    </div>
                    
                    <!-- Add Product Button -->
                    <button class="btn nvt-btn-accent d-flex align-items-center gap-2 whitespace-nowrap">
                        <span class="material-symbols-outlined">add</span>
                        <span>Thêm Mới</span>
                    </button>
                </div>
            </header>

            <!-- Alert Notification (Blade Condition) -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Product Table Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                
                <!-- Filters Header -->
                <div class="card-header bg-white py-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3 border-bottom-0">
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm rounded-pill btn-success px-3">Tất cả</button>
                        <button class="btn btn-sm rounded-pill btn-outline-secondary px-3">Đang bán</button>
                        <button class="btn btn-sm rounded-pill btn-outline-secondary px-3">Hết hàng</button>
                    </div>
                    
                    <div class="d-flex align-items-center gap-2">
                        <small class="text-muted fw-semibold">Sắp xếp:</small>
                        <select class="form-select form-select-sm border-0 bg-transparent fw-bold text-success w-auto shadow-none cursor-pointer">
                            <option selected>Mới nhất</option>
                            <option>Tên A-Z</option>
                            <option>Giá tăng dần</option>
                        </select>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="table-responsive">
                    <table class="table nvt-admin-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 80px;">ID</th>
                                <th style="width: 100px;">Hình ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Danh Mục</th>
                                <th>Giá</th>
                                <th>Trạng Thái</th>
                                <th class="text-end" style="width: 120px;">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $item)
                            <tr>
                                <td class="fw-semibold text-muted">#P00{{ $item->id }}</td>
                                <td>
                                    <img src="{{ asset('images/' . ($item->Image ?? 'default.jpg')) }}" 
                                         class="rounded-3 object-fit-cover shadow-sm" 
                                         width="48" height="48" 
                                         alt="{{ $item->ProductName }}"
                                         onerror="this.src='https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=200&q=80'">
                                </td>
                                <td>
                                    <span class="nvt-font-title fw-bold text-success">{{ $item->ProductName }}</span>
                                </td>
                                <td class="text-muted">{{ $item->CategoryName ?? 'Cây Trong Nhà' }}</td>
                                <td class="fw-semibold text-success">{{ number_format($item->Price, 0, ',', '.') }} ₫</td>
                                <td>
                                    @if(($item->Stock ?? 1) > 0)
                                        <span class="nvt-badge-in-stock d-inline-flex align-items-center gap-1">
                                            <span class="badge rounded-circle bg-success p-1"></span>
                                            Còn Hàng
                                        </span>
                                    @else
                                        <span class="nvt-badge-out-of-stock d-inline-flex align-items-center gap-1">
                                            <span class="badge rounded-circle bg-secondary p-1"></span>
                                            Hết Hàng
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="nvt-table-actions d-flex justify-content-end gap-1">
                                        <button class="btn btn-sm btn-light text-primary p-1" title="Sửa">
                                            <span class="material-symbols-outlined fs-6">edit</span>
                                        </button>
                                        <button class="btn btn-sm btn-light text-danger p-1" title="Xóa">
                                            <span class="material-symbols-outlined fs-6">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">Không có sản phẩm nào trong kho.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Card Footer Pagination -->
                <div class="card-footer bg-white py-3 px-4 border-top d-flex justify-content-between align-items-center">
                    <small class="text-muted">Hiển thị {{ count($products) }} sản phẩm</small>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">‹</a></li>
                            <li class="page-item active"><a class="page-link bg-success border-success" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-success" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-success" href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-success" href="#">›</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>