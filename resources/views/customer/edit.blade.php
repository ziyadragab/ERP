@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('inv/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/bootstrap.datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/skin-green.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/skin-purple.css') }}">
    <link rel="stylesheet" href="{{ asset('inv/css/styles.css') }}">
@endpush


@section('title', 'Edit Customer')

@section('content')
    <div class="content-wrapper">

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <div class="title">
                        <h2 class="m-0 p-0 fw-bold">Edit Customer</h2>
                    </div>
                    {{-- <div class="card-tools"> --}}
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button> --}}
                    {{-- </div> --}}
                </div>
                <div class="card-body">


                    <div class=" card-primary">
                        <!-- Assume $customer is the variable containing customer details -->
                        <form action="{{ route('customer.update', $customer) }}" method="POST">
                            @csrf
                            @method('PUT')
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
                                                        <input type="text" name="name"
                                                            class="form-control margin-bottom copy-input"
                                                            placeholder="Enter Name" value="{{ $customer->name }}">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address_1" placeholder="Address 1"
                                                            class="form-control  margin-bottom copy-input"
                                                            placeholder="Address 1" value="{{ $customer->address_1 }}">
                                                        @error('address_1')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="town"
                                                            class="form-control margin-bottom copy-input"
                                                            placeholder="Town/City" value="{{ $customer->town }}">
                                                        @error('town')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group no-margin-bottom">
                                                        <input type="text" step="0.01" name="post_code"
                                                            placeholder="Postcode"
                                                            class="form-control margin-bottom copy-input"
                                                            value="{{ $customer->post_code }}">
                                                        @error('post_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="input-group float-right margin-bottom">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                        <input type="email" name="email"
                                                            class="form-control  margin-bottom copy-input"
                                                            placeholder="Email" value="{{ $customer->email }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address_2" placeholder="Address 2"
                                                            class="form-control margin-bottom copy-input"
                                                            value="{{ $customer->address_2 }}">
                                                        @error('address_2')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="country"
                                                            class="form-control margin-bottom copy-input"
                                                            placeholder="Country" value="{{ $customer->country }}">
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group no-margin-bottom">
                                                        <input type="tel" name="phone" placeholder="Phone Number"
                                                            class="form-control " placeholder="phone"
                                                            value="{{ $customer->phone }}">
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
                                                        <input type="text" name="name_ship"
                                                            class="form-control margin-bottom" placeholder="Enter name"
                                                            value="{{ $customer->name_ship }}">
                                                        @error('name_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address_2_ship" class="form-control"
                                                            placeholder="Address 2"
                                                            value="{{ $customer->address_2_ship }}">
                                                        @error('address_2_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group no-margin-bottom">

                                                        <input type="text" name="county_ship"
                                                            class="form-control"placeholder="Country"
                                                            placeholder="Address 2" value="{{ $customer->county_ship }}">
                                                        @error('county_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">

                                                        <input type="text" name="address_1_ship"
                                                            class="form-control  margin-bottom" placeholder="Address 1"
                                                            value="{{ $customer->address_1_ship }}">
                                                        @error('address_1_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="town_ship"
                                                            class="form-control margin-bottom" placeholder="Town/City"
                                                            value="{{ $customer->town_ship }}">
                                                        @error('town_ship')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group no-margin-bottom">

                                                        <input type="tel" name="post_code_ship" class="form-control"
                                                            placeholder="Phone Number"
                                                            value="{{ $customer->post_code_ship }}">
                                                        @error('post_code_ship')
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


                            <!-- /.card-body -->

                        </form>
                    </div>

                </div>
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection
