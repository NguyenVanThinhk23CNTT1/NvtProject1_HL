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

<!-- Header -->
<header class="w-full bg-surface-container-lowest border-b border-surface-container py-md px-gutter">
    <div class="max-w-container-max mx-auto flex justify-between items-center">
        <a class="font-headline-lg text-headline-lg text-primary tracking-tight" href="#">Verdant Harmony</a>
        <a class="text-on-surface-variant flex items-center gap-xs hover:text-primary transition-colors" href="{{ route('nvt.cart') }}">
            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
            <span class="font-label-md text-label-md">Quay lại giỏ hàng</span>
        </a>
    </div>
</header>

<!-- Main Content -->
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-xl">
    <h1 class="font-headline-lg text-headline-lg text-on-surface mb-lg">Thanh toán</h1>
    
    <form action="{{ route('nvt.checkout.process') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl">
            
            <!-- Left Column: Thông tin giao hàng & Thanh toán -->
            <div class="lg:col-span-7 space-y-xl">
                
                <!-- Contact Info -->
                <section class="bg-surface-container-lowest p-lg rounded-xl shadow-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-md">Thông tin liên hệ</h2>
                    <div class="space-y-md">
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="email">Địa chỉ Email</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="email" name="email" placeholder="bancan@example.com" type="email" required/>
                        </div>
                        <div class="flex items-center gap-sm">
                            <input class="rounded text-primary focus:ring-primary h-5 w-5 bg-surface-container-low border-outline-variant" id="newsletter" name="newsletter" type="checkbox"/>
                            <label class="font-body-md text-body-md text-on-surface-variant" for="newsletter">Gửi cho tôi tin tức và ưu đãi qua email</label>
                        </div>
                    </div>
                </section>

                <!-- Shipping Address -->
                <section class="bg-surface-container-lowest p-lg rounded-xl shadow-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-md">Địa chỉ giao hàng</h2>
                    <div class="space-y-md">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="firstName">Họ</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="firstName" name="first_name" placeholder="Nguyễn" type="text" required/>
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="lastName">Tên</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="lastName" name="last_name" placeholder="Văn A" type="text" required/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="address">Địa chỉ nhà, tên đường</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="address" name="address" placeholder="Số 123 Đường ABC" type="text" required/>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="apartment">Căn hộ, số phòng, tòa nhà... (tùy chọn)</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="apartment" name="apartment" type="text"/>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                            <div class="md:col-span-1">
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="city">Tỉnh / Thành phố</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="city" name="city" placeholder="Hà Nội" type="text" required/>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="state">Quận / Huyện</label>
                                <select class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md appearance-none" id="state" name="state">
                                    <option value="">Chọn Quận / Huyện...</option>
                                    <option value="Ba Đình">Ba Đình</option>
                                    <option value="Cầu Giấy">Cầu Giấy</option>
                                    <option value="Hoàn Kiếm">Hoàn Kiếm</option>
                                </select>
                            </div>
                            <div class="md:col-span-1">
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="zip">Mã bưu chính</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="zip" name="zip" placeholder="100000" type="text"/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="phone">Số điện thoại</label>
                            <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="phone" name="phone" placeholder="0901234567" type="tel" required/>
                        </div>
                    </div>
                </section>

                <!-- Payment Method -->
                <section class="bg-surface-container-lowest p-lg rounded-xl shadow-sm">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-md">Phương thức thanh toán</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-md">Tất cả giao dịch đều được bảo mật và mã hóa.</p>
                    <div class="border border-outline-variant rounded-lg overflow-hidden">
                        
                        <div class="p-md bg-surface border-b border-outline-variant flex items-center justify-between">
                            <div class="flex items-center gap-sm">
                                <input checked class="text-primary focus:ring-primary h-5 w-5 bg-surface-container-lowest border-outline-variant" id="pay-card" name="payment_method" value="card" type="radio"/>
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
                                    <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md pr-10" id="cc-number" name="cc_number" placeholder="0000 0000 0000 0000" type="text"/>
                                    <span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 text-outline-variant">lock</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-md">
                                <div>
                                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-exp">Ngày hết hạn (MM/YY)</label>
                                    <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="cc-exp" name="cc_exp" placeholder="MM/YY" type="text"/>
                                </div>
                                <div>
                                    <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-csc">Mã bảo mật (CVC/CVV)</label>
                                    <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="cc-csc" name="cc_csc" placeholder="123" type="text"/>
                                </div>
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md text-on-surface-variant mb-xs" for="cc-name">Tên in trên thẻ</label>
                                <input class="w-full bg-surface-container-low border-b-2 border-outline-variant py-sm px-md focus:outline-none focus:border-primary transition-colors text-body-md font-body-md" id="cc-name" name="cc_name" type="text"/>
                            </div>
                        </div>

                        <div class="p-md bg-surface flex items-center gap-sm">
                            <input class="text-primary focus:ring-primary h-5 w-5 bg-surface-container-lowest border-outline-variant" id="pay-paypal" name="payment_method" value="paypal" type="radio"/>
                            <label class="font-label-md text-label-md text-on-surface cursor-pointer" for="pay-paypal">Ví điện tử PayPal</label>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Tóm tắt đơn hàng -->
            <div class="lg:col-span-5">
                <div class="bg-surface-container p-lg rounded-xl sticky top-md">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-lg">Tóm tắt đơn hàng</h2>
                    
                    <div class="space-y-md mb-lg">
                        <div class="flex items-center gap-md">
                            <div class="relative w-20 h-24 rounded-lg overflow-hidden shrink-0">
                                <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNxjvpr4K-aecy4MJAY4aAsVE7TmWi54gKV5vHQ9TGVbfKxrEqHSH1BudawIuoq8zSY6TnCgYKKNPCplM0UeECi81UyAXw3Hl-6CGBbeYVXHG1yuavoUYztI0joeDiOdV2FrzCqP2CTefHQVAWEjjlFifBaMkkAN5SBkJxQzpZvv72OOjplHzrEvqbPdpROasJzT0RJl71_JQyzuGecp4ktbQu4wD6SdfJUQ_KP42Xpo6rNgH6XJVT4SPpD_3RCDRXmmf5oI8p7ro"/>
                                <div class="absolute -top-2 -right-2 bg-on-surface-variant text-surface-container-lowest w-6 h-6 rounded-full flex items-center justify-center font-label-md text-[12px]">1</div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-label-md text-label-md text-on-surface">Monstera Deliciosa</h3>
                                <p class="font-body-md text-[14px] text-on-surface-variant">Size Vừa / Chậu Sứ Trắng</p>
                            </div>
                            <div class="font-label-md text-label-md text-on-surface">450.000 ₫</div>
                        </div>
                    </div>

                    <div class="space-y-sm mb-lg border-b border-outline-variant pb-lg">
                        <div class="flex justify-between font-body-md text-body-md text-on-surface-variant">
                            <span>Tạm tính</span>
                            <span>730.000 ₫</span>
                        </div>
                        <div class="flex justify-between font-body-md text-body-md text-on-surface-variant">
                            <span>Phí vận chuyển</span>
                            <span>Tính ở bước tiếp theo</span>
                        </div>
                        <div class="flex justify-between font-body-md text-body-md text-on-surface-variant">
                            <span>Thuế (VAT)</span>
                            <span>58.400 ₫</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-xl">
                        <span class="font-headline-md text-headline-md text-on-surface">Tổng cộng</span>
                        <span class="font-headline-md text-headline-md text-on-surface"><span class="text-on-surface-variant text-[14px] font-normal mr-1">VND</span>788.400 ₫</span>
                    </div>

                    <button type="submit" class="w-full bg-primary-container text-on-primary font-label-md text-[16px] py-md rounded-lg shadow-sm hover:scale-[1.02] hover:bg-primary transition-all duration-300 flex justify-center items-center gap-sm">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">lock</span>
                        Đặt hàng ngay
                    </button>
                </div>
            </div>
        </div>
    </form>
</main>

<footer class="w-full border-t border-surface-container py-md mt-xl">
    <div class="max-w-container-max mx-auto px-gutter text-center">
        <p class="font-body-md text-[14px] text-on-surface-variant">© 2026 Verdant Harmony. Tất cả các quyền được bảo lưu.</p>
    </div>
</footer>

</body>
</html>