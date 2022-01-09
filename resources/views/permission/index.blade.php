@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Permission</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::to('/vendors/datatables/datatables.min.css') }}">
@endsection
@section('title')
Admin Permission
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
    </div>
    <div class=" @can('Create Role') col-lg-8 @else col-lg-12 @endcan">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Data Role</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-sm table-striped" id="table-role">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Guard</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
    @can('Create Role')
    <div class="col-lg-4 col-sm-12 order-lg-last order-md-first">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Tambah Role</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.role.create') }}" id="addRole" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Nama Role</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{ old('role_name') }}" name="role_name"
                                type="text" placeholder="Text">
                            @error('role_name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label">Permissions</label>
                        <div class="col-md-12 col-form-label">
                            @foreach($permissions as $index => $permission)
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="check{{ $index }}" type="checkbox"
                                    name="permission[]" value="{{ $permission->id }}">
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
                        document.getElementById('addRole').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset" onclick="event.preventDefault();
                        document.getElementById('addRole').reset();">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
@section('script')
<script src="{{ URL::to('/vendors/datatables/datatables.min.js') }}"></script>
<script>
    $('#table-role').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.role.index') }}",
        },
        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'guard_name',
                name: 'guard_name'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
        ]
    });
</script>
@endsection