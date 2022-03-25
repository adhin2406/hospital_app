@extends('Template.Master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('/obat') }}"><i
                    class="fas fa-chevron-left fa-sm text-white-50 mr-2"></i> Kembali</a>
        </div>
    </div>
    <!-- form pemesanan -->
    <div class="container">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Obat Yang Dipilih</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Obat</th>
                                <th>Jumlah yang Dipesan</th>
                                <th>Stok Obat</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_obat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obatalkes_nama }}</td>
                                    <td>{{ $item->qty_obat }}</td>
                                    @if ($item->stok == 0)
                                        <td>obat sudah habis</td>
                                    @else
                                        <td>{{ number_format($item->stok) }}</td>
                                    @endif
                                    @if ($item->stok == 0)
                                        <td><a class="btn btn-primary disabled">Tambah Obat</a></td>
                                    @else
                                        <td>
                                            <form action="{{ url('/racikan') }}" method="post" autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="id_obat" value="{{ $item->obatalkes_id }}">
                                                <button type="submit" class="btn btn-primary">Tambah Obat</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $data_obat->links() }}
            </div>
        </div>
        <div class="content_form">
            <div class="racikan" id="racikan_form">
                <button id="tambah_form" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#cari">Cari
                    obat</button>
                <div class="modal fade" id="cari" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cari Obat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="search" class="form-control" id="form_cari" name="data"
                                        placeholder="Form pencarian">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nama Obat</th>
                                                <th>Stok Obat</th>
                                                <th>Dibuat Tanggal</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="obat_obatan">
                                            @foreach ($data_obat_all as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->obatalkes_nama }}</td>
                                                    @if ($item->stok == 0)
                                                        <td>obat sudah habis</td>
                                                    @else
                                                        <td>{{ number_format($item->stok) }}</td>
                                                    @endif
                                                    <td>{{ date('d M Y', strtotime($item->created_date)) }}
                                                    </td>
                                                    @if ($item->stok == 0)
                                                        <td><a class="btn btn-primary disabled">Pilih Obat</a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <form action="{{ url('/racikan') }}" method="post"
                                                                autocomplete="off">
                                                                @csrf
                                                                <input type="hidden" name="id_obat"
                                                                    value="{{ $item->obatalkes_id }}">
                                                                <button type="submit" class="btn btn-primary">Pilih
                                                                    Obat</button>
                                                            </form>
                                                            {{-- <a href="" class="btn btn-primary">Pilih Obat</a> --}}
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/signa') }}" class="btn btn-success form-control">lanjutkan</a>
            </div>
        </div>
    </div>
@endsection
