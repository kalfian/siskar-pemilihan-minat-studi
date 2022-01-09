@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Admin</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::to('/vendors/datatables/datatables.min.css') }}">
@endsection
@section('title')
List Admin
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Tambah Admin</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.store') }}" id="addAdmin" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ old('name') }}" name="name"
                                type="text"  placeholder="Nama">
                            @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ old('email') }}" name="email"
                                type="text"  placeholder="Email">
                            @error('email')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Password</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ old('password') }}" name="password"
                                type="password"  placeholder="Password">
                            @error('password')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check form-check-inline mr-3">
                                <input checked="checked" class="form-check-input" id="active" type="radio" value="1"
                                    name="status">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" id="non-active" type="radio" value="0"
                                    name="status">
                                <label class="form-check-label" for="non-active">Non Active</label>
                            </div>
                            <br>
                            @error('status')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                        document.getElementById('addAdmin').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset" onclick="event.preventDefault();
                        document.getElementById('addAdmin').reset();">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            <i class="fa fa-align-justify"></i> Data Admin</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-sm table-striped" id="table-admin">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::to('/vendors/datatables/datatables.min.js') }}"></script>
<script>
    $('#table-admin').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.index.json') }}",
        },
        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'status',
                name: 'status',
                render: function(data, type, full, meta){
                    if (data == 1) {
                        return '<button class="btn btn-sm btn-success">Aktif</button>';
                    } else if ( data == 2 ) {
                        return '<button class="btn btn-sm btn-danger">Blokir</button>';
                    } else {
                        return '<button class="btn btn-sm btn-warning">Tidak Aktif</button>';
                    }
                },
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