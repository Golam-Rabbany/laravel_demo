
@extends('dashboard.dashboard_master');


@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><b>Category List</b></h5>
                </div>
                <div class="car-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <th>serial</th>
                            <th>category name</th>
                            <th>status</th>
                            <th>created at</th>
                            <th>added by</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @forelse($all_categories as $categories)
                                <tr>
                                    <td>{{ $loop-> index+1}}</td>
                                    <td>{{$categories->category_name}}</td>
                                    <td>
                                        @if($categories->status == 1)    
                                            <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-warning">De-active</span>
                                        @endif
                                    </td>
                                    <td>{{$categories->created_at->format('d-m-Y') }}</td>
                                    <td>{{$categories->relationToUser->name}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('category/edit') }}/{{$categories->id}}" class="btn btn-warning  btn-sm">Edit</a>
                                            <a href="{{url('category/delete') }}/{{$categories->id}}" class="btn btn-danger btn-sm">Delete</a>
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

