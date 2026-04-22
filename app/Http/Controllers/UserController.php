<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $req){
        $req->validate(
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]
        );
        $credentials=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect('/admin/category/danhsach')->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

    public function getUserList(){
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }

    public function getUserAdd(){
        return view('admin.user.add');
    }

    public function postUserAdd(Request $request){
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->full_name = $request->fullname;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.getUserList')->with('thongbao', 'Thêm thành công');
    }

    public function getUserDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.getUserList')->with('thongbao', 'Xóa thành công');
    }

    public function getUserEdit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function postUserEdit(Request $request, $id){
        $user = User::find($id);
        $user->full_name = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.getUserList')->with('thongbao', 'Sửa thành công');
    }
}
