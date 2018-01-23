@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Role Creation</h3>
        </div>
        <div class="box-body">
          <form action="{{ route('roles.update', $role->id)}}" method="post" role="form" class="form-horizontal">
            {{ method_field('PATCH')}}
            {{csrf_field()}}
            
            <div class="box-body">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name of role</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="" placeholder="Name of role" value="{{$role->name}}">
                </div>
              </div>
              <div class="form-group">
                <label for="display_name" class="col-sm-2 control-label">Display name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="display_name" id="" placeholder="Display name" value="{{$role->display_name}}">
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="description" id="" placeholder="Description" value="{{$role->description}}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Permissions</label>
                <div class="col-sm-10">
                  @foreach($permissions as $permission)
                  <input type="checkbox" {{in_array($permission->id, $role_permissions) ? "checked" : ""}}   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
                  @endforeach
                </div>
            </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-default">Cancel</button>
              <button type="submit" class="btn btn-info pull-right">Sign in</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
    </div>
</div>
@endsection