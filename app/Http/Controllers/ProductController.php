<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Support\Facades\DB;
use App\model\Product;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Http\Request;
use App\model\Bill;
use App\model\Bill_detail;

class ProductController extends Controller
{
    public function index(Request $request) {
        $id = $request->product_type_id;
        if(!isset($id)){
            $product = DB::table('product')
                ->join('product_type','product.type','product_type.id')
                ->select('product.id','masp','created_date','product.name','number','avatar','position','dongia','gianhap','product_type.name as type_name')
                ->get();
//            dd($product);
        } else {
            $product = DB::table('product')
                ->join('product_type','product.type','product_type.id')
                ->select('product.id','masp','created_date','product.name','number','avatar','position','dongia','gianhap','product_type.name as type_name')
                ->where('product.type',$id)
                ->get();
        }
        $product_type = DB::table('product_type')->get();
//        dd($id);
        return view('product.index',compact('product','product_type','id'));
    }

    public function release(Request $request) {
        $product_type = DB::table('product_type')->get();
        $users= DB::table('employees')
            ->get();
        $bill_number = DB::table('bill')->count() + 1;
//        $all_product = Product::all();
        $id = $request->product_type_id;
        if(!isset($id)){
            $all_product = DB::table('product')
                ->join('product_type','product.type','product_type.id')
                ->select('product.id','masp','created_date','product.name','number','avatar','position','dongia','gianhap','product_type.name as type_name')
                ->get();
//            dd($product);
        } else {
            $all_product = DB::table('product')
                ->join('product_type','product.type','product_type.id')
                ->select('product.id','masp','created_date','product.name','number','avatar','position','dongia','gianhap','product_type.name as type_name')
                ->where('product.type',$id)
                ->get();
        }
        if (isset($request->product_id)) {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $product->number -= $request->number;
            $product->save();

            return redirect() ->route('product-index');
        }
//        dd($product);
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('product.release', ['cartProducts' => $cart->items, 'totalPrice' => $cart->totalPrice, 'all_product' => $all_product,'id'=>$id,'product_type' =>$product_type, 'bill_number' => $bill_number]);
        }
//        dd($product_type);
        return view('product.release',compact('all_product','users','bill_number','product_type','id'));
    }

    public function getXuatNhapTon() {
        $product = Product::all();
        return view('product.xuatnhapton',compact('product'));
    }

    public function getAddToCart(Request $request)
    {
        $id = $request->id;
        $number = $request->number;
        $products = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products,$products->id, $number);
        $request->session()->put('cart',$cart);
//        dd($request->session()->get('cart'));
        $products->decrement('number', $number);
        $products->sohangxuat += $number;
        $products->save();
        return redirect()->route('product-release');
    }

    public function getDelCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        Product::find($id)->increment('number', $cart->items[$id]['qty'] );
        $cart->removeItem($id);
        Session::put('cart',$cart);

        return redirect()->route('product-release');
    }

    public function createBill(Request $request){
        $employee = Session::get('name');
        $customer = $request->name;
        $time = date('Y-m-d');
        $bill = new Bill();
        $bill->created_date = $time;
        $bill->employee_name = $employee;
        $bill->customer_name = $customer;
        $bill->total_price =  Session::get('cart')->totalPrice;
        $bill->save();

        $arr = [];
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $carts = $oldCart->items;
            $total = $oldCart->totalPrice;
            foreach ($carts as $cart)
            {
                $arr[] = $cart['item']['original'];
            }
            foreach ($arr as $item)
            {
                $masp = $item['masp'];
                $created_date = $item['created_date'];
                $name = $item['name'];
                $number = $item['number'];
                $avatar = $item['avatar'];
                $dongia = $item['dongia'];
                $type = $item['type'];
                $position = $item['position'];

                DB::table('bill_detail')->insert(
                    ['created_date'=>$created_date,'employee_name' => $employee,'customer_name' => $customer,
                    'masp' =>$masp, 'product_name' =>$name, 'number' =>$number, 'avatar' =>$avatar,
                    'dongia' =>$dongia, 'type' =>$type, 'position' =>$position,'bill_id' =>$bill->id ]
                );
            }
        }
        Session::forget('cart');
        return "ok";
    }

    public function getListbilldetail($id) {
        $bill_detail = DB::table('bill_detail')
                        ->where('bill_id',$id)
                        ->get();
        $bill = Bill::all();
        return view('product.detail_bill',compact('bill_detail','bill'));
    }

    public function getListBill(Request $request){
        if($request->from_date == null || $request->to_date == null){
            $from_date = date('Y-m-d', strtotime('-2 months'));
            $to_date = date('Y-m-d');
        } else {
            $from_date = date('Y-m-d', strtotime($request->from_date));
            $to_date = date('Y-m-d', strtotime($request->to_date));
        }
        $bills=DB::table('bill')
        ->where(function ($query) use ($from_date, $to_date) {
            $query->whereBetween('created_date',[$from_date, $to_date]);
        })
        ->get();
        return view('product.list_bill',compact('bills','from_date','to_date'));
    }

    public function xoasession()
    {
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        foreach ($cart->items as $id => $value) {
            Product::find($id)->increment('number', $cart->items[$id]['qty'] );
            $cart->removeItem($id);
        };

        Session::forget('cart');
        return redirect()->route('product-release');
    }

    public function import(Request $request) {
        $product_type = DB::table('product_type')->get();
        $id = $request->product_type_id;
        if(!isset($id)){
            $all_product = DB::table('product')
                ->join('product_type','product.type','product_type.id')
                ->select('product.id','masp','created_date','product.name','number','avatar','position','dongia','gianhap','product_type.name as type_name')
                ->get();
        } else {
            $all_product = DB::table('product')
                ->join('product_type','product.type','product_type.id')
                ->select('product.id','masp','created_date','product.name','number','avatar','position','dongia','gianhap','product_type.name as type_name')
                ->where('product.type',$id)
                ->get();
        }

        return view('product.import',compact('all_product','product_type','id'));
    }

    public function postImport(Request $request){
        $pro_id = $request->product_id;
        $pro_num = $request->number;
        $pro_arr = [];
        for($i=0; $i < count($pro_id); $i++) {
            array_push($pro_arr, ["id"=>$pro_id[$i], "num" => $pro_num[$i]]);
        }
        foreach ($pro_arr as $pro){
             $product = Product::find($pro["id"]);
             $product->number += $pro["num"];
             $product->sohangnhap += $pro["num"];
             $product->save();
        }
        return redirect()->back();
    }

    public function add() {
        $product_type = DB::table('product_type')
            ->get();
        return view('product.create',compact('product_type'));
    }

    public function update($id){
        $product_type = DB::table('product_type')->get();
        $product = DB::table('product')
            ->where('id',$id)
            ->first();
        return view('product.update',compact('product','product_type'));
    }

    public function edit($id, Request $request){
        $name=$request->name;
        $number=$request->number;
        $masp=$request->masp;
        $loaisp=$request->type;
        $position=$request->position;
        $dongia=$request->dongia;
        $gianhap=$request->gianhap;
        $avatar=$request->avatar;
        if(isset($avatar))
        {
            $filename=$avatar->getClientOriginalName();
            $avatar->move('img',$filename);
            DB::table('product')
                ->where('id',$id)
                ->update(['name' => $name, 'dongia' =>$dongia,'masp' =>$masp,'gianhap' =>$gianhap,'position' =>$position,'type' =>$loaisp,'avatar' => 'img/'.$filename ]);
        } else {
            DB::table('product')
                ->where('id',$id)
                ->update(['name' => $name, 'dongia' =>$dongia,'masp' =>$masp,'position' =>$position,'gianhap' =>$gianhap,'type' =>$loaisp]);
        }
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
        $code = $request->product_code;
//        $number = $request->number;
        $type = $request->type;
        $position=$request->position;
        $dongia = $request->dongia;
        $gianhap = $request->gianhap;
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
        $product->masp = $code;
        $product->number = 0;
        $product->type = $type;
        $product->position = $position;
        $product->avatar = 'img/'.$filename;
        $product->dongia = $dongia;
        $product->gianhap = $gianhap;
        $product->save();

        return redirect(url(route('product-index')))->with('thongbao','Tạo thành công');
    }
}
