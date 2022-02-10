@extends('dashboard.dashboard_master');


@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-8 m-auto">
            <div class="card">
                @if(session('delDone'))
                    <div class="alert alert-danger" role="alert">
                        {{session('delDone')}}
                    </div>
                @endif
                <div class="card-header">
                    <h5><b>Category List</b></h5>
                </div>
                <div class="car-body">
                
                    <table class="table table-bordered ">
                        <thead>
                            <th>serial</th>
                            <th>category name</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @forelse($all_trashed as $trashed_category)
                                <tr>
                                    <td>{{ $trashed_category -> id}}</td>
                                    <td>{{$trashed_category -> category_name}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('category/restore') }}/{{ $trashed_category->id }}" class="btn btn-warning  btn-sm">Restore</a>
                                            <a href="{{ url('category/vanish') }}/{{ $trashed_category->id }}" class="btn btn-danger btn-sm">Delete</a>
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

