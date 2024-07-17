@extends('layouts.app')

@section('header', 'Edit Data Reservasi')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Personal Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('reservations.update', $reservation->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $reservation->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        id="address" value="{{ old('address', $reservation->address) }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                        name="phone_number" id="phone_number" value="{{ old('phone_number', $reservation->phone_number) }}">
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Type of Tenant</label>
                    <select
                        class="form-control select2 select2-hidden-accessible @error('type_of_tenant') is-invalid @enderror"
                        name="type_of_tenant" id="type_of_tenant" tabindex="-1" aria-hidden="true">
                        <option value="personal" @if (old('type_of_tenant', $reservation->type_of_tenant) == 'personal') selected @endif>personal</option>
                        <option value="company" @if (old('type_of_tenant', $reservation->type_of_tenant) == 'company') selected @endif>company</option>
                    </select>
                    @error('type_of_tenant')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="card-header">
                    <h4>Rental Data</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Vehicle</label>
                        <select
                            class="form-control select2 select2-hidden-accessible @error('vehicle') is-invalid @enderror"
                            name="vehicle" id="vehicle" tabindex="-1" aria-hidden="true">
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->name }}" @if (old('vehicle') == $vehicle->name) selected @endif>
                                    {{ $vehicle->name }}</option>
                            @endforeach
                        </select>
                        @error('vehicle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Driver</label>
                        <select class="form-control select2 select2-hidden-accessible @error('driver') is-invalid @enderror"
                            name="driver" id="driver" tabindex="-1" aria-hidden="true">
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->name }}" @if (old('driver') == $driver->name) selected @endif>
                                    {{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    name="start_date" id="start_date"
                                    value="{{ old('start_date', $reservation->start_date) }}">
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    name="end_date" id="end_date" value="{{ old('end_date', $reservation->end_date) }}">
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select
                            class="form-control select2 select2-hidden-accessible @error('status') is-invalid @enderror"
                            name="status" id="status" tabindex="-1" aria-hidden="true">
                            <option value="dipinjam" @if (old('status', $reservation->status) == 'dipinjam') selected @endif>dipinjam</option>
                            <option value="tidak dipinjam" @if (old('status', $reservation->status) == 'tidak dipinjam') selected @endif>tidak dipinjam
                            </option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back</a>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection
