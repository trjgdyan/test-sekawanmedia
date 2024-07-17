@extends('layouts.app')

@section('header', 'Detail Data Reservasi')

@section('body')
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
                            <td class="text-center">{{ $reservation->vehicle }}</td>
                        </tr>

                        <tr>
                            <td>Driver</td>
                            <td class="text-center">{{ $reservation->driver }}</td>
                        </tr>

                        <tr>
                            <td>Start Date</td>
                            <td class="text-center">{{ $reservation->start_date }}</td>
                        </tr>

                        <tr>
                            <td>End Date</td>
                            <td class="text-center">{{ $reservation->end_date }}</td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td class="text-center">{{ $reservation->status }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <a href="{{ route('reservations.index') }}" class="btn btn-primary ">Kembali</a>
            </div>
        </div>
    </div>



@endsection
