@extends('layouts.app')

@section('header', 'Data Angkutan')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Data Vehichles</h4>
            <div class="card-header-action">
                <a href="{{ route('vehicles.create') }}" class="btn btn-success ">Tambah</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tbody>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Name</th>
                            <th>Status Kepemilikan</th>
                            <th>Jadwal Service</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($vehicles as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->ownership_status == true)
                                        <span class="badge badge-success">Milik Sendiri</span>
                                    @else
                                        <span class="badge badge-danger">Sewa</span>
                                    @endif
                                </td>
                                <td>{{ $item->service_schedule }}</td>
                                <td>
                                    <a href="{{ route('vehicles.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('vehicles.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                    <form action="{{ route('vehicles.destroy', $item->id) }}" method="post"
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
