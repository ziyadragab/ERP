@extends('layouts.master')

@section('title')
    Customers
@endsection

@section('content')
    {{-- <!-- Content Wrapper. -> --}}
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>customers</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer List</h3>
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


                    <a href="{{ route('customer.create') }}" class="btn btn-success" role="button" aria-disabled="true">Add Customer</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Address One</th>
                                <th>Address Two</th>
                                <th>Country</th>
                                <th>Post Code</th>
                                <th>Phone</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
               @foreach ($customers as $customer )
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email??null }}</td>
                                    <td>{{ $customer->address_1 }}</td>
                                    <td>{{ $customer->address_2 ?? null }}</td>
                                    <td>{{ $customer->country ??null}}</td>
                                    <td>{{ $customer->post_code ??null}}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        <a href="{{ route('customer.edit',$customer) }}" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a>

                                        <form action="{{ route('customer.delete',$customer) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"  >Delete</button>
                                        </form>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.content-wrapper -->

@endsection
