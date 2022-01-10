@extends('layouts.frontend')
@section('content')
<section>
    <div class="container px-5 margin-top">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-12">
                <h2 class="display-4">Sistem Pakar Pemilihan Minat program studi</h2>                    
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h5>Data Partisipan</h5>
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>{{ $age }}</td>
                    </tr>
                </table>
                <br/>
                <br/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Data Fakta</h5>
                <p>Isi sesuai yang anda rasakan, agar sistem kami bisa mendeteksi sebaik mungkin</p>
            </div>
            <div class="col-md-12">
            <form action="{{ route('consult.store') }}" method="POST">
            @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pernyataan</th>
                            <th class="text-right">Sesuai?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facts as $i => $fact)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $fact->name }}</td>
                            <td>
                                <div class="form-check form-check-inline float-md-right">
                                    <input class="form-check-input" type="checkbox" name="fact[]" value="{{ $fact->id }}">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="name" value="{{$name}}" />
                <input type="hidden" name="age" value="{{$age}}" />
                <button class="btn btn-primary float-md-right" type="submit">Lanjutkan</button>
                </br>
                </br>
                </br>
                </br>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection