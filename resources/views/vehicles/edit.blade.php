@extends('layouts.app')

@section('header', 'Edit Data Angkutan')

@section('body')

    <div class="card-body">
        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Angkutan</label>
                <input type="text" name="name" id="name" value="{{ old('name', $vehicle->name) }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="license_plate">Plat</label>
                <input type="text" name="license_plate" id="license_plate"
                    value="{{ old('license_plate', $vehicle->license_plate) }}"
                    class="form-control @error('license_plate') is-invalid @enderror">
                @error('license_plate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="vehicle_type">Jenis Angkutan</label>
                <select name="vehicle_type" id="vehicle_type"
                    class="form-control select2 select2-hidden-accessible @error('vehicle_type') is-invalid @enderror">
                    <option value="personnel_transport" @if (old('vehicle_type', $vehicle->vehicle_type) == 'personnel_transport') selected @endif>Angkutan Orang
                    </option>
                    <option value="goods_transport" @if (old('vehicle_type', $vehicle->vehicle_type) == 'goods_transport') selected @endif>Angkutan Barang
                    </option>
                </select>
                @error('vehicle_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_company_owned">Status Kepemilikan</label>
                <select name="is_company_owned" id="is_company_owned"
                    class="form-control select2 select2-hidden-accessible @error('is_company_owned') is-invalid @enderror">
                    <option value="1" @if (old('is_company_owned', $vehicle->is_company_owned) == 1) selected @endif>1</option>
                    <option value="0" @if (old('is_company_owned', $vehicle->is_company_owned) == 0) selected @endif>2</option>
                </select>
                @error('is_company_owned')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="service_schedule">Jadwal Service</label>
                <input type="date" name="service_schedule" id="service_schedule"
                    value="{{ old('service_schedule', $vehicle->service_schedule) }}"
                    class="form-control @error('service_schedule') is-invalid @enderror">
                @error('service_schedule')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ old('location', $vehicle->location) }}"
                    class="form-control @error('location') is-invalid @enderror">
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="card-footer text-right">
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>

@endsection
