@extends('layouts.master')

@section('title')
    Create Customer
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Customer</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
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


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Customer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('customer.store')}}" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="row  justify-content-center">

                                <div class="col-md-12">
                                    <h5> <label for="phone">Customer Info :</label></h5>
                                 </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="name">Customer Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="email">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="address_1">Address One</label>
                                            <input type="text" name="address_1"
                                                class="form-control @error('address_1') is-invalid @enderror"
                                                value="{{ old('address_1') }}">
                                            @error('address_1')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="address_2">Address Two</label>
                                            <input type="text" name="address_2"
                                                class="form-control @error('address_2') is-invalid @enderror"
                                                value="{{ old('address_2') }}">
                                            @error('address_2')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="town">Town</label>
                                            <input type="text" name="town"
                                                class="form-control @error('town') is-invalid @enderror"
                                                value="{{ old('town') }}">
                                            @error('town')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="country">Country</label>
                                            <input type="text" step="0.01" name="country"
                                                class="form-control @error('country') is-invalid @enderror"
                                                value="{{ old('country') }}">
                                            @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="post_code">Post Code</label>
                                            <input type="number" step="0.01" name="post_code"
                                                class="form-control @error('post_code') is-invalid @enderror"
                                                value="{{ old('post_code') }}">
                                            @error('post_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel"  name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                   <h5> <label for="phone">Shiping Info :</label></h5>
                                </div>



                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="name_ship">Name</label>
                                            <input type="text"  name="name_ship"
                                                class="form-control @error('name_ship') is-invalid @enderror"
                                                value="{{ old('name_ship') }}">
                                            @error('name_ship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel"  name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="address_1_ship">Address One </label>
                                            <input type="text"  name="address_1_ship"
                                                class="form-control @error('address_1_ship') is-invalid @enderror"
                                                value="{{ old('address_1_ship') }}">
                                            @error('address_1_ship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="address_2_ship">Address Two </label>
                                            <input type="text"  name="address_2_ship"
                                                class="form-control @error('address_2_ship') is-invalid @enderror"
                                                value="{{ old('address_2_ship') }}">
                                            @error('address_2_ship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="town_ship">Address Two </label>
                                            <input type="text"  name="town_ship"
                                                class="form-control @error('town_ship') is-invalid @enderror"
                                                value="{{ old('town_ship') }}">
                                            @error('town_ship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="county_ship">Country</label>
                                            <input type="text"  name="county_ship"
                                                class="form-control @error('county_ship') is-invalid @enderror"
                                                value="{{ old('county_ship') }}">
                                            @error('county_ship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="post_code_ship">Post Code</label>
                                            <input type="number"  name="post_code_ship"
                                                class="form-control @error('post_code_ship') is-invalid @enderror"
                                                value="{{ old('post_code_ship') }}">
                                            @error('post_code_ship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="phone_ship">Phone Number</label>
                                            <input type="tel"  name="phone_ship"
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

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
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
