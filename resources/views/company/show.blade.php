@extends('layouts.app')

@section('header', 'Detail Data Angkutan')

@section('body')

    {{-- <div class="card-header">
        <h4>Angkutan Barang 21X8ISZ</h4>
    </div> --}}
    <div class="card">
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
                        {{-- @foreach ($datas as $data ) --}}
                        <tr>
                            <td>Company Name</td>
                            <td class="text-center">{{$data->name}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td class="text-center">{{$data->email}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td class="text-center">{{$data->address}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td class="text-center">{{$data->phone_number}}</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
            <a href="{{ route('company.index') }}" class="btn btn-primary ">Kembali</a>

        </div>
    </div>



@endsection
