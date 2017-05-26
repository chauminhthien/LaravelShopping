<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$user = User::all();

    	return view('admin.user.danhsach',['user' => $user]);
    }

    public function getThem(){
    	return view('admin.user.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:32',
    			'email' 	=> 'required|email|unique:users,email',
    			'password' 	=> 'required|min:3|max:32'
    		],[
    			'name.required' 		=> 'Chưa Nhập Tên User',
    			'name.min' 				=> 'Tên User quá ngắn',
    			'name.max' 				=> 'Tên User quá dài',
    			'email.required' 		=> 'Chưa Nhập email User',
    			'email.email' 			=> 'Email không đúng định dạng',
    			'email.unique' 			=> 'Email Đã Tồn Tại',
    			'password.required' 	=> 'Chưa Nhập PassWord User',
    			'password.min' 			=> 'PassWord quá ngắn',
    			'password.max' 			=> 'PassWord quá dài',
    			
    		]);

    	$user 				= new User;
    	$user->name 		= $request->name;
    	$user->email 		= $request->email;
    	$user->password 	= bcrypt($request->password);
    	$user->quyen 		= $request->quyen;

    	$user->save();
    	return redirect('admin/user/them-user.html')->with('thongbao', 'Đã Thêm User Thành Công');

    }

    public function getSua($id){
    	$user = User::find($id);

    	return view('admin.user.sua',['user' => $user]);
    }

    public function postSua(Request $request, $id){
    	$user = User::find($id);
    	$this->validate($request,[
    			'name' 		=> 'required|min:3|max:32',
    			'password' 	=> 'min:3|max:32'
    		],[
    			'name.required' 		=> 'Chưa Nhập Tên User',
    			'name.min' 				=> 'Tên User quá ngắn',
    			'name.max' 				=> 'Tên User quá dài',
    			'email.required' 		=> 'Chưa Nhập email User',
    			'email.email' 			=> 'Email không đúng định dạng',
    			'email.unique' 			=> 'Email Đã Tồn Tại',
    			'password.min' 			=> 'PassWord quá ngắn',
    			'password.max' 			=> 'PassWord quá dài',
    			
    		]);
    	$user->name = $request->name;

    	if($request->has('password')){
    		$user->password = bcrypt($request->password);
    	}else{
    		$user->password = $user->password;
    	}
    	$user->quyen = $request->quyen;
    	$user->save();

    	return redirect('admin/user/'.$id.'/sua-user.html')->with('thongbao','Update Thành Công');
    }

    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/danh-sach.html')->with('thongbao','Đã Xoá User Thành Công');
    }

    public function postlogin(Request $request){
        $this->validate($request,[
                'email'                 => 'required|email|max:50',
                'password'              => 'required|min:3|max:50',
            ], [
                'email.required'        => 'Email không được để trống',
                'email.email'           => 'Email Không đúng định dạng',
                'email.max'             => 'Name quá ngắn',
                'password.min'          => 'Mật khẩu quá ngắn',
                'password.max'          => 'Mật khẩu quá dài',
                'password.required'     => 'Mật khẩu không được để trống',
            ]);
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect('admin/cate/danh-sach.html');
        }else{
            return redirect('admin/dang-nhap.html')->with('thongbao','Đăng Nhập Thất Bại');
        }
    }

    public function getDangXuat(){
        Auth::logout();

        return redirect('admin/dang-nhap.html');
    }
}
