<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCateList(){
        $cates = Category::all();
        return view('admin.category.cate-list', compact('cates'));
    }

    public function getCateAdd(){
        return view('admin.category.cate-add');
    }

    public function postCateAdd(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:type_products,name',
            'description' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'name.unique' => 'Tên loại sản phẩm đã tồn tại',
            'description.required' => 'Bạn chưa nhập mô tả',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('source/image/product', $filename);
            $category->image = $filename;
        }
        $category->save();

        return redirect()->route('admin.getCateList')->with('thongbao', 'Thêm thành công');
    }

    public function getCateEdit($id){
        $category = Category::find($id);
        return view('admin.category.cate-edit', compact('category'));
    }

    public function postCateEdit(Request $request, $id){
        $category = Category::find($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'description.required' => 'Bạn chưa nhập mô tả',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('source/image/product', $filename);
            $category->image = $filename;
        }
        $category->save();

        return redirect()->route('admin.getCateList')->with('thongbao', 'Sửa thành công');
    }

    public function getCateDelete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.getCateList')->with('thongbao', 'Xóa thành công');
    }
}
