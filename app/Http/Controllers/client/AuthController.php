<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function loginForm()
    {
        return view('client.login');
    }


    public function loginHandle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required',
        ], [
            'name.required' => 'Tên đăng nhập không được để trống.',
            'name.string' => 'Tên đăng nhập phải là một chuỗi.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); // Trả lỗi về view
        }

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            session(['user' => [
                'id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'coin' => Auth::user()->coin,
                'phone_number' => Auth::user()->phone_number,
            ]]);
            return redirect()->route('client.home');
        }

        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.'); // Lỗi đăng nhập
    }

    public function registerForm()
    {
        return view('client.register');
    }


    public function registerHandle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users,name',
            'phone' => 'required|numeric|unique:users,phone_number',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Tên đăng nhập không được để trống.',
            'name.string' => 'Tên đăng nhập phải là một chuỗi.',
            'name.unique' => 'Tên đăng nhập đã tồn tại.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Tạo người dùng mới
            $user = User::create([
                'name' => $request->name,
                'phone_number' => $request->phone,
                'role' => 3,
                'coin' => 0,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('successRegister', 'Đăng ký thành công.');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có vấn đề khi thêm vào cơ sở dữ liệu
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại sau.');
        }
    }
}
