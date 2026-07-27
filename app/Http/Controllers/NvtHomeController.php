<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NvtHomeController extends Controller
{
    /**
     * Trang chủ
     */
    public function index()
    {
        // Dữ liệu danh mục giả để làm giao diện
        $categories = [
            (object)['CategoryName' => 'Cây văn phòng'],
            (object)['CategoryName' => 'Cây treo ban công'],
            (object)['CategoryName' => 'Cây lọc không khí'],
        ];

        // Dữ liệu sản phẩm giả để hiển thị trang chủ
        $products = [
            (object)[
                'ProductName' => 'Monstera Deliciosa',
                'Description' => 'Cây trầu bà Nam Mỹ lá xẻ sang trọng.',
                'Price' => 550000,
                'Image' => null
            ],
            (object)[
                'ProductName' => 'Ficus Lyrata',
                'Description' => 'Cây bàng Singapore dáng cao hiện đại.',
                'Price' => 890000,
                'Image' => null
            ],
            (object)[
                'ProductName' => 'Senecio Rowleyanus',
                'Description' => 'Cây chuỗi ngọc bi rủ độc đáo.',
                'Price' => 250000,
                'Image' => null
            ],
            (object)[
                'ProductName' => 'Zamioculcas',
                'Description' => 'Cây kim tiền mang lại may mắn.',
                'Price' => 420000,
                'Image' => null
            ],
        ];

        return view('Nvt_home', compact('categories', 'products'));
    }

    /**
     * Trang danh sách sản phẩm
     */
    public function products()
    {
        // Dữ liệu sản phẩm hiển thị trên trang danh sách sản phẩm (Nvt_products.blade.php)
        $products = [
            (object)[
                'ProductName' => 'Monstera Deliciosa',
                'Price' => 1500000,
                'Image' => null,
                'Badge' => 'Ánh sáng gián tiếp'
            ],
            (object)[
                'ProductName' => 'Golden Pothos',
                'Price' => 800000,
                'Image' => null,
                'Badge' => 'Dễ chăm sóc'
            ],
            (object)[
                'ProductName' => 'Fiddle Leaf Fig',
                'Price' => 2800000,
                'Image' => null,
                'Badge' => 'Ánh sáng mạnh'
            ],
            (object)[
                'ProductName' => 'Snake Plant Laurentii',
                'Price' => 1050000,
                'Image' => null,
                'Badge' => 'Lọc không khí'
            ],
            (object)[
                'ProductName' => 'Zamioculcas Zamiifolia',
                'Price' => 650000,
                'Image' => null,
                'Badge' => 'Chịu bóng tốt'
            ],
            (object)[
                'ProductName' => 'Calathea Orbifolia',
                'Price' => 1200000,
                'Image' => null,
                'Badge' => 'An toàn thú cưng'
            ]
        ];

        return view('Nvt_products', compact('products'));
    }

    /**
     * Trang chi tiết sản phẩm
     */
    public function detail($id = 1)
    {
        // Dữ liệu mẫu sản phẩm hiện tại
        $product = (object)[
            'id' => $id,
            'ProductName' => 'Monstera Deliciosa',
            'Price' => 1500000,
            'Description' => 'Nổi tiếng với những chiếc lá xẻ tự nhiên độc đáo, cây Trầu Bà Nam Mỹ (Monstera Deliciosa) là điểm nhấn sang trọng, tạo cảm giác nhiệt đới cho không gian sống của bạn.',
            'Image' => null
        ];

        // Dữ liệu gợi ý sản phẩm tương tự
        $relatedProducts = [
            (object)['ProductName' => 'Golden Pothos', 'Price' => 800000, 'Image' => null],
            (object)['ProductName' => 'Snake Plant Laurentii', 'Price' => 1050000, 'Image' => null],
            (object)['ProductName' => 'ZZ Plant', 'Price' => 1200000, 'Image' => null],
            (object)['ProductName' => "Bird's Nest Fern", 'Price' => 750000, 'Image' => null],
        ];

        return view('Nvt_detail', compact('product', 'relatedProducts'));
    }

    /**
     * Trang Quản trị Sản phẩm (Admin)
     */
    public function adminProducts()
    {
        // Dữ liệu mẫu danh sách sản phẩm trong kho
        $products = [
            (object)[
                'id' => 1,
                'ProductName' => 'Monstera Deliciosa',
                'CategoryName' => 'Cây Trong Nhà',
                'Price' => 450000,
                'Stock' => 10,
                'Image' => null
            ],
            (object)[
                'id' => 2,
                'ProductName' => 'Sansevieria Trifasciata',
                'CategoryName' => 'Cây Ít Ánh Sáng',
                'Price' => 280000,
                'Stock' => 5,
                'Image' => null
            ],
            (object)[
                'id' => 3,
                'ProductName' => 'Golden Pothos',
                'CategoryName' => 'Cây Treo',
                'Price' => 150000,
                'Stock' => 0, // Hết hàng
                'Image' => null
            ],
            (object)[
                'id' => 4,
                'ProductName' => 'Ficus Lyrata',
                'CategoryName' => 'Cây Lớn',
                'Price' => 890000,
                'Stock' => 8,
                'Image' => null
            ],
        ];

        return view('Nvt_admin', compact('products'));
    }

    /**
     * Trang Giỏ hàng (Cart)
     */
    public function cart()
    {
        // Dữ liệu mẫu danh sách sản phẩm trong giỏ hàng
        $cartItems = [
            (object)[
                'id' => 1,
                'ProductName' => 'Monstera Deliciosa',
                'Attributes' => 'Chậu sứ trắng, size Lớn',
                'Price' => 850000,
                'Quantity' => 1,
                'Image' => null
            ],
            (object)[
                'id' => 2,
                'ProductName' => 'Golden Pothos',
                'Attributes' => 'Chậu treo Terracotta, size Vừa',
                'Price' => 300000,
                'Quantity' => 2,
                'Image' => null
            ],
        ];

        // Tính toán số liệu đơn hàng
        $subtotal = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item->Price * $item->Quantity);
        }, 0);

        $totalQuantity = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item->Quantity;
        }, 0);

        $shippingFee = count($cartItems) > 0 ? 50000 : 0;
        $grandTotal = $subtotal + $shippingFee;

        return view('Nvt_cart', compact('cartItems', 'subtotal', 'totalQuantity', 'shippingFee', 'grandTotal'));
    }

    public function checkout()
    {
        return view('Nvt_checkout'); // Trả về view Nvt_checkout.blade.php
    }

    // Xử lý thông tin khi nhấn nút Đặt hàng
    public function process(Request $request)
    {
        // Validation dữ liệu form
        $validated = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        // Code xử lý lưu đơn hàng tại đây...

        return redirect()->back()->with('success', 'Đặt hàng thành công!');
    }
}
