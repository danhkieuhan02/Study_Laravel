<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //Đăng ký tài khoản
    public function register()
    {
        return view("account.register");
    }
    public function save(Request $request)
    {
        //validate dữ liệu
        $this->customValidate($request);
        $data = $request->all();
        unset($data['_token']);
        unset($data['cf_password']);
        //hash mk
        $data["password"] = Hash::make($data['password']);
        $user = new User($data);
        $user->save();
        return redirect('/admin/san-pham')->with('_success', 'Đăng ký tài khoản thành công!');
    }

    public function customValidate(Request $request)
    {
        #tất cả dữ liệu là bắt buộc nhập
        #Họ tên không được ít hơn 4 ký tự
        #Mật khẩu không được ít hơn 4 ký tự
        #Mật khẩu và mk xác nhận phải trùng nhau
        #Email phải là duy nhất, không được phép tồn tại 2 email giống nhau trong db
        $rules = [
            "name" => "required|min:4",
            "password" => "required|min:4|same:cf_password",
            "cf_password"  => "required",
            "email" => "required|unique:users,email"
        ];
        $request->validate($rules);
    }
    //Đăng nhập 
    public function login()
    {
        return view('account.login');
    }

    public function auth(Request $request)
    {
        // $user = User::where('email', '=', )
        $data = $request->all();
        unset($data['_token']);

        if (Auth::attempt($data)) {
            //tự động đem pass và user name đi check
            //auth stand for authentication : xác thực
            //Đăng nhập thành công
            return redirect()->to('/')->with('_success', "Đăng nhập thành công!");
        } else {
            //Đăng nhập thất bại
            return redirect()->route('account.login')->with('_errors', "Tên đăng nhập hoặc mật khẩu không hợp lệ!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/')
            ->with('_success', "Đăng xuất khỏi hệ thống thành công!");
    }
}
