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
          <h3 class="box-title">Data Petugas</h3>

          <div class="box-tools pull-right">
            <div class="pull-right" style="margin-right: 10px;">
                <a class="btn btn-success" href="{{ route('create-petugas') }}" title="Create a project"> Tambahkan Petugas  <i class="fas fa-plus-circle"></i>
                </a>
            </div>
          </div>
        </div>

        <!-- konten tabel -->
        <div class="box-body">
          <table class="table table-bordered table-responsive-lg border-2 dark-border">
              <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Petugas</th>
                  <th class="text-center">Nomor Hp</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Waktu dibuat</th>
                  <th width="280px" class="text-center">Lakukan Aksi</th>
              </tr>
             
              @php
                $index = 1;
              @endphp

              @foreach($data as $item)
                  <tr>
                      <td class="text-center">{{ $index++ }}</td>
                      <td class="text-center">{{ $item->nama_petugas }}</td>
                      <td class="text-center">{{ $item->no_hp }}</td>
                      <td>{{ $item->alamat_petugas }}</td>
                      <td class="text-center">{{ date('j-m-y', strtotime($item->kolom_dibuat)) }}</td>
                      <td class="text-center">
                        <a href="{{ url('ubah-data',$item->petugas_id) }}"><i class="fas fa-edit"></i> Ubah data</a>  |  
                        <a href="{{ url('delete-data',$item->petugas_id) }}" class="text-danger"><i class="fas fa-trash-alt"></i> Hapus data</a>
                      </td>
                  </tr>
              @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $data->links() }}
        </div>
        <!-- /.box-footer-->
      </div>
      @include('sweetalert::alert')

      <!-- /.box -->

    </section>
@endsection