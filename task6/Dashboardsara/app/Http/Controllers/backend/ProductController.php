<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use photos;

    public function index()
    {
        $products = DB::table('products')
            ->select('id', 'name_en', 'name_ar', 'price', 'status', 'code', 'quantity', 'created_at')
            ->get();
        return view('backend.products.index', compact('products')); //compact =>transfer variable to array
    }


    public function create()
    {
        $brands = DB::table('brands')->select('*')->get(); //select('*') => default
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->where('status', '=', 1)->get(); // '=' => default
        return view('backend.products.create', compact('brands', 'subcategories'));
    }


    public function edit($productId)

    {
        $brands = DB::table('brands')->select('*')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->where('status', '=', 1)->get(); // '=' => default

        $product = DB::table('products')
            ->select('*')->where('id', $productId)
            ->first();
        return view('backend.products.edit', compact('product', 'brands', 'subcategories'));
    }
    public function store(StoreProductRequest $request) // $requset=> obj
    {
        //  dd($request->all()); //all => transfer data to array



        // //create photo name
        // $photoName = uniqid() . '.' . $request->image->extension(); //exttension method in request class
        // $request->image->move(public_path('/dist/img/products'), $photoName); //public_path() absolute path
        $photoName = $this->uploadPhoto($request->image, 'products');

        $dataOfProduct = $request->except('_token', 'image', 'page');
        $dataOfProduct['image'] = $photoName;
        DB::table('products')->insert($dataOfProduct);


        if ($request->page == 'return') {
            return redirect()->back()->with('Success', 'Successful Store');
        } else {
            return redirect()->route('products.index')->with('Success', 'Successful Store');
        }
    }



    public function update($productId, UpdateProductRequest $request)

    {
        // dd($request->all());


        // dd($request->all());
        $dataOfProduct = $request->except('_token', 'image', '_method');
        if ($request->has('image')) {
            $oldImage = DB::table('products')->select('image')->where('id', $productId)->first()->image;
            // dd($oldImage);

            // if (file_exists(public_path('/dist/img/products/' . $oldImage))) {
            //     unlink(public_path('/dist/img/products/' . $oldImage));
            // }
            $this->deletePhoto(public_path('/dist/img/products/' . $oldImage));

            $photoName = $this->uploadPhoto($request->image, 'products');
            $dataOfProduct['image'] = $photoName;
        }

        DB::table('products')
            ->where('id', $productId)
            ->update($dataOfProduct);
        return redirect()->back()->with('Success', 'Successful Update');
    }



    public function destroy($productId)
    {
        $oldImage = DB::table('products')->select('image')->where('id', $productId)->first()->image;
        // if (file_exists(public_path('/dist/img/products/' . $oldImage))) {
        //     unlink(public_path('/dist/img/products/' . $oldImage));
        // }
        $this->deletePhoto(public_path('/dist/img/products/' . $oldImage));
        DB::table('products')->where('id', $productId)->delete();
        return redirect()->route('products.index')->with('Success', 'Successful Destroy');
    }
}
