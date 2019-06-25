<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //hàm khởi tọa của class sẽ đc chạy ngay khi khởi tạo đối tượng
    //hàm này luôn được chạy trước các hàm khác trong class
//    SellerController construct
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }

    //trả về view khi đăng nhập thành công
    public function index(){
        return view('seller.dashboard');
    }
    /*
    * phương thức dùng để đăng kí tài khoản seller*/
    public function create(){
        return view('seller.auth.register');
    }
    public function store(Request $request){
        //valide dc gguwir tuf form di
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ));

        //khởi tạo model để lưu seller mới
        $sellerModel= new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email = $request->email;
        $sellerModel->password = bcrypt( $request->password);
        $sellerModel->save();

        return redirect()->route('seller.auth.login');
    }
}
