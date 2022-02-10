
@extends('dashboard.dashboard_master');


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><b>Subcategory Add Form</b></h5>
                </div>
                <div class="card-body">

                    @if(session('InsErr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('InsErr')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    @endif

                    @if(session('InsAdded'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('InsAdded')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    @endif
                    <form action="{{ route('subcategory.store')}}" method="post">
                        @csrf
                        <div class="mb-3">                            
                            <select class="custom-select" name="category_id">
                                <option value="">select a category</option>
                                @foreach($all_category as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <input type="text" class="form-control" name="subcategory_name" placeholder="enter subcategory name">
                            @error('subcategory_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>



@endsection

