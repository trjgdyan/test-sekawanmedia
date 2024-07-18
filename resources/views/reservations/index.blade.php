@extends('layouts.app')

@section('header', 'Data Reservasi')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Filter Reservasi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('reservations.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Data Reservasi</h4>
            <div class="card-header-action">
                <a href="{{ route('reservations.create') }}" class="btn btn-success">Tambah Reservasi</a>
                <a href="{{ route('reservations.toExcel', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-primary">Export to Excel</a>
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
                                <td>{{ $data->vehicle->name }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>

                                <td>
                                    <a href="{{ route('reservations.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('reservations.show', $data->id) }}" class="btn btn-primary">Detail</a>
                                    <form action="{{ route('reservations.destroy', $data->id) }}" method="post" class="d-inline">
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
