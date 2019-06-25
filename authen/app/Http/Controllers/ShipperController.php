<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //hàm khởi tọa của class sẽ đc chạy ngay khi khởi tạo đối tượng
    //hàm này luôn được chạy trước các hàm khác trong class
//    SellerController construct
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }

    //trả về view khi đăng nhập thành công
    public function index(){
        return view('shipper.dashboard');
    }
    /*
    * phương thức dùng để đăng kí tài khoản shipper*/
    public function create(){
        return view('shipper.auth.register');
    }
    public function store(Request $request){
        //valide dc gguwir tuf form di
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ));

        //khởi tạo model để lưu seller mới
        $shipperModel= new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt( $request->password);
        $shipperModel->save();

        return redirect()->route('shipper.auth.login');
    }
}
