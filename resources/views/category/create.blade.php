
@extends('dashboard.dashboard_master');


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><b>Category Add Form</b></h5>
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
                    <form action="{{ url('/category/store') }}" method="post">
                        @csrf
                    <div class="mb-3">
                            <input type="text" class="form-control" name="category_name" placeholder="enter category name">
                            @error('category_name')
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

