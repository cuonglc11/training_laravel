<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use App\Services\Upload\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Categories::select('id', 'name')->get();
        $products = Products::select('name', 'price', 'img', 'id_category', 'id', 'updated_at')->get();
        return view('admin.product.index', ['data' => $products, 'categories' => $categories]);
    }

    public function store(ProductRequest $request)
    {
        $product = new  Products();
        $file = $request->file('image');
        $product->img = UploadImage::new()->upload($file, 'assets/upload/product');
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));
        $product->price = $request->input('price');
        $product->id_category = $request->input('category');
        if ($product->save()) {
            return response()->json(['success' => 'Thêm sản phẩm thành công'], 200);
        }
        return response()->json(['err' => 'Thêm sản phẩm lỗi thất bại'], 400);

    }

    public function show(Request $request)
    {
        $product = Products::select('name', 'price', 'img', 'id_category', 'id', 'updated_at')->find($request->input('id'));
        if ($product) {
            return response()->json(['data' => $product, 'img' => asset('assets/upload/product/' . $product->img)], 200);
        }
        return response()->json(['data' => 'not data'], 400);
    }

    public function update(Request $request)
    {
        $product = Products::find($request->input('id'));
        $file = $request->file('image');
        if ($request->hasFile('image')){
            $product->img = UploadImage::new()->update('assets/upload/product/' . $product->name, $file, 'assets/upload/product');
        }
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));
        $product->price = $request->input('price');
        $product->id_category = $request->input('category');
        if ($product->save()) {
            return response()->json(['success' => 'Thêm sản phẩm thành công'], 200);
        }
        return response()->json(['err' => 'Thêm sản phẩm lỗi thất bại'], 400);
    }
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Products::find($id)->delete();
        return response()->json(['success' => 'xoá thành công thành công'], 200);

    }
}
