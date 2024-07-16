@extends('layouts.app')

@section('header', 'Detail Data Angkutan')

@section('body')

    {{-- <div class="card-header">
        <h4>Angkutan Barang 21X8ISZ</h4>
    </div> --}}
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
                        <td>Nama Kendaraan</td>
                        <td class="text-center">{{ $vehicle->name }}</td>
                    </tr>
                    <tr>
                        <td>Plat</td>
                        <td class="text-center">{{ $vehicle->license_plate }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kendaraan</td>
                        <td class="text-center">{{ $vehicle->vehicle_type }}</td>
                    </tr>

                    <tr>
                        <td>Status Kepemilikan</td>
                        <td class="text-center">{{ $vehicle->is_company_owned }}</td>
                    </tr>


                    <tr>
                        <td>Jadwal Service</td>
                        <td class="text-center">{{ $vehicle->service_schedule }}</td>
                    </tr>

                    <tr>
                        <td>Lokasi</td>
                        <td class="text-center">{{ $vehicle->location }}</td>
                    </tr>

                    {{-- button back --}}
                    <tr>
                        <td colspan="2" class="text-right">
                            <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Kembali</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



@endsection
