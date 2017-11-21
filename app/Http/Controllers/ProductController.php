<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\model\Product;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $product = Product::all();
        return view('product.index',compact('product'));
    }

    public function release(Request $request) {
        $users= DB::table('employees')
            ->get();
        $all_product = Product::all();
        if (isset($request->product_id)) {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $product->number -= $request->number;
            if ($product->number == 0) {
                $product->status = "Hết hàng";
            }            $product->save();

            return redirect() ->route('product-index');
        }

        return view('product.release',compact('all_product','users'));
    }

    public function import(Request $request) {
        $users= DB::table('employees')
            ->get();
        $all_product = Product::all();
        if (isset($request->product_id)) {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $product->number += $request->number;
            $product->status = "Còn hàng";
            $product->save();

            return redirect() ->route('product-index');
        }

        return view('product.import',compact('all_product','users'));
    }


    public function add() {
        $product_type = DB::table('product_type')
            ->get();
        return view('product.create',compact('product_type'));
    }


    public function update($id){
        $product = DB::table('product')
            ->where('id',$id)
            ->first();
        return view('product.update',compact('product'));
    }

    public function edit($id, Request $request){
        $name=$request->name;
        $number=$request->number;
        $status=$request->status;
        $dongia=$request->dongia;
        $avatar=$request->avatar;

        if(isset($file))
        {
            $filename=$file->getClientOriginalName();
            $file->move('img',$filename);
            DB::table('product')
                ->where('id',$id)
                ->update(['name' => $name,'status' =>$status, 'dongia' =>$dongia,'avatar' => 'avatar/'.$filename ]);
        }
        DB::table('product')
            ->where('id',$id)
            ->update(['name' => $name,'status' =>$status, 'dongia' =>$dongia]);
        return redirect(url(route('product-index')))->with('thongbao','Sửa thành công');
    }

    public function delete($id)
    {
        DB::table('product')
            ->where('id',$id)
            ->delete();
        return redirect(url(route('product-index')))->with('thongbao','Xóa thành công');
    }

    public function createproduct(Request $request) {
        $name = $request->product_name;
        $number = $request->number;
        $dongia = $request->dongia;
        $avatar = $request->avatar;
        $filename = "";
        $num= Product::all()->where('name',$name) ->count();
        if($num>0) {
            return redirect()->back()->with('loi','Sản phẩm đã tồn tại!');
        }
        if(isset($avatar))
        {
            $filename=$avatar->getClientOriginalName();
            $avatar->move('img',$filename);
        }else {
            $filename = 'noimage.jpg';
        }
        $product = new Product();
        $product->name = $name;
        $product->number = $number;
        if ($number == 0) {
            $product->status = 'Hết hàng';
        }
        $product->avatar = 'img/'.$filename;
        $product->dongia = $dongia;
        $product->save();

        return redirect(url(route('product-index')))->with('thongbao','Tạo thành công');
    }
}
