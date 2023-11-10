@extends('layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Item</h1>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{\session()->get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Item</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST">
                            @csrf
                            <div class="container-fluid">
                                <div class="row  justify-content-center">
                                    <div class="col-md-4">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0">
                                                <label for="exampleInputEmail1">Item code</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0">
                                                <label for="exampleInputEmail1">Item</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0">
                                                <label for="exampleInputEmail1">description</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0">
                                                <label for="exampleInputEmail1">type</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0 ">
                                                <label for="exampleInputEmail1">Quantity</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0">
                                                <label for="exampleInputEmail1">Unit</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card-body py-2">
                                            <div class="form-group m-0">
                                                <label for="exampleInputEmail1">price</label>
                                                <select class="w-100 " style="height: 37px" id="unit" name="unit">
                                                    <option value="australia">Kg</option>
                                                    <option value="canada">box</option>
                                                    <option value="usa">cardboard</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-body py-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">discount</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-body py-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tax</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

