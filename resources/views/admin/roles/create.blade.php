@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Role Creation</h3>
        </div>
        <div class="box-body">
          <form action="{{route('roles.store')}}" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name of role</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="" placeholder="Name of role">
                </div>
              </div>
              <div class="form-group">
                <label for="display_name" class="col-sm-2 control-label">Display name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="display_name" id="" placeholder="Display name">
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="description" id="" placeholder="Description">
                </div>
              </div>

              <div class="form-group">
                  <h3>Permissions</h3>
                  @foreach($permissions as $permission)
                  <input type="checkbox"   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
                  @endforeach
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