@extends('layouts.app');


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><b>Role Add Form</b></h5>
                </div>
                <div class="card-body">
                    @if(session('InsErr'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('InsErr')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    @endif
                    <form action="{{ url('/role/add') }}" method="post">
                        @csrf
                    <div class="mb-3">
                            <input type="text" class="form-control" name="role">
                            @error('role')
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

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><b>Role List</b></h5>
                </div>
                <div class="car-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <th>serial</th>
                            <th>role</th>
                            <th>status</th>
                            <th>created at</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @forelse($all_roles as $role)
                                <tr>
                                    <td>{{ $loop-> index+1}}</td>
                                    <td>{{$role->role}}</td>
                                    <td>{{$role->status}}</td>
                                    <td>{{$role->created_at->diffForHumans()}}</td>
                                    <td></td>
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

