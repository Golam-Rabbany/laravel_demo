<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
// use Image;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        // print_r($request->all());
        $request->validate([
            'product_name'=> 'required',
            'old_price'=> 'required|numeric',
            'product_image'=> 'image',
        ]);
        $product_id = Product::insertGetId([
            'product_name'=> Str::lower($request->product_name),
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'created_at' => Carbon::now(),
        ]);

        if($request->hasFile('product_image')){

            $product_image_ext = $request->file('product_image')->getClientOriginalExtension();
            $product_image_name = $product_id.".".$product_image_ext;
            Image::make($request->file('product_image'))->resize(200,200)->save(base_path('public/uploads/product_images/'.$product_image_name));
            Product::find($product_id)->update([
                'product_image'=>$product_id."."."jpg",
            ]);
        }
        return back();
        
    }

    public function index(){
        $all_products = Product::all();
        return view('product.index',compact('all_products'));
    }

    public function delete($id){
        if(Product::find($id)->product_image != "product.jpg"){
            unlink(public_path()."/uploads/product_images/".Product::find($id)->product_image);
        };
        Product::find($id)->delete();
        return back();
    }

    public function edit($id){
        $product_info=Product::find($id);
        return view('product.edit',compact('product_info'));
    }

    public function update(Request $request){
        if($request->hasFile('product_image')){
            if(Product::find($request-> id)->product_image != "product.jpg"){
                unlink(public_path()."/uploads/product_images/".Product::find($request->id)->product_image);
            }
                $new_image_ext = $request->file('product_image')->getClientOriginalExtension();
                $image_name = $request->id.".".$new_image_ext;
                Image::make($request->file('product_image'))->resize(200,200)->save(base_path('public/uploads/product_images/'.$image_name));
                Product::find($request->id)->update([
                    'product_image'=>$request->id."."."jpg",
                ]);
                return back();
            
        }
    }




}
