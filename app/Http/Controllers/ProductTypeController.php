<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductTypeController extends Controller
{
    public function index()
    {	
    	$types= DB::table('product_type')
    	->get();
    	return view('loaisanpham.index',compact('types'));
    }

    public function add()
    {
    	return view('loaisanpham.add');
    }

    public function create(Request $req)
    {
    	$name=$req->name;
        $num=DB::table('product_type')
            ->where('name',$name)
            ->count();
        if($num>0) {
            return redirect()->back()->with('loi','Loại sản phẩm đã tồn tại !');
        }
    	DB::table('product_type')
    	->insert(['name' => $name]);
    	return redirect(url(route('index')))->with('thongbao','Tạo thành công');
    }

    public function update($id){
    	$types = DB::table('product_type')
    			->where('id',$id)
    			->first();
		return view('loaisanpham.update',compact('types'));
    }

	public function edit($id, Request $request){
			$name=$request->name;
	    	DB::table('product_type')
			->where('id',$id)
	    	->update(['name' => $name]);
			return redirect(url(route('index')))->with('thongbao','Sửa thành công');
	    }

    public function delete($id)
    {	
    	DB::table('product_type')
    	->where('id',$id)
    	->delete();
    	return redirect(url(route('index')))->with('thongbao','Xóa thành công');
    }
}
