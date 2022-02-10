@extends('dashboard.dashboard_master');


@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><b>Product List</b></h5>
                </div>
                <div class="car-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <th>serial</th>
                            <th>product name</th>
                            <th>old price</th>
                            <th>new price</th>
                            <th>product image</th>
                            <th>created at</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @forelse($all_products as $products)
                                <tr>
                                    <td>{{ $loop-> index+1}}</td>
                                    <td>{{$products->product_name}}</td>
                                    <td>{{$products->old_price}}</td>
                                    <td>{{$products->new_price}}</td>
                                    <td>
                                        <img src="{{asset('uploads/product_images')}}/{{$products->product_image}}" width="70px" height="60px" alt="not found">
                                    </td>
                                    <td>{{$products->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('product.edit',$products->id)}}" class="btn btn-warning  btn-sm">Edit</a>
                                            <a href="{{route('product.delete',$products->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="5">No Data Added</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection

