<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NvtProduct;
use App\Models\NvtCategory;
use App\Models\NvtOrder;
use App\Models\NvtCustomer;

class NvtHomeController extends Controller
{
    /**
     * Trang chủ — lấy categories + 8 sản phẩm mới nhất từ DB
     */
    public function index()
    {
        $categories = NvtCategory::all();
        $products = NvtProduct::with('category')->take(8)->get();

        return view('Nvt_home', compact('categories', 'products'));
    }

    /**
     * Trang danh sách sản phẩm — tất cả sản phẩm từ DB
     */
    public function products()
    {
        $products = NvtProduct::with('category')->get();

        return view('Nvt_products', compact('products'));
    }

    /**
     * Trang chi tiết sản phẩm
     */
    public function detail($id = null)
    {
        $product = NvtProduct::with('category')->find($id);

        // Nếu không tìm thấy sản phẩm, quay về trang sản phẩm
        if (!$product) {
            return redirect()->route('products');
        }

        // Lấy 4 sản phẩm liên quan (cùng danh mục, trừ sản phẩm hiện tại)
        $relatedProducts = NvtProduct::where('ProductId', '!=', $product->ProductId)
            ->when($product->CategoryId, function ($query) use ($product) {
                $query->where('CategoryId', $product->CategoryId);
            })
            ->take(4)
            ->get();

        // Nếu không đủ 4, bổ sung thêm sản phẩm khác
        if ($relatedProducts->count() < 4) {
            $moreProducts = NvtProduct::where('ProductId', '!=', $product->ProductId)
                ->whereNotIn('ProductId', $relatedProducts->pluck('ProductId'))
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->merge($moreProducts);
        }

        return view('Nvt_detail', compact('product', 'relatedProducts'));
    }

    /**
     * Trang Chăm sóc cây
     */
    public function careGuide()
    {
        return view('Nvt_care_guide');
    }

    /**
     * Trang Giới thiệu
     */
    public function about()
    {
        return view('Nvt_about');
    }

    // ======================================================================
    // ADMIN — CRUD Sản phẩm
    // ======================================================================

    /**
     * Admin: Hiển thị danh sách sản phẩm
     */
    public function adminProducts()
    {
        $products = NvtProduct::with('category')->get();
        $categories = NvtCategory::all();
        $orders = NvtOrder::all();
        $customers = NvtCustomer::all();

        return view('Nvt_admin', compact('products', 'categories', 'orders', 'customers'));
    }

    /**
     * Admin: Thêm sản phẩm mới
     */
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'ProductName'   => 'required|string|max:255',
            'CategoryId'    => 'nullable|exists:categories,CategoryId',
            'Price'         => 'required|integer|min:0',
            'StockQuantity' => 'required|integer|min:0',
            'Description'   => 'nullable|string',
        ]);

        // Xử lý upload ảnh
        if ($request->hasFile('Image')) {
            $imageName = time() . '_' . $request->file('Image')->getClientOriginalName();
            $request->file('Image')->move(public_path('images'), $imageName);
            $validated['Image'] = $imageName;
        }

        NvtProduct::create($validated);

        return redirect()->route('admin.products')->with('success', 'Đã thêm sản phẩm thành công!');
    }

    /**
     * Admin: Cập nhật sản phẩm
     */
    public function updateProduct(Request $request, $id)
    {
        $product = NvtProduct::findOrFail($id);

        $validated = $request->validate([
            'ProductName'   => 'required|string|max:255',
            'CategoryId'    => 'nullable|exists:categories,CategoryId',
            'Price'         => 'required|integer|min:0',
            'StockQuantity' => 'required|integer|min:0',
            'Description'   => 'nullable|string',
        ]);

        // Xử lý upload ảnh mới
        if ($request->hasFile('Image')) {
            $imageName = time() . '_' . $request->file('Image')->getClientOriginalName();
            $request->file('Image')->move(public_path('images'), $imageName);
            $validated['Image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products')->with('success', 'Đã cập nhật sản phẩm thành công!');
    }

    /**
     * Admin: Xóa sản phẩm
     */
    public function destroyProduct($id)
    {
        $product = NvtProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Đã xóa sản phẩm thành công!');
    }

    // ======================================================================
    // ADMIN — CRUD Danh Mục
    // ======================================================================

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'CategoryName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        NvtCategory::create($validated);
        return redirect()->route('admin.products')->with('success', 'Đã thêm danh mục mới thành công!');
    }

    public function updateCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'CategoryName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $category = NvtCategory::findOrFail($id);
        $category->update($validated);

        return redirect()->route('admin.products')->with('success', 'Đã cập nhật danh mục thành công!');
    }

    public function destroyCategory($id)
    {
        // Kiểm tra xem danh mục có sản phẩm nào không
        $productCount = NvtProduct::where('CategoryId', $id)->count();
        if ($productCount > 0) {
            return redirect()->route('admin.products')->withErrors('Không thể xóa danh mục đang có sản phẩm. Vui lòng chuyển sản phẩm sang danh mục khác trước.');
        }

        $category = NvtCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.products')->with('success', 'Đã xóa danh mục thành công!');
    }

    // ======================================================================
    // Giỏ hàng & Thanh toán
    // ======================================================================

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = NvtProduct::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['Quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->ProductId,
                'ProductName' => $product->ProductName,
                'Price' => $product->Price,
                'Quantity' => $quantity,
                'Image' => $product->Image,
                'Attributes' => $product->CategoryName ?? 'Chậu tiêu chuẩn'
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('nvt.cart')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }

    public function cart()
    {
        $cartItems = session()->get('cart', []);
        $cartItems = array_map(function($item) { return (object)$item; }, $cartItems);

        $subtotal = array_reduce($cartItems, fn($carry, $item) => $carry + ($item->Price * $item->Quantity), 0);
        $totalQuantity = array_reduce($cartItems, fn($carry, $item) => $carry + $item->Quantity, 0);
        $shippingFee = count($cartItems) > 0 ? 50000 : 0;
        $grandTotal = $subtotal + $shippingFee;

        return view('Nvt_cart', compact('cartItems', 'subtotal', 'totalQuantity', 'shippingFee', 'grandTotal'));
    }

    public function checkout()
    {
        $cartItems = session()->get('cart', []);
        $cartItems = array_map(function($item) { return (object)$item; }, $cartItems);

        $subtotal = array_reduce($cartItems, fn($carry, $item) => $carry + ($item->Price * $item->Quantity), 0);
        $shippingFee = count($cartItems) > 0 ? 50000 : 0;
        $vat = $subtotal * 0.08; // 8% VAT
        $grandTotal = $subtotal + $shippingFee + $vat;

        return view('Nvt_checkout', compact('cartItems', 'subtotal', 'shippingFee', 'vat', 'grandTotal'));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        // Giả lập lưu đơn hàng vào DB thành công
        // ...
        
        // Xóa giỏ hàng sau khi đặt thành công
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
    }
}
