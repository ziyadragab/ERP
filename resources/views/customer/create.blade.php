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
    Create Customer
@endsection
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="title">
                        <h2 class="m-0 p-0 fw-bold">Create Customer</h2>
                    </div>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">


                    <div class=" card-primary">

                        <!-- form start -->


                        <div id="response" class="alert alert-success" style="display:none;">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <div class="message"></div>
                        </div>

                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="create_customer">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Customer Information</h4>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="panel-body form-group form-group-sm">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Enter Name"
                                                            class="form-control margin-bottom copy-input @error('name') is-invalid @enderror"
                                                            value="{{ old('name') }}">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address_1" placeholder="Address 1"
                                                            class="form-control  margin-bottom copy-input @error('address_1') is-invalid @enderror"
                                                            value="{{ old('address_1') }}">
                                                        @error('address_1')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="town" placeholder="Town/City"
                                                            class="form-control margin-bottom copy-input @error('town') is-invalid @enderror"
                                                            value="{{ old('town') }}">
                                                        @error('town')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group no-margin-bottom">
                                                        <input type="number" step="0.01" name="post_code"
                                                            placeholder="Postcode"
                                                            class="form-control copy-input @error('post_code') is-invalid @enderror"
                                                            value="{{ old('post_code') }}">
                                                        @error('post_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="input-group float-right margin-bottom">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                        <input type="email" name="email" placeholder="Email"
                                                            class="form-control copy-input @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address_2" placeholder="Address 2"
                                                            class="form-control margin-bottom copy-input @error('address_2') is-invalid @enderror"
                                                            value="{{ old('address_2') }}">
                                                        @error('address_2')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" step="0.01" name="country"
                                                            placeholder="Country"
                                                            class="form-control margin-bottom copy-input @error('country') is-invalid @enderror"
                                                            value="{{ old('country') }}">
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group no-margin-bottom">
                                                        <input type="tel" name="phone" placeholder="Phone Number"
                                                            class="form-control required @error('phone') is-invalid @enderror"
                                                            value="{{ old('phone') }}">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Shipping Information</h4>
                                        </div>
                                        <div class="panel-body form-group form-group-sm">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name_ship" placeholder="Enter name"
                                                            class="form-control margin-bottom @error('name_ship') is-invalid @enderror"
                                                            value="{{ old('name_ship') }}">
                                                        @error('name_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address_2_ship"
                                                            placeholder="Address 2"
                                                            class="form-control margin-bottom @error('address_2_ship') is-invalid @enderror"
                                                            value="{{ old('address_2_ship') }}">
                                                        @error('address_2_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group no-margin-bottom">
                                                        <input type="text" name="county_ship" placeholder="Country"
                                                            class="form-control @error('county_ship') is-invalid @enderror"
                                                            value="{{ old('county_ship') }}">
                                                        @error('county_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <input type="text" name="address_1_ship"
                                                            placeholder="Address 1"
                                                            class="form-control margin-bottom required @error('address_1_ship') is-invalid @enderror"
                                                            value="{{ old('address_1_ship') }}">
                                                        @error('address_1_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="town_ship" placeholder="Town/City"
                                                            class="form-control margin-bottom @error('town_ship') is-invalid @enderror"
                                                            value="{{ old('town_ship') }}">
                                                        @error('town_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group no-margin-bottom">
                                                        <input type="tel" name="phone_ship"
                                                            placeholder="Phone Number"
                                                            class="form-control @error('phone_ship') is-invalid @enderror"
                                                            value="{{ old('phone_ship') }}">
                                                        @error('phone_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class=" margin-top btn-group d-flex justify-content-center">
                                    <input type="submit" id="action_create_customer" class="btn btn-success"
                                        value="Create Customer" data-loading-text="Creating...">
                                </div>
                            </div>

                        </form>


                    </div>

                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
