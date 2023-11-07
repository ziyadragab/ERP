@extends('layouts.master')

@section('title')
    ERP SYSTEM
@endsection

@section('content')
    {{-- <!-- Content Wrapper. -> --}}
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Safes</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Safe List</h3>
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


                    <a href="" class="btn btn-success" role="button" aria-disabled="true">Add Safe</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created_at</th>
                            <th>Processes</th>
                        </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>title</td>
                                <td>description</td>
                                <td>price</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>title</td>
                                <td>description</td>
                                <td>price</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">Delete</button>
                                </td>
                            </tr>  <tr>
                                <td>1</td>
                                <td>title</td>
                                <td>description</td>
                                <td>price</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">Delete</button>
                                </td>
                            </tr>  <tr>
                                <td>1</td>
                                <td>title</td>
                                <td>description</td>
                                <td>price</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">Delete</button>
                                </td>
                            </tr>


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
