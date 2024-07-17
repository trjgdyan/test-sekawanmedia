@extends('layouts.app')

@section('header', 'Data of Rental Companies')

@section('body')
    <div class="card">
        <div class="card-header">
            <h4>Data Rental Companies</h4>
            <div class="card-header-action">
                <a href="{{ route('company.create') }}" class="btn btn-success ">Tambah</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tbody>
                        <tr class="text-center">
                            <th>ID Company</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($rental as $item)
                            <tr class="text-center">
                                <td>CMPY-{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('company.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('company.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                    <form action="{{ route('company.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
