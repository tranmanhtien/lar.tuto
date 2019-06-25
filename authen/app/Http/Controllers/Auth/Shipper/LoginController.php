<?php

namespace App\Http\Controllers\Auth\Shipper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:shipper')->except('logout');
    }


    //phương thức này trả về view đăng nhập cho shipper
    public function login(){
        return view('shipper.auth.login');
    }

    //phương thức này đăng nhập seller lấy từ form method:post
    public function loginShipper(Request $request){
        //valide cho login
        $this->validate($request,array(
            'email'=>'required|email',
            'password'=>'required|min:6'
        ));

        //đăng nhập
        if(Auth::guard('shipper')->attempt(
            ['email'=> $request->email,'password'=>$request->password],$request->remember
        )){
            //nếu đăng nhập thành công trả về view dashboard của shipper
            return redirect()->intended(route('shipper.dashboard'));
        }
        //nếu đăng nhập thất bại quay trở lại fom đăng nhập với 2 giá trị cũ email và rêmmber
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    //phương thức này dùng để dăng xuất
    public  function logout(){
        Auth::guard('shipper')->logout();

        //sawu khi chuyển hướng về phần login
        return redirect()->route('shipper.auth.login');
    }
}
