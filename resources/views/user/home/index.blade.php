@extends('Template.Master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('obat') }}"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Beli Resep</a>
        </div>
        <!-- Content Row -->
        {{-- <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="" style="text-decoration: none">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Obat</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlah_obat) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-pills fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="" style="text-decoration: none">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Resep</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card shadow mb-4">
            <div class="card-body">
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
                        <tbody>
                            @foreach ($data_obat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->obatalkes_nama }}</td>
                                    @if ($item->stok == 0)
                                        <td>obat sudah habis</td>
                                    @else
                                        <td>{{ number_format($item->stok) }}</td>
                                    @endif
                                    <td>{{ date('d M Y', strtotime($item->created_date)) }}</td>
                                    @if ($item->stok == 0)
                                        <td><a class="btn btn-primary disabled">Pilih Obat</a></td>
                                    @else
                                        <td>
                                            <form action="{{ url('/') }}" method="post" autocomplete="off">
                                                @csrf
                                                <input type="hidden" name="id_obat" value="{{ $item->obatalkes_id }}">
                                                <button type="submit" class="btn btn-primary">Pilih Obat</button>
                                            </form>
                                            {{-- <a href="" class="btn btn-primary">Pilih Obat</a> --}}
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
    </div>
@endsection
