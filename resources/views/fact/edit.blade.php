@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.fact.index') }}">Fakta</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('title')
Fakta
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Edit Fakta</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.fact.update', $fact->id) }}" id="updateFact"
                    method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Fakta</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $fact->name }}" name="name" 
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
                        document.getElementById('updateFact').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <a href="{{route('admin.fact.index')}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-ban"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
