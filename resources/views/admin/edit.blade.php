@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
<li class="breadcrumb-item active">Edit</li>
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
                <i class="fa fa-align-justify"></i> Edit Admin</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.update', $user->id) }}" id="addAdmin" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $user->name }}" name="name"
                                type="text"  placeholder="Nama">
                            @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $user->email }}" name="email"
                                type="text"  placeholder="Email">
                            @error('email')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9 col-form-label">
                            <div class="form-check form-check-inline mr-3">
                                <input @if($user->status == 1) checked="checked" @endif class="form-check-input" id="active" type="radio" value="1"
                                    name="status">
                                <label class="form-check-label" for="active">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline mr-3">
                                <input @if($user->status == 0) checked="checked" @endif class="form-check-input" id="non-active" type="radio" value="0"
                                    name="status">
                                <label class="form-check-label" for="non-active">Tidak Aktif</label>
                            </div>
                            <div class="form-check form-check-inline mr-3">
                                <input @if($user->status == 2) checked="checked" @endif class="form-check-input" id="blocked" type="radio" value="2"
                                    name="status">
                                <label class="form-check-label" for="blocked">Blokir</label>
                            </div>
                            <br>
                            @error('status')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <p>Isi form dibawah untuk mengganti password: </p>
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
                        <label class="col-md-3 col-form-label" for="text-input">Konfirmasi</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation"
                                type="password"  placeholder="Konfirmasi">
                            @error('password_confirmation')
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
                <a class="btn btn-sm btn-danger" href="{{ route('admin.index') }}">
                    <i class="fa fa-ban"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
