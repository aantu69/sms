@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Permission List</h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Display Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>{{ $permission->display_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
