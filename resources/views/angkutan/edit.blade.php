@extends('layouts.app')

@section('header', 'Edit Data Angkutan')

@section('body')

    <div class="card-body">
        <div class="form-group">
            <label>Nama Angkutan</label>
            <input type="text" class="form-control">
        </div>

        <div class="form-group">
            <label>NOPOL</label>
            <input type="text" class="form-control creditcard">
        </div>

        <div class="form-group">
            <label>Jenis Angkutan</label>
            <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                <option>Angkutan Barang</option>
                <option>Angkutan Orang</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                <option>Dipinjam</option>
                <option>Tidak Dipinjam</option>
            </select>
        </div>


    </div>

    <div class="card-footer text-right">
        <button class="btn btn-primary">Save</button>
    </div>


@endsection
