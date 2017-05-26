<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LienHe;
class LienHeController extends Controller
{
    public function getDanhSach(){
    	$lienhe = LienHe::all();
    	return view('admin.lienhe.danhsach', ['lienhe' => $lienhe]);
    }

    public function getXoa($id){
    	$lienhe = LienHe::find($id);
    	$lienhe->delete();

    	return redirect('admin/lien-he/danh-sach.html')->with('thongbao', 'Đã xoá thành công');
    }
}
