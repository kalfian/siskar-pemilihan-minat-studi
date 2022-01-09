@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Atur Relasi</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::to('/vendors/datatables/datatables.min.css') }}">
@endsection
@section('title')
List Atur Relasi
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
                <i class="fa fa-align-justify"></i> Data Relasi</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-sm table-striped" id="table-role">
                    <thead>
                        <tr>
                            <th>Program Studi</th>
                            @foreach($facts as $index => $fact)
                            <th>
                                <div data-toggle="tooltip" data-placement="right" title="{{$fact->name}}">{{ $index + 1 }}</div>
                            </th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studies as $study)
                        <form action="{{ route('admin.relation.update', $study->id) }}" method="post">
                        @method('put')
                        @csrf
                        <tr>
                            <td>{{ $study->name }}</td>
                            @foreach($facts as $index => $fact)
                            <td>
                                <input type="checkbox" name="fact[]" value="{{$fact->id}}" @if(in_array($fact->id, $study->facts()->allRelatedIds()->toArray())) checked="checked" @endif />
                            </td>
                            @endforeach
                            <td>
                                <button type="submit" class="btn btn-block btn-outline-primary btn-sm mb-2"><i class="fa fa-pencil"></i></button></td>
                        </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection