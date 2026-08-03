<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Đăng ký - Verdant Harmony</title>
    <!-- Tailwind CSS v3 CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts for a clean modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <style data-purpose="typography">
        body {
            font-family: 'Inter', sans-serif;
        }
        .brand-title {
            font-family: serif; 
        }
    </style>
    <style data-purpose="custom-colors">
        :root {
            --brand-green: #2d7a4d;
            --brand-green-hover: #24633e;
            --bg-soft: #f8fafc;
        }
        .bg-brand-green { background-color: var(--brand-green); }
        .text-brand-green { color: var(--brand-green); }
        .hover-bg-brand-green:hover { background-color: var(--brand-green-hover); }
    </style>
</head>
<body class="bg-[#f0f2f5] min-h-screen flex flex-col">
<!-- BEGIN: MainHeader -->
<header class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between sticky top-0 z-50">
    <div class="flex items-center gap-2">
        <a href="{{ route('home') }}" class="brand-title text-2xl font-bold text-brand-green text-decoration-none">Verdant Harmony</a>
    </div>
    <nav class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
        <a class="hover:text-brand-green transition-colors" href="{{ route('home') }}">Trang chủ</a>
        <a class="hover:text-brand-green transition-colors" href="{{ route('products') }}">Sản phẩm</a>
        <a class="hover:text-brand-green transition-colors" href="{{ route('nvt.care.guide') }}">Chăm sóc cây</a>
        <a class="hover:text-brand-green transition-colors" href="{{ route('nvt.about') }}">Giới thiệu</a>
    </nav>
    <div class="flex items-center gap-4 text-gray-600">
        <button class="p-2 hover:bg-gray-100 rounded-full" data-purpose="search-icon">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
        </button>
        <a href="{{ route('nvt.cart') }}" class="p-2 hover:bg-gray-100 rounded-full" data-purpose="cart-icon">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
        </a>
    </div>
</header>
<!-- END: MainHeader -->
<!-- BEGIN: MainContent -->
<main class="flex-grow flex items-center justify-center p-4 md:p-8">
    <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
        <!-- Left Side: Product Showcase -->
        <div class="hidden md:flex bg-white rounded-3xl shadow-xl overflow-hidden items-center justify-center p-12">
            <div class="relative w-full h-full flex items-center justify-center">
                <img alt="Cây Nha Đam" class="max-w-full max-h-full object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-700 ease-in-out rounded-2xl" src="{{ asset('images/caynhadam.jpg') }}"/>
            </div>
        </div>
        <!-- Right Side: Register Form -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 flex flex-col justify-center">
            <div class="text-center mb-8">
                <h1 class="brand-title text-3xl font-bold text-brand-green mb-2">Verdant Harmony</h1>
                <p class="text-gray-500 text-sm">Tạo tài khoản mới ngay hôm nay 🌿</p>
            </div>
            
            <form action="{{ route('nvt.register.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- FullName Field -->
                    <div data-purpose="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="FullName">Họ và tên</label>
                        <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="FullName" name="FullName" placeholder="Nguyễn Văn A" type="text" value="{{ old('FullName') }}" required/>
                        @error('FullName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <!-- Username Field -->
                    <div data-purpose="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="Username">Tên đăng nhập</label>
                        <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="Username" name="Username" placeholder="tendangnhap" type="text" value="{{ old('Username') }}" required/>
                        @error('Username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Email Field -->
                <div data-purpose="form-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="Email">Email</label>
                    <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="Email" name="Email" placeholder="Nhập email của bạn" type="email" value="{{ old('Email') }}" required/>
                    @error('Email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Password Field -->
                    <div data-purpose="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="Password">Mật khẩu</label>
                        <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="Password" name="Password" placeholder="Mật khẩu" type="password" required/>
                        @error('Password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <!-- Password Confirm Field -->
                    <div data-purpose="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="Password_confirmation">Xác nhận mật khẩu</label>
                        <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="Password_confirmation" name="Password_confirmation" placeholder="Xác nhận lại mật khẩu" type="password" required/>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button class="w-full bg-brand-green hover-bg-brand-green text-white font-bold py-4 rounded-lg shadow-lg transform active:scale-[0.98] transition-all mt-4" type="submit">
                    ĐĂNG KÝ
                </button>
            </form>
            <!-- Login Link -->
            <div class="mt-8 text-center text-sm text-gray-600 font-medium">
                Đã có tài khoản? <a class="text-brand-green hover:underline" href="{{ route('nvt.login') }}">Đăng nhập</a>
            </div>
        </div>
    </div>
</main>
<!-- END: MainContent -->
<footer class="py-4"></footer>
</body>
</html>
