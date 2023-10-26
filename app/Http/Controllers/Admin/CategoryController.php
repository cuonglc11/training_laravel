<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use App\Services\Upload\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::select('id', 'name', 'image', 'updated_at')->get();
        return view('admin.category.index', ['data' => $categories]);
    }

    public function store(CategoryEditRequest $request)
    {
        $category = new Categories();
        $file = $request->file('image');
        $category->image = UploadImage::new()->upload($file, 'assets/upload/category');
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        if ($category->save()) {
            return response()->json(['success' => 'thêm thành công'], 200);
        }
        return response()->json(['success' => 'thêm thất bại'], 400);


    }
    public function show(Request $request) {
        $category = Categories::select('name' , 'id' ,'image')->find($request->input('id'));
        if ($category) {
            return response()->json(['data' => $category, 'img' => asset('assets/upload/category/' . $category->image)], 200);
        }
        return response()->json(['data' => 'not data'], 400);

    }

    public function update(Request $request)
    {
        $category = Categories::find($request->input('id'));
        $file = $request->file('image');
        if ($request->hasFile('image')){
            $category->image = UploadImage::new()->update('assets/upload/category/' . $category->name, $file, 'assets/upload/category');
        }
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        if ($category->save()) {
            return response()->json(['success' => 'sửa  thành công thành công'], 200);
        }
        return response()->json(['success' => 'sửa  thành công thất bại'], 400);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Categories::find($id)->delete();
        return response()->json(['success' => 'xoá thành công thành công'], 200);

    }
}
