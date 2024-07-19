@extends('layouts.app')

@section('header', 'Edit Driver')

@section('body')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('drivers.update', $driver[0]->id) }}" method="post">
                @csrf
                @method('put')
                @foreach ($driver as $data)
                    <div class="form-group">
                        <label>Nama Driver</label>
                        <input type="text" class="form-control @error('name') is-invalid
                    @enderror"
                            name="name" value="{{ $data->name }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date"
                            class="form-control @error('tanggal_lahir') is-invalid
                    @enderror"
                            name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                    </div>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text"
                            class="form-control @error('alamat') is-invalid
                        @enderror"
                            name="alamat" value="{{ $data->alamat }}">
                    </div>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="text"
                            class="form-control @error('no_hp') is-invalid
                        @enderror" name="no_hp"
                            value="{{ $data->no_hp }}">
                    </div>
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                @endforeach
            </form>
        </div>
    </div>



@endsection
