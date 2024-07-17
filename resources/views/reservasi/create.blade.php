@extends('layouts.app')

@section('header', 'Reservasi')

@section('body')

    <div class="card">
        <div class="card-header">
            <h4>Personal Data</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number">
            </div>

            <div class="form-group">
                <label>Type of Tenant</label>
                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option>Personal</option>
                    <option>Agency</option>
                </select>
            </div>
        </div>

        <div class="card-header">
            <h4>Rental Data</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Vehicle</label></label>
                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                    name="vehicle" id="vehicle">
                    <option>Mobil bagus</option>
                    <option>Mobil Jelek</option>
                </select>
            </div>

            <div class="form-group">
                <label>Driver</label>
                <input type="text" class="form-control" name="driver" id="driver">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date" id="end_date">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option>Dipinjam</option>
                    <option>Tidak Dipinjam</option>
                </select>
            </div>

            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>

        </div>

    @endsection
