<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;

class SlideController extends Controller
{
    //

    public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide' => $slide]);
    }

    public function getThem(){
    	return view('admin.slide.them');
    }

    public function postThem(Request $request){
    	$slide = new Slide;
    	$this->validate($request,[
    			'hinh' => 'required'
    		],[
    			'hinh.required' => 'Chưa Chọn Hình Ảnh'
    		]);
    	$file = $request->file('hinh');
    	$size = $file->getClientSize();
    	$duoi = $file->getClientOriginalExtension();
    	if($size < (2*1024*1024)){
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpge'){ 
                return redirect('admin/slide/them.html')->with('thongbao','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
            
                $file->move('upload/slide', $hinh);
                $slide->hinh             = $hinh;
            }
    	}else{
    		return redirect('admin/slide/them.html')->with('thongbao', 'File quá lớn');
    	}
    	$slide->save();
    	return redirect('admin/slide/them.html')->with('thongbao', 'Up File Thành Công');
    }

    public function getSua($id){
    	$slide = Slide::find($id);
    	return view('admin.slide.sua',['slide' => $slide]);
    }

    public function postSua(Request $request, $id){
    	$slide = Slide::find($id);

    	$this->validate($request,[
    			'hinh' => 'required'
    		],[
    			'hinh.required' => 'Bạn Chưa Chọn Hình Ảnh'
    		]);
    	$file = $request->file('hinh');
    	$size = $file->getClientSize();
    	$duoi = $file->getClientOriginalExtension();
    	if($size < (2*1024*1024)){
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpge'){ 
                return redirect('admin/slide/'.$id.'/sua.html')->with('thongbao','Ảnh Không Đúng Định dạng');
            }else{
                $hinh = time().'_'.str_random(4).'_.'.$duoi;
            
                $file->move('upload/slide', $hinh);
                unlink('upload/slide/'.$slide->hinh);
                $slide->hinh             = $hinh;
            }
    	}else{
    		return redirect('admin/slide/'.$id.'/sua.html')->with('thongbao', 'File quá lớn');
    	}
    	$slide->save();
    	return redirect('admin/slide/'.$id.'/sua.html')->with('thongbao', 'Up File Thành Công');
    }

    public function getXoa($id){
    	$slide = Slide::find($id);
    	unlink('upload/slide/'. $slide->hinh);
    	$slide->delete();
    	return redirect('admin/slide/danh-sach.html')->with('thongbao', 'Đã Xoá Ảnh Thành Công');
    }
}
