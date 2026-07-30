<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Thanh toán - Verdant Harmony</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                  "secondary-fixed-dim": "#85d7ad",
                  "on-surface-variant": "#414844",
                  "surface-tint": "#3f6653",
                  "on-primary-fixed-variant": "#274e3d",
                  "surface-container-high": "#e7e8e9",
                  "tertiary-fixed": "#ffdcbd",
                  "primary-fixed-dim": "#a5d0b9",
                  "on-tertiary-fixed-variant": "#623f18",
                  "surface": "#f8f9fa",
                  "surface-container-lowest": "#ffffff",
                  "tertiary": "#3b1f00",
                  "tertiary-fixed-dim": "#f0bd8b",
                  "tertiary-container": "#56340e",
                  "primary-fixed": "#c1ecd4",
                  "on-tertiary-fixed": "#2c1600",
                  "on-primary-container": "#86af99",
                  "surface-bright": "#f8f9fa",
                  "background": "#f8f9fa",
                  "secondary-fixed": "#a0f4c8",
                  "outline": "#717973",
                  "on-surface": "#191c1d",
                  "error": "#ba1a1a",
                  "surface-container": "#edeeef",
                  "surface-container-highest": "#e1e3e4",
                  "on-secondary-fixed": "#002113",
                  "on-secondary": "#ffffff",
                  "surface-container-low": "#f3f4f5",
                  "on-tertiary-container": "#cd9d6d",
                  "on-secondary-container": "#19724f",
                  "on-tertiary": "#ffffff",
                  "error-container": "#ffdad6",
                  "on-primary": "#ffffff",
                  "inverse-surface": "#2e3132",
                  "primary": "#012d1d",
                  "on-background": "#191c1d",
                  "outline-variant": "#c1c8c2",
                  "secondary": "#0e6c4a",
                  "on-secondary-fixed-variant": "#005236",
                  "inverse-primary": "#a5d0b9",
                  "surface-variant": "#e1e3e4",
                  "on-error-container": "#93000a",
                  "on-error": "#ffffff",
                  "primary-container": "#1b4332",
                  "secondary-container": "#a0f4c8",
                  "inverse-on-surface": "#f0f1f2",
                  "on-primary-fixed": "#002114",
                  "surface-dim": "#d9dadb"
              },
              "borderRadius": {
                  "DEFAULT": "0.25rem",
                  "lg": "0.5rem",
                  "xl": "0.75rem",
                  "full": "9999px"
              },
              "spacing": {
                  "gutter": "24px",
                  "sm": "12px",
                  "md": "24px",
                  "lg": "48px",
                  "xs": "4px",
                  "xl": "80px",
                  "container-max": "1280px",
                  "base": "8px"
              },
              "fontFamily": {
                  "headline-md": ["Playfair Display"],
                  "body-md": ["Inter"],
                  "label-md": ["Inter"],
                  "display-lg-mobile": ["Playfair Display"],
                  "body-lg": ["Inter"],
                  "headline-lg": ["Playfair Display"],
                  "display-lg": ["Playfair Display"]
              },
              "fontSize": {
                  "headline-md": ["24px", { "lineHeight": "1.4", "fontWeight": "600" }],
                  "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                  "label-md": ["14px", { "lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600" }],
                  "display-lg-mobile": ["40px", { "lineHeight": "1.2", "fontWeight": "700" }],
                  "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                  "headline-lg": ["32px", { "lineHeight": "1.3", "fontWeight": "600" }],
                  "display-lg": ["56px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700" }]
              }
            }
          }
        }
    </script>
    
    <!-- Link CSS Nvt riêng -->
    <link rel="stylesheet" href="{{ asset('css/Nvt_style.css') }}"/>
</head>
<body class="bg-surface text-on-surface font-body-md text-body-md antialiased min-h-screen flex flex-col">

<!-- Header được đồng bộ lại chuẩn đẹp -->
<header class="w-full bg-surface-container-lowest border-b border-surface-container py-md px-gutter sticky top-0 z-50 shadow-sm">
    <div class="max-w-container-max mx-auto flex justify-between items-center">
        <a class="font-headline-lg text-headline-lg text-primary tracking-tight font-bold" href="{{ route('home') }}">Verdant Harmony</a>
        
        <!-- Nút Quay lại giỏ hàng thiết kế chỉn chu -->
        <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-outline-variant/60 text-primary hover:bg-surface-container-low transition-all font-label-md text-label-md shadow-xs" href="{{ route('nvt.cart') }}">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <span>Quay lại giỏ hàng</span>
        </a>
    </div>
</header>

<!-- Main Content -->
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-xl">
    <div class="mb-lg">
        <h1 class="font-headline-lg text-headline-lg text-primary mb-2">Thanh toán đơn hàng</h1>
        <p class="text-on-surface-variant font-body-md">Vui lòng điền thông tin giao hàng và chọn phương thức thanh toán.</p>
    </div>
    
    <form action="{{ route('nvt.checkout.process') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl">
            
            <!-- Left Column: Thông tin giao hàng & Thanh toán -->
            <div class="lg:col-span-7 space-y-xl">
                
                <!-- Contact Info -->
                <section class="bg-surface-container-lowest p-lg rounded-xl shadow-sm border border-surface-container-highest">
                    <h2 class="font-headline-md text-headline-md text-primary mb-md">Thông tin liên hệ</h2>
                    <div class="space-y-md">
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="email">Địa chỉ Email</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="email" name="email" placeholder="bancan@example.com" type="email" required/>
                        </div>
                        <div class="flex items-center gap-sm">
                            <input class="rounded text-primary focus:ring-primary h-5 w-5 bg-surface-container-low border-outline-variant" id="newsletter" name="newsletter" type="checkbox"/>
                            <label class="font-body-md text-body-md text-on-surface-variant cursor-pointer" for="newsletter">Gửi cho tôi tin tức và ưu đãi qua email</label>
                        </div>
                    </div>
                </section>

                <!-- Shipping Address -->
                <section class="bg-surface-container-lowest p-lg rounded-xl shadow-sm border border-surface-container-highest">
                    <h2 class="font-headline-md text-headline-md text-primary mb-md">Địa chỉ giao hàng</h2>
                    <div class="space-y-md">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="firstName">Họ</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="firstName" name="first_name" placeholder="Nguyễn" type="text" required/>
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="lastName">Tên</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="lastName" name="last_name" placeholder="Văn A" type="text" required/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="address">Địa chỉ nhà, tên đường</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="address" name="address" placeholder="Số 123 Đường ABC" type="text" required/>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="apartment">Căn hộ, số phòng, tòa nhà... (tùy chọn)</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="apartment" name="apartment" type="text"/>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                            <div class="md:col-span-1">
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="city">Tỉnh / Thành phố</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="city" name="city" placeholder="Hà Nội" type="text" required/>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="state">Quận / Huyện</label>
                                <select class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm appearance-none" id="state" name="state">
                                    <option value="">Chọn Quận / Huyện...</option>
                                    <option value="Ba Đình">Ba Đình</option>
                                    <option value="Cầu Giấy">Cầu Giấy</option>
                                    <option value="Hoàn Kiếm">Hoàn Kiếm</option>
                                </select>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="zip">Mã bưu chính</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="zip" name="zip" placeholder="100000" type="text"/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="phone">Số điện thoại</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="phone" name="phone" placeholder="0901234567" type="tel" required/>
                        </div>
                    </div>
                </section>

                <!-- Payment Method -->
                <section class="bg-surface-container-lowest p-lg rounded-xl shadow-sm border border-surface-container-highest">
                    <h2 class="font-headline-md text-headline-md text-primary mb-md">Phương thức thanh toán</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-md">Tất cả giao dịch đều được bảo mật và mã hóa.</p>
                    
                    <div class="border border-outline-variant rounded-lg overflow-hidden">
                        <div class="p-md bg-surface border-b border-outline-variant flex items-center justify-between">
                            <div class="flex items-center gap-sm">
                                <input checked class="text-primary focus:ring-primary h-5 w-5 bg-surface-container-lowest border-outline-variant cursor-pointer" id="pay-card" name="payment_method" value="card" type="radio"/>
                                <label class="font-label-md text-label-md text-on-surface cursor-pointer" for="pay-card">Thẻ tín dụng / Thẻ ghi nợ</label>
                            </div>
                            <div class="flex gap-xs">
                                <span class="material-symbols-outlined text-outline">credit_card</span>
                            </div>
                        </div>
                        
                        <div class="p-md bg-surface-container-lowest space-y-md">
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-number">Số thẻ</label>
                                <div class="relative">
                                    <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md pr-10 rounded-t-sm" id="cc-number" name="cc_number" placeholder="0000 0000 0000 0000" type="text"/>
                                    <span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 text-outline-variant">lock</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-md">
                                <div>
                                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-exp">Ngày hết hạn (MM/YY)</label>
                                    <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="cc-exp" name="cc_exp" placeholder="MM/YY" type="text"/>
                                </div>
                                <div>
                                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-csc">Mã bảo mật (CVC/CVV)</label>
                                    <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="cc-csc" name="cc_csc" placeholder="123" type="text"/>
                                </div>
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-name">Tên in trên thẻ</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md rounded-t-sm" id="cc-name" name="cc_name" type="text"/>
                            </div>
                        </div>

                        <div class="p-md bg-surface flex items-center gap-sm">
                            <input class="text-primary focus:ring-primary h-5 w-5 bg-surface-container-lowest border-outline-variant cursor-pointer" id="pay-paypal" name="payment_method" value="paypal" type="radio"/>
                            <label class="font-label-md text-label-md text-on-surface cursor-pointer" for="pay-paypal">Ví điện tử PayPal</label>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Tóm tắt đơn hàng -->
            <div class="lg:col-span-5">
                <div class="bg-surface-container p-lg rounded-xl sticky top-[90px] border border-surface-container-highest shadow-sm">
                    <h2 class="font-headline-md text-headline-md text-primary mb-lg">Tóm tắt đơn hàng</h2>
                    
                    <!-- Danh sách món hàng mẫu/động -->
                    <div class="space-y-md mb-lg">
                        @forelse($cartItems ?? [
                            (object)['ProductName' => 'Monstera Deliciosa', 'Attributes' => 'Size Vừa / Chậu Sứ Trắng', 'Price' => 450000, 'Quantity' => 1]
                        ] as $item)
                        <div class="flex items-center gap-md">
                            <div class="relative w-16 h-20 rounded-lg overflow-hidden shrink-0 bg-surface-container-lowest border border-outline-variant/30">
                                <img class="w-full h-full object-cover" src="{{ asset('images/' . ($item->Image ?? 'default.jpg')) }}" onerror="this.src='https://images.unsplash.com/photo-1614594975525-e45190c55d0b?auto=format&fit=crop&w=200&q=80'" alt="{{ $item->ProductName }}"/>
                                <div class="absolute -top-1 -right-1 bg-primary text-on-primary w-5 h-5 rounded-full flex items-center justify-center font-label-md text-[11px] font-bold">
                                    {{ $item->Quantity }}
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-label-md text-label-md text-primary font-semibold">{{ $item->ProductName }}</h3>
                                <p class="font-body-md text-[13px] text-on-surface-variant">{{ $item->Attributes ?? 'Mặc định' }}</p>
                            </div>
                            <div class="font-label-md text-label-md text-primary font-bold">
                                {{ number_format($item->Price * $item->Quantity, 0, ',', '.') }} ₫
                            </div>
                        </div>
                        @empty
                        <p class="text-on-surface-variant text-sm">Chưa có món hàng nào.</p>
                        @endforelse
                    </div>

                    <!-- Tóm tắt số tiền -->
                    <div class="space-y-sm mb-lg border-t border-b border-outline-variant/50 py-md">
                        <div class="flex justify-between font-body-md text-body-md text-on-surface-variant">
                            <span>Tạm tính</span>
                            <span>{{ number_format($subtotal ?? 730000, 0, ',', '.') }} ₫</span>
                        </div>
                        <div class="flex justify-between font-body-md text-body-md text-on-surface-variant">
                            <span>Phí vận chuyển</span>
                            <span>{{ number_format($shippingFee ?? 50000, 0, ',', '.') }} ₫</span>
                        </div>
                        <div class="flex justify-between font-body-md text-body-md text-on-surface-variant">
                            <span>Thuế (VAT)</span>
                            <span>{{ number_format($vat ?? 58400, 0, ',', '.') }} ₫</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-lg">
                        <span class="font-headline-md text-headline-md text-primary">Tổng cộng</span>
                        <span class="font-headline-md text-headline-md text-primary font-bold">
                            {{ number_format($grandTotal ?? 838400, 0, ',', '.') }} ₫
                        </span>
                    </div>

                    <!-- Nút đặt hàng đồng bộ màu thương hiệu -->
                    <button type="submit" class="w-full bg-[#D4A373] text-white font-label-md text-[16px] py-3.5 rounded-lg shadow-sm hover:bg-[#c29161] hover:scale-[1.01] active:scale-[0.99] transition-all duration-200 flex justify-center items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">lock</span>
                        <span>Đặt hàng ngay</span>
                    </button>
                    
                    <p class="text-center font-body-md text-[12px] text-on-surface-variant mt-sm">
                        Bằng việc đặt hàng, bạn đã đồng ý với Điều khoản dịch vụ và Chính sách bảo mật của chúng tôi.
                    </p>
                </div>
            </div>
        </div>
    </form>
</main>

<!-- Footer -->
<footer class="w-full border-t border-surface-container py-md mt-xl bg-surface-container-lowest">
    <div class="max-w-container-max mx-auto px-gutter text-center">
        <p class="font-body-md text-[14px] text-on-surface-variant">© 2026 Verdant Harmony. Tất cả các quyền được bảo lưu.</p>
    </div>
</footer>

</body>
</html>