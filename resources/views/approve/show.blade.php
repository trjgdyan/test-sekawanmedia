@extends('layouts.app')

@section('header', 'Detail Data Reservasi')

@section('body')
    <div class="card">
        <div class="card-body">
            @if ($statusBefore == 'approve' && $statusUser == 'pending')
                <div class="float-right">
                    <form action="{{ route('approve.approve', $reservation->id_reservation) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="approve">
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                </div>
                <div class="float-right mr-3">
                    <form action="{{ route('approve.approve', $reservation->id_reservation) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="reject">
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </div>
            @endif
            <div class="table-responsive mt-5">
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
                            <td class="text-center">{{ $reservation->reservation->name }}</td>
                        </tr>
                        <tr>
                            <td>Adderss</td>
                            <td class="text-center">{{ $reservation->reservation->address }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td class="text-center">{{ $reservation->reservation->phone_number }}</td>
                        </tr>

                        <tr>
                            <td>Type of Tenant</td>
                            <td class="text-center">{{ $reservation->reservation->type_of_tenant }}</td>
                        </tr>


                        <tr>
                            <td>Vehicle</td>
                            <td class="text-center">{{ $reservation->reservation->vehicle->name }}</td>
                        </tr>

                        <tr>
                            <td>Driver</td>
                            <td class="text-center">{{ $reservation->reservation->driver->name }}</td>
                        </tr>

                        <tr>
                            <td>Start Date</td>
                            <td class="text-center">{{ $reservation->reservation->start_date }}</td>
                        </tr>

                        <tr>
                            <td>End Date</td>
                            <td class="text-center">{{ $reservation->reservation->end_date }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            @if ($statusUser == 'approve')
                                <td class="text-center">
                                    <div class="text-capitalize font-weight-bold btn btn-success">Approved</div>
                                </td>
                            @elseif ($statusBefore == 'approve' && $statusUser == 'pending')
                                <td class="text-center">
                                    <div class="text-capitalize font-weight-bold btn btn-warning">waiting for your decision
                                    </div>
                                </td>
                            @elseif ($statusUser == 'reject')
                                <td class="text-center">
                                    <div class="text-capitalize font-weight-bold btn btn-danger">Rejected</div>
                                </td>
                            @elseif ($statusBefore == 'pending' && $statusUser == 'pending')
                                <td class="text-center">
                                    <div class="text-capitalize font-weight-bold btn btn-danger">Pending</div>
                                </td>
                            @endif
                            {{-- <td class="text-center text-capitalize">{{ $reservation->status }}</td> --}}
                        </tr>

                    </tbody>

                </table>
            </div>
            <div class="text-right">
                <a href="{{ route('approve.index') }}" class="btn btn-primary ">Kembali</a>
            </div>
        </div>
    </div>



@endsection
