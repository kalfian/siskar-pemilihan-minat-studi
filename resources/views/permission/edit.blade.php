@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Role</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('title')
Admin Role
@endsection
@section('content')
<div class="row">
    @can('Create Role')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit Role</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.role.update', $role->id) }}" id="updateRole"
                    method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Role</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $role->name }}" name="role_name" 
                                type="text"  placeholder="Text">
                            @error('role_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Permissions</label>
                        <div class="col-md-9 col-form-label">

                            @foreach($permissions as $index => $permission)
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="check{{ $index }}" type="checkbox"
                                    name="permission[]" @if($role->hasPermissionTo($permission->id)) checked @endif
                                value="{{ $permission->id }}">
                                <label class="form-check-label" for="check{{ $index }}">{{ $permission->name }}</label>
                            </div>
                            @endforeach

                            @if($errors->has('permission'))
                            <span class="help-block text-danger">{{ $errors->first('permission') }}</span>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                        document.getElementById('updateRole').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <a href="{{route('admin.role.index')}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-ban"></i> Cancel</a>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
