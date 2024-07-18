@extends('layouts.app')

@section('header', 'Reservasi')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Personal Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('reservations.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        id="address" value="{{ old('address') }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                        name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Type of Tenant</label>
                    <select
                        class="form-control select2 select2-hidden-accessible @error('type_of_tenant') is-invalid @enderror"
                        name="type_of_tenant" id="type_of_tenant" tabindex="-1" aria-hidden="true">
                        <option value="personal" @if (old('type_of_tenant') == 'personal') selected @endif>personal</option>
                        <option value="company" @if (old('type_of_tenant') == 'company') selected @endif>company</option>
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
                                <option value="{{ $vehicle->id }}" @if (old('vehicle') == $vehicle->id) selected @endif>
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
                                <option value="{{ $driver->id }}" @if (old('driver') == $driver->id) selected @endif>
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
                                    name="start_date" id="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    name="end_date" id="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-header">
                    <h4>Approval Data</h4>
                </div>
                <div class="card-body">
                    <div id="approve-container">
                        @for ($i = 0; $i < max(2, count(old('approve', ['']))); $i++)
                            <div class="form-group approve-group">
                                <label>Approve</label>
                                <select
                                    class="form-control select2 select2-hidden-accessible @error('approve.' . $i) is-invalid @enderror"
                                    name="approve[]" id="approve" tabindex="-1" aria-hidden="true">
                                    <option value="">Select Approver</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if (old('approve.' . $i) == $user->id) selected @endif>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('approve.' . $i)
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <button type="button" class="btn btn-danger remove-approve">Remove</button>
                            </div>
                        @endfor
                    </div>
                    <button type="button" id="add-approve" class="btn btn-secondary">Add Approve User</button>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-approve').addEventListener('click', function() {
            const approveContainer = document.getElementById('approve-container');
            const newApproveDiv = document.createElement('div');
            newApproveDiv.classList.add('form-group', 'approve-group');
            newApproveDiv.innerHTML = `
                <label>Approve</label>
                <select class="form-control select2 select2-hidden-accessible" name="approve[]" tabindex="-1" aria-hidden="true">
                    <option value="">Select Approver</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger remove-approve">Remove</button>
            `;
            approveContainer.appendChild(newApproveDiv);

            newApproveDiv.querySelector('.remove-approve').addEventListener('click', function() {
                approveContainer.removeChild(newApproveDiv);
            });
        });

        document.querySelectorAll('.remove-approve').forEach(button => {
            button.addEventListener('click', function() {
                const approveContainer = document.getElementById('approve-container');
                if (approveContainer.children.length > 2) {
                    approveContainer.removeChild(button.parentElement);
                } else {
                    alert('You must have at least two approvers.');
                }
            });
        });
    </script>
@endsection
