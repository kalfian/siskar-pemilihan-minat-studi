@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.participant.index') }}">Partisipan</a></li>
<li class="breadcrumb-item active">Detail Partisipan</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ URL::to('/vendors/datatables/datatables.min.css') }}">
@endsection
@section('title')
Detail Partisipan
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Detail Partisipan</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $participant->name }}</td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>{{ $participant->age }}</td>
                    </tr>
                    <tr>
                        <td>Fakta yang didapat</td>
                        <td>
                            @foreach($participant->facts as $fact)
                            {{ $fact->name }}</br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Program studi</td>
                        <td>{{ $participant->result }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection