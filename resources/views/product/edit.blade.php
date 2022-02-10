@extends('dashboard.dashboard_master');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    Product Edit Form
                </div>
                <div class="card-body">
                    @if(session('InsDome'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{session('InsDone')}}</strong>
                    </div>
                    @endif

                    <form action="{{ route('product.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Product name</label>
                        <input type="hidden" name="id" value="{{ $product_info -> id }}">
                        <input type="text" class="form-control" name="product_name" value="{{ $product_info -> product_name }}">
                        @error('product_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Old Price</label>
                        <input type="text" class="form-control" name="old_price" value="{{$product_info-> old_price}}">
                        @error('old_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">New Price</label>
                        <input type="text" class="form-control" name="new_price" value="{{$product_info-> new_price}}">
                        @error('new_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Product Image</label>
                        <input type="file" class="form-control" name="product_image" value="">
                        @error('product_image')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/product_images') }}/{{$product_info->product_image}}" alt="" width="80px" height="70px">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection