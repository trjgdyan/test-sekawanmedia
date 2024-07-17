@extends('layouts.app')

@section('header', 'Data Reservasi')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Data Reservasi</h4>
            <div class="card-header-action">
                <a href="{{ route('reservations.create') }}" class="btn btn-success">Tambah Reservasi</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Vehicle</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($reservation as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-600">{{ $data->name }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->vehicle }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>

                                <td>
                                    <a href="{{ route('reservations.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('reservations.show', $data->id) }}" class="btn btn-primary">Detail</a>
                                    <form action="{{ route('reservations.destroy', $data->id) }}" method="post"
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
