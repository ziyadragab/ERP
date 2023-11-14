@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('inv/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/bootstrap.datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/skin-green.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/skin-purple.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/styles.css') }}">
@endpush

@section('title')
    ERP SYSTEM
@endsection

@section('content')
    {{-- <!-- Content Wrapper. -> --}}

    <div class="content-wrapper overflow-y-scroll">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Invoice </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered" id="data-table" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Invoice Number</th>
                                <th>Customer</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            </tr>
                            <td>199</td>
                            <td>Mohund Mohmoud</td>
                            <td>15/11/2023</td>
                            <td>15/12/2023</td>
                            <td>cash</td>
                            <td><span class="label label-success">paid</span></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="#" data-invoice-id="" data-email="" data-invoice-type=""
                                    data-custom-email="" class="btn btn-success btn-xs email-invoice"><i
                                        class="fas fa-envelope"></i></a>
                                <a href="#" class="btn btn-info btn-xs" target="_blank"><i
                                        class="fas fa-download"></i></a>
                                <a data-invoice-id="" class="btn btn-danger btn-xs delete-invoice"><i
                                        class="fas fa-trash"></i></a>
                            </td>




                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>







@push('js')
    <script src="{{ asset('inv/js/app.js') }}"></script>
    <script src="{{ asset('inv/js/app.min.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.datetime.js') }}"></script>
    <script src="{{ asset('inv/js/scripts.js') }}"></script>
    <script src="{{ asset('inv/js/npm.js') }}"></script>
    <script src="{{ asset('inv/js/moment.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.password.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('inv/js/bootstrap.js') }}"></script>
@endpush
