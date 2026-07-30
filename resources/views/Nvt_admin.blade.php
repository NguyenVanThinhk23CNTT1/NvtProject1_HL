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
        <div class="nav flex-column gap-1 flex-grow-1" id="nvt-admin-tabs" role="tablist">
            <a class="nvt-sidebar-link" id="nav-dashboard-tab" data-bs-toggle="tab" href="#nav-dashboard" role="tab" style="cursor: pointer;">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>
            <a class="nvt-sidebar-link active" id="nav-products-tab" data-bs-toggle="tab" href="#nav-products" role="tab" style="cursor: pointer;">
                <span class="material-symbols-outlined">potted_plant</span>
                Kho hàng
            </a>
            <a class="nvt-sidebar-link" id="nav-categories-tab" data-bs-toggle="tab" href="#nav-categories" role="tab" style="cursor: pointer;">
                <span class="material-symbols-outlined">category</span>
                Danh Mục
            </a>
            <a class="nvt-sidebar-link" id="nav-orders-tab" data-bs-toggle="tab" href="#nav-orders" role="tab" style="cursor: pointer;">
                <span class="material-symbols-outlined">shopping_bag</span>
                Đơn hàng
            </a>
            <a class="nvt-sidebar-link" id="nav-customers-tab" data-bs-toggle="tab" href="#nav-customers" role="tab" style="cursor: pointer;">
                <span class="material-symbols-outlined">group</span>
                Khách hàng
            </a>
        </div>

        <!-- Bottom Action Logout -->
        <a class="nvt-sidebar-link text-danger mt-auto" href="{{ route('home') }}">
            <span class="material-symbols-outlined">logout</span>
            Đăng xuất
        </a>
    </aside>

    <!-- Main Content Area -->
    <main class="nvt-admin-main tab-content" id="nvt-admin-tabsContent">
        
        <!-- TAB: KHO SẢN PHẨM -->
        <div class="tab-pane fade show active container-fluid max-w-container-max p-0" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab">
            
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
                    <button class="btn nvt-btn-accent d-flex align-items-center gap-2 whitespace-nowrap" 
                            data-bs-toggle="modal" data-bs-target="#nvtProductModal" onclick="nvtOpenAddModal()">
                        <span class="material-symbols-outlined">add</span>
                        <span>Thêm Mới</span>
                    </button>
                </div>
            </header>

            <!-- Alert Notification -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
                                <th>Tồn Kho</th>
                                <th>Trạng Thái</th>
                                <th class="text-end" style="width: 120px;">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $item)
                            <tr>
                                <td class="fw-semibold text-muted">#P00{{ $item->ProductId }}</td>
                                <td>
                                    <img src="{{ $item->Image ? asset('images/' . $item->Image) : 'https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=200&q=80' }}" 
                                         class="rounded-3 object-fit-cover shadow-sm" 
                                         width="48" height="48" 
                                         alt="{{ $item->ProductName }}"
                                         onerror="this.src='https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=200&q=80'">
                                </td>
                                <td>
                                    <span class="nvt-font-title fw-bold text-success">{{ $item->ProductName }}</span>
                                </td>
                                <td class="text-muted">{{ $item->CategoryName }}</td>
                                <td class="fw-semibold text-success">{{ number_format($item->Price, 0, ',', '.') }} ₫</td>
                                <td class="fw-semibold">{{ $item->Stock }}</td>
                                <td>
                                    @if($item->Stock > 0)
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
                                        <!-- Nút Sửa -->
                                        <button class="btn btn-sm btn-light text-primary p-1" title="Sửa"
                                            data-bs-toggle="modal" data-bs-target="#nvtProductModal"
                                            onclick="nvtOpenEditModal({{ $item->ProductId }}, '{{ addslashes($item->ProductName) }}', {{ $item->CategoryId ?? 'null' }}, {{ $item->Price }}, {{ $item->StockQuantity }}, '{{ addslashes($item->Description ?? '') }}', '')">
                                            <span class="material-symbols-outlined fs-6">edit</span>
                                        </button>
                                        <!-- Nút Xóa -->
                                        <form action="{{ route('admin.products.destroy', $item->ProductId) }}" method="POST" 
                                              onsubmit="return confirm('⚠️ Bạn có chắc muốn xóa sản phẩm &quot;{{ $item->ProductName }}&quot; không?\nHành động này không thể hoàn tác!')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger p-1" title="Xóa">
                                                <span class="material-symbols-outlined fs-6">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <span class="material-symbols-outlined fs-1 d-block mb-2 text-success opacity-50">inventory_2</span>
                                    Chưa có sản phẩm nào. Hãy bấm <strong>"Thêm Mới"</strong> để bắt đầu!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-white py-3 px-4 border-top d-flex justify-content-between align-items-center">
                    <small class="text-muted">Hiển thị {{ count($products) }} sản phẩm</small>
                </div>

            </div>
        </div>
        <!-- END TAB: SẢN PHẨM -->

        <!-- TAB: DANH MỤC -->
        <div class="tab-pane fade container-fluid max-w-container-max p-0" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab">
            <header class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <div>
                    <h1 class="nvt-font-title fs-2 fw-bold text-success mb-1">Quản lý Danh mục</h1>
                    <p class="text-muted mb-0">Quản lý các danh sách phân loại cây trồng.</p>
                </div>
                <button class="btn nvt-btn-accent d-flex align-items-center gap-2 whitespace-nowrap" data-bs-toggle="modal" data-bs-target="#nvtCategoryModal" onclick="nvtOpenAddCategoryModal()">
                    <span class="material-symbols-outlined">add</span>
                    <span>Thêm Danh mục</span>
                </button>
            </header>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table nvt-admin-table mb-0">
                        <thead>
                            <tr>
                                <th style="width: 80px;">ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Mô tả</th>
                                <th class="text-end" style="width: 120px;">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                            <tr>
                                <td class="fw-semibold text-muted">#C0{{ $cat->CategoryId }}</td>
                                <td><span class="nvt-font-title fw-bold text-success">{{ $cat->CategoryName }}</span></td>
                                <td class="text-muted">{{ $cat->Description ?? 'Không có mô tả' }}</td>
                                <td class="text-end">
                                    <div class="nvt-table-actions d-flex justify-content-end gap-1">
                                        <button class="btn btn-sm btn-light text-primary p-1" title="Sửa" data-bs-toggle="modal" data-bs-target="#nvtCategoryModal" onclick="nvtOpenEditCategoryModal({{ $cat->CategoryId }}, '{{ addslashes($cat->CategoryName) }}', '{{ addslashes($cat->Description ?? '') }}')">
                                            <span class="material-symbols-outlined fs-6">edit</span>
                                        </button>
                                        <form action="{{ route('admin.categories.destroy', $cat->CategoryId) }}" method="POST" onsubmit="return confirm('⚠️ Chắc chắn xóa danh mục này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger p-1"><span class="material-symbols-outlined fs-6">delete</span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5">Chưa có danh mục nào.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END TAB: DANH MỤC -->

        <!-- TAB: THỐNG KÊ (DASHBOARD) -->
        <div class="tab-pane fade container-fluid max-w-container-max p-0" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
            <header class="mb-4">
                <h1 class="nvt-font-title fs-2 fw-bold text-success mb-1">Thống Kê Tổng Quan</h1>
            </header>
            
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                        <span class="material-symbols-outlined fs-1 text-primary mb-2">potted_plant</span>
                        <h3 class="fw-bold">{{ count($products) }}</h3>
                        <p class="text-muted mb-0">Tổng Sản Phẩm</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                        <span class="material-symbols-outlined fs-1 text-success mb-2">shopping_bag</span>
                        <h3 class="fw-bold">{{ count($orders ?? []) }}</h3>
                        <p class="text-muted mb-0">Tổng Đơn Hàng</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                        <span class="material-symbols-outlined fs-1 text-info mb-2">group</span>
                        <h3 class="fw-bold">{{ count($customers ?? []) }}</h3>
                        <p class="text-muted mb-0">Khách Hàng</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB: DASHBOARD -->

        <!-- TAB: ĐƠN HÀNG -->
        <div class="tab-pane fade container-fluid max-w-container-max p-0" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
            <header class="mb-4">
                <h1 class="nvt-font-title fs-2 fw-bold text-success mb-1">Lịch sử Đơn hàng</h1>
            </header>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table nvt-admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Mã ĐH</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders ?? [] as $ord)
                            <tr>
                                <td>#ORD0{{ $ord->OrderId }}</td>
                                <td>{{ $ord->OrderDate }}</td>
                                <td class="fw-bold text-success">{{ number_format($ord->TotalAmount, 0, ',', '.') }} ₫</td>
                                <td><span class="badge bg-secondary">{{ $ord->OrderStatus }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5">Chưa có đơn hàng nào.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END TAB: ĐƠN HÀNG -->
        
        <!-- TAB: KHÁCH HÀNG -->
        <div class="tab-pane fade container-fluid max-w-container-max p-0" id="nav-customers" role="tabpanel" aria-labelledby="nav-customers-tab">
            <header class="mb-4">
                <h1 class="nvt-font-title fs-2 fw-bold text-success mb-1">Thông tin Khách hàng</h1>
            </header>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table nvt-admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Mã KH</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers ?? [] as $cus)
                            <tr>
                                <td>#CUS0{{ $cus->CustomerId }}</td>
                                <td class="fw-bold">{{ $cus->FullName }}</td>
                                <td>{{ $cus->Email }}</td>
                                <td>{{ $cus->Phone }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5">Chưa có khách hàng nào.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END TAB: KHÁCH HÀNG -->

    </main>

    <!-- Modal Thêm/Sửa Sản phẩm -->
    <div class="modal fade" id="nvtProductModal" tabindex="-1" aria-labelledby="nvtProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title nvt-font-title fw-bold text-success" id="nvtProductModalLabel">Thêm Sản phẩm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nvtProductForm" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="nvtFormMethod" value="POST">

                        <div class="mb-3">
                            <label for="nvtProductName" class="form-label fw-semibold">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nvtProductName" name="ProductName" placeholder="VD: Monstera Deliciosa" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label for="nvtProductCategory" class="form-label fw-semibold">Danh mục</label>
                                <select class="form-select" id="nvtProductCategory" name="CategoryId">
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->CategoryId }}">{{ $cat->CategoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="nvtProductPrice" class="form-label fw-semibold">Giá (₫) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="nvtProductPrice" name="Price" placeholder="450000" required>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label for="nvtProductStock" class="form-label fw-semibold">Tồn kho <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="nvtProductStock" name="StockQuantity" placeholder="10" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nvtProductDesc" class="form-label fw-semibold">Mô tả</label>
                            <textarea class="form-control" id="nvtProductDesc" name="Description" rows="2" placeholder="Mô tả ngắn về sản phẩm..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nvtProductImage" class="form-label fw-semibold">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="nvtProductImage" name="Image" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-end gap-2 pt-2">
                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-success rounded-pill px-4 d-flex align-items-center gap-1">
                                <span class="material-symbols-outlined fs-6">save</span>
                                <span id="nvtSaveBtnText">Thêm sản phẩm</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm/Sửa Danh Mục -->
    <div class="modal fade" id="nvtCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title nvt-font-title fw-bold text-success" id="nvtCategoryModalLabel">Thêm Danh mục mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nvtCategoryForm" method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <input type="hidden" name="_method" id="nvtCatFormMethod" value="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nvtCategoryName" name="CategoryName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mô tả</label>
                            <textarea class="form-control" id="nvtCategoryDesc" name="Description" rows="2"></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2 pt-2">
                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-success rounded-pill px-4 d-flex align-items-center gap-1">
                                <span class="material-symbols-outlined fs-6">save</span>
                                <span id="nvtSaveCatBtnText">Thêm danh mục</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Admin CRUD JS -->
    <script>
        // Mở modal ở chế độ THÊM MỚI
        function nvtOpenAddModal() {
            document.getElementById('nvtProductModalLabel').textContent = 'Thêm Sản phẩm mới';
            document.getElementById('nvtSaveBtnText').textContent = 'Thêm sản phẩm';
            document.getElementById('nvtProductForm').action = '{{ route("admin.products.store") }}';
            document.getElementById('nvtFormMethod').value = 'POST';
            document.getElementById('nvtProductForm').reset();
            document.getElementById('nvtFormMethod').value = 'POST'; // reset lại sau form.reset
        }

        // Mở modal ở chế độ SỬA — điền sẵn dữ liệu
        function nvtOpenEditModal(id, name, catId, price, stock, desc, badge) {
            document.getElementById('nvtProductModalLabel').textContent = 'Chỉnh sửa sản phẩm';
            document.getElementById('nvtSaveBtnText').textContent = 'Lưu thay đổi';
            document.getElementById('nvtProductForm').action = '/admin/products/' + id;
            document.getElementById('nvtFormMethod').value = 'PUT';
            document.getElementById('nvtProductName').value = name;
            document.getElementById('nvtProductPrice').value = price;
            document.getElementById('nvtProductStock').value = stock;
            document.getElementById('nvtProductDesc').value = desc;
            
            // Set danh mục
            const catSelect = document.getElementById('nvtProductCategory');
            catSelect.value = catId ? String(catId) : '';
        }

        // Mở modal Danh mục ở chế độ THÊM MỚI
        function nvtOpenAddCategoryModal() {
            document.getElementById('nvtCategoryModalLabel').textContent = 'Thêm Danh mục mới';
            document.getElementById('nvtSaveCatBtnText').textContent = 'Thêm danh mục';
            document.getElementById('nvtCategoryForm').action = '{{ route("admin.categories.store") }}';
            document.getElementById('nvtCatFormMethod').value = 'POST';
            document.getElementById('nvtCategoryForm').reset();
            document.getElementById('nvtCatFormMethod').value = 'POST';
        }

        // Mở modal Danh mục ở chế độ SỬA
        function nvtOpenEditCategoryModal(id, name, desc) {
            document.getElementById('nvtCategoryModalLabel').textContent = 'Chỉnh sửa Danh mục';
            document.getElementById('nvtSaveCatBtnText').textContent = 'Lưu thay đổi';
            document.getElementById('nvtCategoryForm').action = '/admin/categories/' + id;
            document.getElementById('nvtCatFormMethod').value = 'PUT';
            document.getElementById('nvtCategoryName').value = name;
            document.getElementById('nvtCategoryDesc').value = desc;
        }
    </script>
</body>
</html>