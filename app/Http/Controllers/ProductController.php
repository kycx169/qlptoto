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
        $all_product = Product::all();
        if (isset($request->product_id)) {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $product->number -= $request->number;
            $product->status = "Còn hàng";
            $product->save();

            return redirect() ->route('product-index');
        }

        return view('product.release',compact('all_product'));
    }

    public function import(Request $request) {
        $all_product = Product::all();
        if (isset($request->product_id)) {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $product->number += $request->number;
            $product->status = "Còn hàng";
            $product->save();

            return redirect() ->route('product-index');
        }

        return view('product.import',compact('all_product'));
    }

    public function create(Request $request) {
        $name = $request->product_name;
        $product = Product::all();
        if (isset($name)) {
            $i = 0;
            foreach ($product as $p) {
                if ($p->name == $name) {
                    $i = 1;
                } else {
                    $i = 0;
                }
            }
            if ($i == 0) {
                if ($name)
                    $product = new Product();
                $product->name = $request->product_name;
                $product->number = $request->number;
                $product->avatar = $request->avatar;
                $product->dongia = $request->dongia;
                $product->save();
                $this->uploadfile($request);
                return redirect()->route('product-index');
            } else {
                return view('product.create');
            }

        } else {
            return view('product.create');
        }
    }
    public function uploadfile(Request $request) {
        if ($request->hasFile('avatar')) {
//
//            $filename = $request->file->getClientOriginalName();
//            $filesize = $request->file->getClientSize();
//            $request->file->storeAs('public/img',$filename);
//            $file = new File;
//            $file->name = $filename;
//            $file->name = $filesize;
//            $file->save();
            dd("ok");
        }

        return "OK";
    }
}
