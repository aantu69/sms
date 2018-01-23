@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Role List</h3>
            <a class="btn btn-success" href="{{route('roles.create')}}"> Create Role</a>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Action</th>                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td><a href="{{ route('roles.edit', $role->id)}}">Edit</td>                     
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
