<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //hàm khởi tọa của class sẽ đc chạy ngay khi khởi tạo đối tượng
    //hàm này luôn được chạy trước các hàm khác trong class
//    AdminController_ construct
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    //trả về view khi đăng nhập thành công
    public function index(){
       return view('admin.dashboard');
    }
    /*
     * phương thức dùng để đăng kí tài khoản admin*/
    public function create(){
        return view('admin.auth.register');
    }
    public function store(Request $request){
        //valide dc gguwir tuf form di
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ));

        //khởi tạo model để lưu admin mới
        $adminModel= new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt( $request->password);
        $adminModel->save();

        return redirect()->route('admin.auth.login');
    }
}
