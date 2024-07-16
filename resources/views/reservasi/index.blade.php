@extends('layouts.app')

@section('header', 'Data Reservasi')

@section('body')

    <div class="card-body p-0">
        <div class="table-responsive table-invoice">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Driver</th>
                        <th>Nama Angkutan</th>
                        <th>Jenis Angkutan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>INV-87239</td>
                        <td>Angkutan Orang</td>
                        <td>22-09-2012</td>
                        <td>27-09-2012</td>
                        <td>
                            <div class="badge badge-warning">Unpaid</div>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
