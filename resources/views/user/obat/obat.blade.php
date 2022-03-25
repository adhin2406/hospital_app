@extends('Template.Master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('/') }}"><i
                    class="fas fa-chevron-left fa-sm text-white-50 mr-2"></i> Kembali</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Racikan -->
            <div class="col-md-6 mb-4 col-lg-6 col-sm-6 col-12">
                <a id="racikan" style="text-decoration: none;cursor: pointer" href="{{ url('/racikan') }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Racikan</div>
                                    <div class="mb-0 text-gray-600">2 atau lebih obat jadi satu</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-pills fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Non Racikan -->
            <div class="col-md-6 mb-4 col-lg-6 col-sm-6 col-12">
                <a id="non_racikan" style="text-decoration: none;cursor: pointer" href="{{ url('/non_racikan') }}">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">non racikan</div>
                                    <div class=" mb-0  text-gray-600">hanya dapat memilih satu obat</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-pills fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- form pemesanan -->
        {{-- <div class="content_form">
            <div class="racikan" id="racikan_form" style="display: none">
                <form>
                    <button id="tambah_form" class="btn btn-outline-primary mb-3" data-toggle="modal"
                        data-target="#cari">Cari
                        obat</button>
                    <div class="modal fade" id="cari" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
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
                                        <input type="search" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Form pencarian">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </form>
            </div>
            <div class="racikan" id="non_racikan_form" style="display: none">
                <form>
                    <div class="form-group">
                        <label for="obat">Pilih Obat</label>
                        <select class="form-control" id="obat">
                            <option value="" disabled selected>Pilih Obat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div> --}}
    </div>
@endsection
