<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cate;

class CateController extends Controller
{
    //

    public function getDanhSach(){
    	$cate = Cate::all();
    	return view('admin.cate.danhsach', ['cate' => $cate]);
	}

	public function getThem(){
		$cate = Cate::all()->where('paren_id',0);
		return view('admin.cate.them', ['cate' => $cate]);
	}

	public function postThem(Request $request){
		$this->validate($request,[
				'name' => 'required|min:3|max:32'
			],[
				'name.required' 	=> 'Category không được trống',
				'name.min' 			=> 'Category quá ngắn',
				'name.max' 			=> 'Category quá dài'
			]);
		$cate 			= New Cate;
		$cate->name 	= $request->name;
		$cate->url 		= changeTitle($request->name);
		$cate->paren_id = $request->paren_id;
		$cate->save();

		return redirect('admin/cate/them-cate.html')->with('thongbao', 'Đã Thêm dữ liệu thành công');
	}

	public function getSua($id){
		$cate = Cate::all()->where('paren_id',0);
		$cat = Cate::find($id);
		return view('admin.cate.sua', ['cate' => $cate, 'cat' => $cat]);
	}

	public function postSua(Request $request, $id){
		$cate = Cate::find($id);
		$this->validate($request,[
				'name' => 'required|min:3|max:32'
			],[
				'name.required' 	=> 'Category không được trống',
				'name.min' 			=> 'Category quá ngắn',
				'name.max' 			=> 'Category quá dài'
			]);
		$cate->name 	= $request->name;
		$cate->url 		= changeTitle($request->name);
		if($request->has('paren_id')){
			$cate->paren_id = $request->paren_id;
		}else{
			$cate->paren_id = $cate->paren_id;
		}
		$cate->save();
		return redirect('admin/cate/'.$id.'/sua-cate.html')->with('thongbao', 'Update Thành Công');
	}

	public function getXoa($id){
		
		$cate = Cate::all()->where('paren_id',($id + 0))->count();
		if($cate > 0){
			return redirect('admin/cate/danh-sach.html')->with('thongbao',' Không Thể Xoá Cate Cha');
		}else{
			$ca = Cate::find($id);
			$ca->delete();
			return redirect('admin/cate/danh-sach.html')->with('thongbao',' Xoá Thành công');
		}
	}
}
