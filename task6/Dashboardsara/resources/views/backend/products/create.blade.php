@extends('backend.layouts.parent')

@section('title', 'Create Products')

@section('content')

@include('backend.includes.message');
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-6">
                <label for="">Name En</label>
                <input type="text" name="name_en" id="name_en" value="{{old('name_en')}}" class="form-control" placeholder=""
                    aria-describedby="helpId">
                @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="">Name Ar</label>
                <input type="text" name="name_ar" id="name_ar" value="{{old('name_ar')}}" class="form-control" placeholder=""
                    aria-describedby="helpId">
                @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-4">
                <label for="">Price</label>
                <input type="number" name="price" id="price" value="{{old('price')}}" class="form-control" placeholder="" aria-describedby="helpId">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="">Code</label>
                <input type="number" name="code" id="code" value="{{old('code')}}" class="form-control" placeholder="" aria-describedby="helpId">
                @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{old('quantity')}}" class="form-control" placeholder=""
                    aria-describedby="helpId">
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option {{old('status' == 1 ? 'selected' : '')}} value="1">Active</option>
                    <option {{old('status' == 0 ? 'selected' : '')}} value="0">Not Active</option>
                </select>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label for="brand">Brands</label>
                <select name="brands_id" id="brands_id" class="form-control">
                    @foreach ($brands as $brand)
                        <option {{old('brands_id' ==  $brand->id ? 'selected' : '')}} value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-4">
                <label for="subcategories">SubCategories</label>
                <select name="subcategories_id" id="subcategories_id" class="form-control">
                    @foreach ($subcategories as $subcategorie)
                        <option {{old('subcategories_id' ==  $subcategorie->id ? 'selected' : '')}} value="{{ $subcategorie->id }}">{{ $subcategorie->name_en }}</option>
                    @endforeach
                </select>
                @error('subcategories_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <label for="desc_en">Desc En</label>
                <textarea name="desc_en" id="desc_en" cols="30" rows="10" class="form-control">{{old('desc_en')}}</textarea>
            </div>
            @error('desc_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-6">
                <label for="desc_ar">Desc Ar</label>
                <textarea name="desc_ar" id="desc_ar" cols="30" rows="10" class="form-control">{{old('desc_ar')}}</textarea>
            </div>
            @error('desc_ar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-row">
            <div class="col-12">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-row">
            <div class="mx-auto ">
                <button class="btn btn-success my-2" name="page" value="index">Create</button>
            </div>
        </div>
        <div class="form-row">
            <div class="mx-auto ">
                <button class="btn btn-primary my-2" name="page" value="return">Create & return</button>
            </div>
        </div>
    </form>
@endsection
