<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Cate;

class ProductController extends Controller
{
    //

    public function getDanhSach(){
    	$product = Product::all();
    	return view('admin.sanpham.danhsach', ['product' => $product]);
    }

    public function getThem(){
    	$cate = Cate::all();
    	return view('admin.sanpham.them', ['cate' => $cate]);
    }

    public function postThem(Request $request){
    	$product = new Product;
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:50',
    			'gia' 		=> 'required|integer',
    			'chiTiet' 	=> 'required|min:3',
    			'hinh' 		=> 'required'
    		],[
    			'name.required' 	=> 'Tên Sản Phẩm Không được để trống',
    			'name.min' 			=> 'Tên Sản Phẩm quá ngắn',
    			'name.max' 			=> 'Tên Sản Phẩm quá dài',
    			'gia.required' 		=> 'Giá Sản Phẩm Không được để trống',
    			'gia.integer' 		=> 'Giá Không đúng định dạng',
    			'chiTiet.required' 	=> 'Chi tiết Sản Phẩm Không được để trống',
    			'chiTiet.min' 		=> 'Chi tiết Sản Phẩm quá ngắn',
    			'hinh.required' 	=> 'Hình Sản phẩm chưa chọn'
    		]);

    	$product->name 			= $request->name;
    	$product->nameKhongDau 	= changeTitle($request->name);
    	$product->chiTiet 		= $request->chiTiet;
    	$product->gia 			= $request->gia;
    	$product->id_cate 		= $request->id_cate;

    	$file = $request->file('hinh');
    	$size = $file->getClientSize();
    	$duoi = $file->getClientOriginalExtension();
    	if($size < (2*1024*1024)){
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpge'){ 
                return redirect('admin/san-pham/them-san-pham.html')->with('thongbao','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
            
                $file->move('upload/product/', $hinh);
                $product->hinh             = $hinh;
            }
    	}else{
    		return redirect('admin/san-pham/them-san-pham.html')->with('thongbao', 'File quá lớn');
    	}

    	$product->save();
    	return redirect('admin/san-pham/them-san-pham.html')->with('thongbao', 'Thêm sản phẩm thành công');

    }

    public function getSua($id){
    	$cate 		= Cate::all();
    	$product 	= Product::find($id);

    	return view('admin.sanpham.sua',['cate' => $cate, 'product' => $product]);
    }

    public function postSua(Request $request, $id){
    	$product = Product::find($id);
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:50',
    			'gia' 		=> 'required|integer',
    			'chiTiet' 	=> 'required|min:3',
    		],[
    			'name.required' 	=> 'Tên Sản Phẩm Không được để trống',
    			'name.min' 			=> 'Tên Sản Phẩm quá ngắn',
    			'name.max' 			=> 'Tên Sản Phẩm quá dài',
    			'gia.required' 		=> 'Giá Sản Phẩm Không được để trống',
    			'gia.integer' 		=> 'Giá Không đúng định dạng',
    			'chiTiet.required' 	=> 'Chi tiết Sản Phẩm Không được để trống',
    			'chiTiet.min' 		=> 'Chi tiết Sản Phẩm quá ngắn'
    		]);

    	$product->name 			= $request->name;
    	$product->nameKhongDau 	= changeTitle($request->name);
    	$product->chiTiet 		= $request->chiTiet;
    	$product->gia 			= $request->gia;
    	$product->id_cate 		= $request->id_cate;

    	if($request->hasFile('hinh')){
    		$file = $request->file('hinh');
	    	$size = $file->getClientSize();
	    	$duoi = $file->getClientOriginalExtension();
	    	if($size < (2*1024*1024)){
	    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpge'){ 
	                return redirect('admin/san-pham/'.$id.'/sua-san-pham.html')->with('thongbao','Ảnh Không Đúng Định dạng');
	            }else{
	                $hinh = time().'_'.str_random(4).'_.'.$duoi;
	            
	                $file->move('upload/product/', $hinh);
	                unlink('upload/product/'.$product->hinh);
	                $product->hinh             = $hinh;
	            }
	    	}else{
	    		return redirect('admin/san-pham/'.$id.'/sua-san-pham.html')->with('thongbao', 'File quá lớn');
	    	}
    	}else{
    		 $product->hinh = $product->hinh;
    	}

    	$product->save();
    	return redirect('admin/san-pham/'.$id.'/sua-san-pham.html')->with('thongbao', 'Thêm sản phẩm thành công');
    }

    public function getXoa($id){
    	$product = Product::find($id);
    	unlink('upload/product/'. $product->hinh);
    	$product->delete();

    	return redirect('admin/san-pham/danh-sach.html')->with('thongbao', 'Đã xoá thành công');
    }
}
