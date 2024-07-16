@extends('layouts.app')

@section('header', 'Data Angkutan')

@section('body')

    {{-- <div class="card-header">
        <h4>Invoices</h4>
        <div class="card-header-action">
            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
        </div>
    </div> --}}
    <div class="card-body p-0">
        <div class="table-responsive table-invoice">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>NOPOL</th>
                        <th>Nama Angkutan</th>
                        <th>Jenis Angkutan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>
                            <div class="badge badge-warning">Unpaid</div>
                        </td>
                        <td>July 19, 2018</td>
                        <td>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td>
                            <div class="badge badge-success">Paid</div>
                        </td>
                        <td>July 21, 2018</td>
                        <td>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
