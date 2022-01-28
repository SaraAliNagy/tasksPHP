@extends('backend.layouts.parent')

@section('title', 'Edit Products')

@section('content')
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @include('backend.includes.message');
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-6">
                <label for="">Name En</label>
                <input type="text" name="name_en" id="name_en" value="{{ $product->name_en }}" class="form-control"
                    placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-6">
                <label for="">Name Ar</label>
                <input type="text" name="name_ar" id="name_ar" value="{{ $product->name_ar }}" class="form-control"
                    placeholder="" aria-describedby="helpId">
            </div>
        </div>
        <div class="form-row">
            <div class="col-4">
                <label for="">Price</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-control"
                    placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-4">
                <label for="">Code</label>
                <input type="number" name="code" id="code" value="{{ $product->code }}" class="form-control"
                    placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-4">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control"
                    placeholder="" aria-describedby="helpId">
            </div>
        </div>
        <div class="form-row">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Not Active</option>
                </select>

            </div>
            <div class="col-4">
                <label for="brand">Brands</label>
                <select name="brands_id" id="brands_id" class="form-control">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brands_id ? 'selected' : '' }}>
                            {{ $brand->name_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="subcategories">SubCategories</label>
                <select name="subcategories_id" id="subcategories_id" class="form-control">
                    @foreach ($subcategories as $subcategorie)
                        <option value="{{ $subcategorie->id }}"
                            {{ $subcategorie->id == $product->subcategories_id ? 'selected' : '' }}>
                            {{ $subcategorie->name_en }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <label for="desc_en">Desc En</label>
                <textarea name="desc_en" id="desc_en" cols="30" rows="10"
                    class="form-control">{{ $product->desc_en }}</textarea>
            </div>
            <div class="col-6">
                <label for="desc_ar">Desc Ar</label>
                <textarea name="desc_ar" id="desc_ar" cols="30" rows="10"
                    class="form-control">{{ $product->desc_ar }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="col-6">
                <img src="{{ url('/dist/img/products' . $product->image) }}" alt="" class="w-100">
            </div>
        </div>
        <div class="form-row">
            <div class="mx-auto ">
                <button class="btn btn-warning my-2">Update</button>
            </div>
        </div>
    </form>
@endsection
