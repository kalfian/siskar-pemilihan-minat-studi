@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('title')
Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Profile
                <div class="card-header-actions">
                    <a class="card-header-action btn-setting" href="{{ route('profile.edit') }}">
                        <i class="icon-settings"></i> Edit Profile
                    </a>
                </div>
            </div>
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fa fa-heart bg-danger p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-danger">Hi, {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
