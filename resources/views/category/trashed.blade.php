@extends('layouts.app');


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
                            <th>action</th>
                        </thead>
                        <tbody>
                            @forelse($all_trashed as $thashed_category)
                                <tr>
                                    <td>{{ $loop-> index+1}}</td>
                                    <td>{{$thashed_category -> category_name}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="#" class="btn btn-warning  btn-sm">Restore</a>
                                            <a href="{{url('category/delete') }}/{{$thashed_category->id}}" class="btn btn-danger btn-sm">Delete</a>
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

