@extends('layouts.app')

@section('header', 'Data Angkutan')

@section('body')

    {{-- <div class="card-header">
        <h4>Invoices</h4>
        <div class="card-header-action">
            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header">
            <h4>Data Driver</h4>
            <div class="card-header-action">
                <a href="{{ route('drivers.create') }}" class="btn btn-success">Tambah Driver</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tbody>
                        <tr class="text-center">
                            <th>No. Driver</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat Rumah</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($drivers as $data)
                            <tr class="text-center">
                                <td>DRV-{{ $data->id }}</td>
                                <td class="font-weight-600">{{ $data->name }}</td>
                                <td>{{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    <a href="{{ route('drivers.show', $data->id) }}" class="btn btn-primary">Detail</a>
                                    <a href="{{ route('drivers.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('drivers.destroy', $data->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
