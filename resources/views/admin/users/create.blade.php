@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User Creation</h3>
        </div>
        <div class="box-body">
          <form action="{{route('users.store')}}" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="password">
                </div>
              </div>

              <div class="form-group">
                <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password-confirmation" id="password-confirm">
                </div>
              </div>

              <div class="form-group">
                <label  class="col-sm-2 control-label">Roles</label>
                <div class="col-sm-10">
                  @foreach($roles as $role)
                  <input type="checkbox"   name="role[]" value="{{$role->id}}" > {{$role->name}} <br>
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