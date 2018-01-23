@extends('layouts.admin')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
        </div>
        <div class="box-body">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            {{-- You are logged in! --}}
        </div>
    </div>
</div>
@endsection
