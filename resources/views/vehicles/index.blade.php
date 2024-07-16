@extends('layouts.app')

@section('header', 'Data Angkutan')

@section('body')
    <div class="card-body p-0">
        <a href="{{ route('vehicles.create') }}" class="btn btn-success ">Tambah</a>
        <div class="table-responsive table-invoice">
            <table class="table table-striped">
                <tbody>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Angkutan</th>
                        <th>Plat</th>
                        <th>Status Kepemilikan</th>
                        <th>Jadwal Service</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($vehicles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->vehicle_type }}</td>
                            <td>{{ $item->license_plate }}</td>
                            <td>{{ $item->is_company_owned }}</td>
                            <td>{{ $item->service_schedule }}</td>
                            <td>{{ $item->location }}</td>
                            <td>
                                <a href="{{ route('vehicles.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('vehicles.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                <form action="{{ route('vehicles.destroy', $item->id) }}" method="post" class="d-inline">
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
@endsection
