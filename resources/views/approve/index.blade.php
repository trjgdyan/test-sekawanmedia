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
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Vehicle</th>
                            <th>Address</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($approve as $data)
                            <tr class="text-center">
                                <td class="font-weight-600">{{ $data->reservation->name }}</td>
                                <td>{{ $data->reservation->vehicle->name }}</td>
                                <td>{{ $data->reservation->address }}</td>
                                <td>{{ $data->reservation->start_date }}</td>
                                <td>{{ $data->reservation->end_date }}</td>

                                <td>
                                    <a href="{{ route('approve.detail', $data->id_reservation) }}" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
