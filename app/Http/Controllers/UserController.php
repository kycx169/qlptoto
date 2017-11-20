<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class UserController extends Controller
{
    public function index()
    {	
    	$users= DB::table('employees')
    	->get();
    	return view('qlnv.list',compact('users'));
    }

    public function trangchu()
    {   
        return view('trangchu');
    }

    public function login()
    {   
        return view('login');
    }
    public function logout()
    {   
        Session::forget('user');
        Session::forget('pass');
        return redirect(url(route('login')));
    }

     public function postLogin(Request $req)
    {   
        $user = $req->user;
        $pass = $req->pass;
        $numUser = DB::table('employees')
                ->where('user',$user)
                ->where('password',$pass)
                ->count();
        if($numUser<1) {
            return redirect()->back()->with('thongbao','Tài khoản không tồn tại!');
        } else {
            $info = DB::table('employees')
                    ->where('user',$user)
                    ->where('password',$pass)
                    ->first();
            $name=$info->name;
            $avatar=$info->avatar;
            Session::put('user', $user);
            Session::put('pass', $pass);
            Session::put('name', $name);
            Session::put('avatar', $avatar);
            return redirect(url(route('trangchu')));
        }
    }

    public function addUser()
    {	
    	return view('qlnv.add');
    }

    public function creatUser(Request $req)
    {	
    	$user=$req->user;
    	$pass=$req->pass;
    	$username=$req->username;
    	$birthday=$req->birthday;
    	$address=$req->address;
        $filename="";
    	$file=$req->file;
        $num=DB::table('employees')
            ->where('user',$user)
            ->count();
        if($num>0) {
            return redirect()->back()->with('loi','Tên đăng nhập đã tồn tại!');
        }
        if(isset($file))
        {
        	$filename=$file->getClientOriginalName();
        	$file->move('avatar',$filename);
        }
    	DB::table('employees')
    	->insert(['user' => $user, 'password' => $pass, 'name' => $username,
				  'birth_day' => $birthday, 'address' => $address, 'role' => 1, 
				  'avatar' => 'avatar/'.$filename
				 ]);
    	return redirect(url(route('qlnv')))->with('thongbao','Tạo thành công');
    }

    public function modifyUser($id){
    	$users = DB::table('employees')
    			->where('id',$id)
    			->first();
		return view('qlnv.modify',compact('users'));
    }

	public function editUser($id, Request $req){
			$user=$req->user;
	    	$pass=$req->pass;
	    	$username=$req->username;
	    	$birthday=$req->birthday;
	    	$address=$req->address;
	    	$file=$req->file;
            if(isset($file))
            {
                $filename=$file->getClientOriginalName();
                $file->move('avatar',$filename);
                DB::table('employees')
                ->where('id',$id)
                ->update(['user' => $user, 'password' => $pass, 'name' => $username,
                          'birth_day' => $birthday, 'address' => $address, 'role' => 1, 
                          'avatar' => 'avatar/'.$filename
                         ]);
            }
			DB::table('employees')
			->where('id',$id)
	    	->update(['user' => $user, 'password' => $pass, 'name' => $username,
					  'birth_day' => $birthday, 'address' => $address, 'role' => 1
					 ]);
			return redirect(url(route('qlnv')))->with('thongbao','Sửa thành công');
	    }

    public function deleteUser($id)
    {	
    	DB::table('employees')
    	->where('id',$id)
    	->delete();
    	return redirect(url(route('qlnv')))->with('thongbao','Xóa thành công');
    }
}
