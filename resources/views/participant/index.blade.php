@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Partisipan</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::to('/vendors/datatables/datatables.min.css') }}">
@endsection
@section('title')
List Partisipan
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
                <i class="fa fa-align-justify"></i> Data Partisipan</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-sm table-striped" id="table-role">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Status</th>
                            <th>Hasil</th>
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
            url: "{{ route('admin.participant.index.json') }}",
        },
        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'age',
                name: 'age',
            },
            {
                data: 'str_status',
                name: 'str_status',
            },
            {
                data: 'result',
                name: 'result',
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