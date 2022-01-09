@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.study.index') }}">Program Studi</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('title')
Program Studi
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit Program Studi</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.study.update', $study->id) }}" id="updateStudy"
                    method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Program Studi</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $study->name }}" name="name" 
                                type="text"  placeholder="Text">
                            @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                        document.getElementById('updateStudy').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <a href="{{route('admin.study.index')}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-ban"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
