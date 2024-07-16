@extends('layouts.app')

@section('header', 'Detail Data Angkutan')

@section('body')

    {{-- <div class="card-header">
        <h4>Angkutan Barang 21X8ISZ</h4>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table border border-black table-striped-columns table-md shadow-sm">
                <thead>
                    <tr class="table-secondary text-center">
                        <th scope="col">Name</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Kendaraan</td>
                        <td class="text-center">Truk</td>
                    </tr>
                    <tr>
                        <td>Nopol</td>
                        <td class="text-center">21X8ISZ</td>
                    </tr>
                    <tr>
                        <td>Jenis Angkutan</td>
                        <td class="text-center">Angkutan Barang</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td class="text-center">
                            <span class="badge badge-success">Dipinjam</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td class="text-center">2021-08-31 09:00:00</td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td class="text-center">2021-08-31 09:00:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



@endsection
