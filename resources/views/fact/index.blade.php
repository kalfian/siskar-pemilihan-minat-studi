@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Fakta</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::to('/vendors/datatables/datatables.min.css') }}">
@endsection
@section('title')
List Fakta
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
    <div class="col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Tambah Fakta</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.fact.store') }}" id="addFact" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label" for="text-input">Fakta</label>
                        <div class="col-md-12">
                            <input class="form-control" value="{{ old('name') }}" name="name"
                                type="text" placeholder="Text">
                            @error('name')
                            <span class="help-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                        document.getElementById('addFact').submit();">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>
                <button class="btn btn-sm btn-danger" type="reset" onclick="event.preventDefault();
                        document.getElementById('addFact').reset();">
                    <i class="fa fa-ban"></i> Reset</button>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Data Fakta</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-sm table-striped" id="table-role">
                    <thead>
                        <tr>
                            <th>Fakta</th>
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
    $('#table-role').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.fact.index.json') }}",
        },
        columns: [
            {
                data: 'name',
                name: 'name',
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