@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length"><h3 class="box-title">User List</h3></div>
                </div>
                <div class="col-sm-6 dataTables_length" style="text-align: right;">
                    <div class="dataTables_length"><a class="btn btn-success" href="{{route('users.create')}}"> Create User</a></div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th> 
                        <th>Roles</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                            <span class="btn btn-success btn-sm">{{ $role->name }}</span>&nbsp;
                            @endforeach
                        </td>
                        <td>
                            <input type="button" class="btn btn-info" value="Edit"/>
                            <input type="button" class="btn btn-danger" value="Delete"/>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
