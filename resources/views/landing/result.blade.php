@extends('layouts.frontend')
@section('content')
<section>
    <div class="container px-5 margin-top">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-12">
                <h2 class="display-4">Sistem Pakar Pemilihan Minat program studi</h2>
                </br>
                </br>                 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Hasil</h5>
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
                </br>
                </br>
                </br>
                </br>
            </div>
        </div>
    </div>
</section>
@endsection