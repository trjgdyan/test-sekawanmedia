@extends('layouts.app')

@section('header', 'Add Rental Company')

@section('body')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('company.update', $data->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name of Company</label>
                    <input type="text" class="form-control @error('name') is-invalid
                    @enderror"
                        name="name" value="{{ $data->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid
                    @enderror"
                        name="email" value="{{ $data->email }}">
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control @error('address') is-invalid
                    @enderror"
                        name="address" value="{{$data->address}}">
                </div>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text"
                        class="form-control @error('phone_number') is-invalid
                    @enderror"
                        name="phone_number" value="{{$data->phone_number}}">
                </div>
                @error('Phone Number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('company.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>



@endsection
