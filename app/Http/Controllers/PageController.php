<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Product;
use App\User;
use App\Slide;
use App\LienHe;
use App\Cate;
use Cart;

class PageController extends Controller
{
    //

    public function __construct(){
    	$slide 	= Slide::all();
    	$cate 	= Cate::all();

    	view()->share(['slide' => $slide, 'cate' => $cate]);
    	if(Auth::check()){
    		view()->share(['user_site' => Auth::user()]);
    	}
    }

    public function getIndex(){
    	$cate 	= Cate::all();
    	$product = Product::where('id','>',0)->orderBy('id', 'DESC')->get();
    	return view('site.pages.index',['cate' => $cate, 'product' => $product]);
    }

    public function getSanPham($id){
    	$cate = Cate::find($id);
		$product = Product::where('id_cate', $id)->paginate(6);

		return view('site.pages.sanpham',['catesp' => $cate, 'product' => $product]);
    }

    public function getChiTiet($id){
    	$product = Product::find($id);
    	$proMore = Product::where('id_cate',$product->id_cate)->orderBy('id', 'DESC')->take(4)->get();


    	return view('site.pages.chitiet',['product' => $product, 'more' => $proMore]);
    }

    public function getLoaiSp($id){
    	$catet 		= Cate::find($id);
    	$cate 		= Cate::all()->where('paren_id',($id +0));
    	$product 	= Product::all();
    	return view('site.pages.loaisp',['catet' => $catet, 'product' => $product, 'catesp' => $cate]);
    }

    public function getLogin(){
    	return view('site.login');
    }

    public function postLogin(Request $request){
    	$this->validate($request,[
                'email'          => 'required|email|max:50',
                'password'      => 'required|min:3|max:50',
            ], [
                'email.required'        => 'Email không được để trống',
                'email.email'           => 'Email Không đúng định dạng',
                'email.max'             => 'Name quá ngắn',
                'password.min'          => 'Mật khẩu quá ngắn',
                'password.max'          => 'Mật khẩu quá dài',
                'password.required'     => 'Mật khẩu không được để trống',
            ]);

    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    		return redirect('./');
    	}else{
    		return redirect('dang-nhap.html')->with('thongbao', 'Tài Khoảng hoặc mật khẩu không đúng');
    	}
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('./');
    }

    public function getInfo(){
    	return view('site.pages.info');
    }

    public function getLienHe(){
    	return view('site.pages.lienhe');
    }

    public function postLienHe(Request $request){
    	$this->validate($request,[
    			'name'          	=> 'required|min:3|max:50',
                'email'          	=> 'required|email|max:50',
                'noiDung'      		=> 'required|min:3|max:50',
            ], [
            	'name.required'        	=> 'Name không được để trống',
                'name.min'           	=> 'Name quá ngắn',
                'name.max'             	=> 'Name quá dài',
                'email.required'        => 'Email không được để trống',
                'email.email'           => 'Email Không đúng định dạng',
                'email.max'             => 'Email quá ngắn',
                'noiDung.min'          	=> 'Nội Dung quá ngắn',
                'noiDung.max'          	=> 'Nội Dung quá dài',
                'noiDung.required'     	=> 'Nội Dung không được để trống',
            ]);

    	$lienhe = New LienHe;
    	$lienhe->name 		= $request->name;
    	$lienhe->email 		= $request->email;
    	$lienhe->noiDung 	= $request->noiDung;
    	$lienhe->save();
    	return redirect('lien-he.html')->with('thongbao','Cảm Ơn Bạn Đã Liên Hệ Với Chúng tôi');

    }

    public function getMuaHang($id){
        $product = Product::find($id);
        Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->gia,
                'options' => array(
                    'hinh' => $product->hinh,
                    'nameKhongDau' => $product->nameKhongDau
                )

            ));
        return redirect('gio-hang.html');
    }

    public function getGioHang(){
        $giohang = Cart::content();
        $total = Cart::total();

        return view('site.pages.giohang',['giohang' => $giohang, 'total' =>$total]);
    }

    public function getXoaSP($id){
        Cart::remove($id);

        return redirect('gio-hang.html');
    }

    public function postUpdate(Request $request){
        $res = array('st' =>0);
        Cart::update($request->id,$request->qty);
        
           $res['st'] = 1; 
        
        echo json_encode($res);
    }
}
