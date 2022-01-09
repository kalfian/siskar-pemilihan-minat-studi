@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Edit Profil</li>
@endsection
@section('title')
Dashboard
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
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit Profil</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('profile.update') }}" id="editProfile" method="post">
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
                        <label class="col-md-3 col-form-label" for="text-input">Password Baru</label>
                        <div class="col-md-9">
                            <input class="form-control" name="password"  type="password"
                                 placeholder="Password">
                            @error('password')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Konfirmasi Password Baru</label>
                        <div class="col-md-9">
                            <input class="form-control" name="password_confirmation"  type="password"
                                 placeholder="Password">
                            @error('password_confirmation')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <p>Masukkan password untuk mengganti data:</p>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Password</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ old('old_password') }}" name="old_password"
                                 type="password"  placeholder="Password">
                            @error('old_password')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                        document.getElementById('editProfile').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <a class="btn btn-sm btn-danger" href="{{route('home')}}">
                    <i class="fa fa-ban"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
