@extends('layouts.app')

@section('header', 'Detail Data Reservasi')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Data Reservation</h4>
        </div>
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
                            <td>Name</td>
                            <td class="text-center">{{ $reservation->name }}</td>
                        </tr>
                        <tr>
                            <td>Adderss</td>
                            <td class="text-center">{{ $reservation->address }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td class="text-center">{{ $reservation->phone_number }}</td>
                        </tr>

                        <tr>
                            <td>Type of Tenant</td>
                            <td class="text-center">{{ $reservation->type_of_tenant }}</td>
                        </tr>


                        <tr>
                            <td>Vehicle</td>
                            <td class="text-center">{{ $reservation->vehicle->name }}</td>
                        </tr>

                        <tr>
                            <td>Driver</td>
                            <td class="text-center">{{ $reservation->driver->name }}</td>
                        </tr>

                        <tr>
                            <td>Start Date</td>
                            <td class="text-center">{{ $reservation->start_date }}</td>
                        </tr>

                        <tr>
                            <td>End Date</td>
                            <td class="text-center">{{ $reservation->end_date }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Status</h4>
        </div>
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
                        @foreach ($approve as $data)
                            <tr>
                                <td class="text-center">{{ $data->user->name }}</td>
                                <td class="text-center">
                                    @if ($data->status == 'approve')
                                        <div class="text-capitalize font-weight-bold btn btn-success">Approved</div>
                                    @elseif ($data->status == 'pending')
                                        <div class="text-capitalize font-weight-bold btn btn-warning">Pending
                                        </div>
                                    @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <a href="{{ route('reservations.index') }}" class="btn btn-primary ">Kembali</a>
            </div>
        </div>
    </div>



@endsection
