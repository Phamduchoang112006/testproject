<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function getProductList(){
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.list', compact('product'));
    }

    public function getProductAdd(){
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function postProductAdd(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required|numeric',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->id_type = $request->category;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = time()."_".$name;
            $file->move("images/product", $image);
            $product->image = $image;
        } else {
            $product->image = "";
        }

        $product->save();
        return redirect()->route('admin.getProductList')->with('thongbao', 'Thêm thành công');
    }

    public function getProductDelete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.getProductList')->with('thongbao', 'Xóa thành công');
    }

    public function getProductEdit($id){
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'category'));
    }

    public function postProductEdit(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->id_type = $request->category;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = time()."_".$name;
            $file->move("images/product", $image);
            $product->image = $image;
        }

        $product->save();
        return redirect()->route('admin.getProductList')->with('thongbao', 'Sửa thành công');
    }
}
