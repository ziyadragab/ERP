@extends('layouts.master')

@section('title', 'Edit Customer')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Customer</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

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
                        <h3 class="card-title">Edit Customer</h3>
                    </div>
                <!-- Assume $customer is the variable containing customer details -->
                <form action="{{ route('customer.update', $customer) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="container-fluid">
                        <div class="row  justify-content-center">

                            <div class="col-md-12">
                                <h5> <label for="phone">Customer Info :</label></h5>
                            </div>
                            <!-- Basic Information -->
                            <div class="col-md-4">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $customer->name }}">
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
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $customer->email }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="address_1">Address Line 1</label>
                                        <input type="text" name="address_1" class="form-control"
                                            value="{{ $customer->address_1 }}">
                                        @error('address_1')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="address_2">Address Line 2</label>
                                        <input type="text" name="address_2" class="form-control"
                                            value="{{ $customer->address_2 }}">
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
                                        <input type="text" name="town" class="form-control"
                                            value="{{ $customer->town }}">
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
                                        <input type="text" name="country" class="form-control"
                                            value="{{ $customer->country }}">
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <div class="form-group">
                                            <label for="post_code">Post Code</label>
                                            <input type="number" name="post_code" class="form-control"
                                                value="{{ $customer->post_code }}">
                                            @error('post_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control"
                                            value="{{ $customer->phone }}">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Information -->

                            <div class="col-md-12">
                                <h5><label for="phone">Shipping Info :</label></h5>
                            </div>


                            <div class="col-md-4">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="name_ship">Shipping Name</label>
                                        <input type="text" name="name_ship" class="form-control"
                                            value="{{ $customer->name_ship }}">
                                        @error('name_ship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Add other shipping fields similarly -->



                            <div class="col-md-4">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="address_1_ship">Address One</label>
                                        <input type="text" name="address_1_ship" class="form-control"
                                            value="{{ $customer->address_1_ship }}">
                                        @error('address_1_ship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="address_2_ship">Address Two</label>
                                        <input type="text" name="address_2_ship" class="form-control"
                                            value="{{ $customer->address_2_ship }}">
                                        @error('address_2_ship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Add other shipping fields similarly -->



                            <div class="col-md-6">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="town_ship">Town</label>
                                        <input type="text" name="town_ship" class="form-control"
                                            value="{{ $customer->town_ship }}">
                                        @error('town_ship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="card-body py-2">
                                    <div class="form-group m-0">
                                        <label for="county_ship">County</label>
                                        <input type="text" name="county_ship" class="form-control"
                                            value="{{ $customer->county_ship }}">
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
                                        <input type="number" name="post_code_ship" class="form-control"
                                            value="{{ $customer->post_code_ship }}">
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
                                        <input type="tel" name="phone_ship" class="form-control"
                                            value="{{ $customer->phone_ship }}">
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
</div>
@endsection
