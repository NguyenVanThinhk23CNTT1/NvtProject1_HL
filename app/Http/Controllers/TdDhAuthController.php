<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NvtCustomer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TdDhAuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập
     */
    public function showLoginForm()
    {
        if (Session::has('customer_id')) {
            return redirect()->route('home');
        }
        return view('TD-DH_login');
    }

    /**
     * Xử lý đăng nhập
     */
    public function login(Request $request)
    {
        $request->validate([
            'Username' => 'required|string',
            'Password' => 'required|string',
        ], [
            'Username.required' => 'Vui lòng nhập tên đăng nhập',
            'Password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $customer = NvtCustomer::where('Username', $request->Username)->first();

        // Kiểm tra xem mật khẩu có khớp không (Hỗ trợ cả mật khẩu chưa mã hóa nhập tay vào DB và mật khẩu đã mã hóa)
        $isPasswordCorrect = false;
        if ($customer) {
            // Cố gắng kiểm tra bằng Hash::check
            try {
                if (Hash::check($request->Password, $customer->Password)) {
                    $isPasswordCorrect = true;
                }
            } catch (\Exception $e) {
                // Nếu lỗi "This password does not use the Bcrypt algorithm", kiểm tra xem mật khẩu có giống chuỗi thô không
                if ($request->Password === $customer->Password) {
                    $isPasswordCorrect = true;
                    // (Tùy chọn) Cập nhật lại mật khẩu trong DB thành chuỗi đã mã hóa để lần sau không bị lỗi nữa
                    $customer->Password = Hash::make($request->Password);
                    $customer->save();
                }
            }
            
            // Trường hợp mật khẩu thô lưu thẳng vào DB mà bản Laravel cũ không ném lỗi exception nhưng Hash::check trả về false
            if (!$isPasswordCorrect && $request->Password === $customer->Password) {
                $isPasswordCorrect = true;
                $customer->Password = Hash::make($request->Password);
                $customer->save();
            }
        }

        if ($customer && $isPasswordCorrect) {
            Session::put('customer_id', $customer->CustomerId);
            Session::put('customer_name', $customer->FullName);
            Session::put('customer_username', $customer->Username);
            Session::put('customer_role', $customer->Role);

            // Nếu Role là 1 (Admin), chuyển hướng sang trang Admin
            if ((string)$customer->Role === '1') {
                return redirect()->route('admin.products')->with('success', 'Chào mừng Admin đăng nhập thành công!');
            }

            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
    }

    /**
     * Hiển thị form đăng ký
     */
    public function showRegisterForm()
    {
        if (Session::has('customer_id')) {
            return redirect()->route('home');
        }
        return view('TD-DH_register');
    }

    /**
     * Xử lý đăng ký
     */
    public function register(Request $request)
    {
        $request->validate([
            'FullName' => 'required|string|max:255',
            'Username' => 'required|string|max:255|unique:customers,Username',
            'Email'    => 'required|email|max:255',
            'Password' => 'required|string|min:6|confirmed',
        ], [
            'FullName.required' => 'Vui lòng nhập họ và tên',
            'Username.required' => 'Vui lòng nhập tên đăng nhập',
            'Username.unique'   => 'Tên đăng nhập này đã có người sử dụng',
            'Email.required'    => 'Vui lòng nhập email',
            'Email.email'       => 'Email không đúng định dạng',
            'Password.required' => 'Vui lòng nhập mật khẩu',
            'Password.min'      => 'Mật khẩu phải có ít nhất 6 ký tự',
            'Password.confirmed'=> 'Mật khẩu xác nhận không khớp',
        ]);

        $customer = NvtCustomer::create([
            'FullName' => $request->FullName,
            'Username' => $request->Username,
            'Email'    => $request->Email,
            'Password' => Hash::make($request->Password),
            'Role'     => 0, // 0 là User thường, 1 là Admin
        ]);

        Session::put('customer_id', $customer->CustomerId);
        Session::put('customer_name', $customer->FullName);
        Session::put('customer_username', $customer->Username);

        return redirect()->route('home')->with('success', 'Đăng ký tài khoản thành công!');
    }

    /**
     * Đăng xuất
     */
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('customer_username');

        return redirect()->route('home')->with('success', 'Bạn đã đăng xuất thành công.');
    }
}
