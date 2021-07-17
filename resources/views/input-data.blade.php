@extends('layouts/header')

@section('content')
<section class="content-header">
      <h1>
        Vaksinasi Covid-19
        <small>Puskesmas kecamatan Mangunjaya</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Masukan data petugas</h3>

          <div class="box-tools pull-right">
            <a href="{{ route('lte')}}" class="pull-right me-2"><i class="fas fa-arrow-left"> Kembali</i></a>
          </div>
        </div>
        <div class="box-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>LOH!?</strong> Seperti nya ada yang salah dengan data yang kamu masukan<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kirim-petugas') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <strong>Nama Petugas</strong>
                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Nama petugas">
                </div>
                <div class="form-group">
                    <strong>No Hp</strong>
                    <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor Hp">
                </div>
                <div class="form-group">
                    <strong>Alamat</strong>
                    <textarea name="alamat_petugas" id="alamat_petugas" class="form-control" placeholder="Alamat petugas"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
@endsection