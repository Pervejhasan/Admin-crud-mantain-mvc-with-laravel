
@extends('admin.master')


@section('title')
    Add Product

@endsection


@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Add Product</h1>
                        </div>
                        <h2 class="text-center text-success">{{session('message')}}</h2>
                        <div class="card-body">
                            <form action="{{route('update',['id'=>$product->id])}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label">Product name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" value="{{$product->name}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label">Brand name</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$product->brand_name}}" name="brand_name" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label">Category name</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$product->category_name}}" name="category_name" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label"> Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description"  type="text" id="" cols="55" rows="10">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" >
                                        <img src="{{asset('/')}}{{$product->image}}" height="250" alt="">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <label for="" class="me-4"><input type="radio" class="me-2" name="status" value="1" >Published</label>
                                        <label for=""><input type="radio" class="me-2" name="status" value="0" >Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="submit" value="Update Product" class="btn-primary btn btn-sm">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
