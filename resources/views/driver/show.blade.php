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
                        @foreach ($drivers as $driver)
                            <tr>
                                <td>Nama Driver</td>
                                <td class="text-center">{{ $driver->name }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td class="text-center">{{ $driver->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td class="text-center">{{ $driver->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td class="text-center">{{ $driver->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal bergabung</td>
                                <td class="text-center">{{ $driver->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('drivers.index') }}" class="btn btn-primary ">Kembali</a>
        </div>

    </div>



@endsection
