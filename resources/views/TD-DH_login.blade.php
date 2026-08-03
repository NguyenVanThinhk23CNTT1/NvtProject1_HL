<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Đăng nhập - Verdant Harmony</title>
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
        <!-- Right Side: Login Form -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 flex flex-col justify-center">
            <div class="text-center mb-10">
                <h1 class="brand-title text-3xl font-bold text-brand-green mb-2">Verdant Harmony</h1>
                <p class="text-gray-500 text-sm">Đăng nhập để tiếp tục mua sắm 🌿</p>
            </div>
            
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('nvt.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Username Field -->
                <div data-purpose="form-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="Username">Tên đăng nhập</label>
                    <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="Username" name="Username" placeholder="Nhập tên đăng nhập của bạn" type="text" value="{{ old('Username') }}" required/>
                    @error('Username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <!-- Password Field -->
                <div data-purpose="form-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="Password">Mật khẩu</label>
                    <div class="relative">
                        <input class="w-full px-4 py-3 bg-[#eef2f7] border-transparent focus:border-brand-green focus:bg-white focus:ring-0 rounded-lg transition-all text-gray-800" id="Password" name="Password" placeholder="Nhập mật khẩu" type="password" required/>
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 border-l border-gray-300 pl-3" type="button">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            </svg>
                        </button>
                    </div>
                    @error('Password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <!-- Options -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer text-gray-600">
                        <input class="rounded border-gray-300 text-brand-green focus:ring-brand-green" type="checkbox"/>
                        <span>Ghi nhớ đăng nhập</span>
                    </label>
                    <a class="text-gray-500 hover:text-brand-green transition-colors" href="#">Quên mật khẩu?</a>
                </div>
                <!-- Submit Button -->
                <button class="w-full bg-brand-green hover-bg-brand-green text-white font-bold py-4 rounded-lg shadow-lg transform active:scale-[0.98] transition-all" type="submit">
                    ĐĂNG NHẬP
                </button>
            </form>
            <!-- Register Link -->
            <div class="mt-10 text-center text-sm text-gray-600 font-medium">
                Chưa có tài khoản? <a class="text-brand-green hover:underline" href="{{ route('nvt.register') }}">Đăng ký</a>
            </div>
        </div>
    </div>
</main>
<!-- END: MainContent -->
<!-- BEGIN: FooterSpacer -->
<footer class="py-4">
</footer>
<!-- END: FooterSpacer -->
</body>
</html>
