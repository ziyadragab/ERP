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
                            <h1>Stores</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stores List</h3>
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


                    <a href="{{ route('store.create') }}" class="btn btn-success" role="button" aria-disabled="true">Add item</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Item code</th>
                            <th>Item</th>
                            <th>description</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>price</th>
                            <th>discount</th>
                            <th>Tax</th>
                        
                        </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td>1001</td>
                                <td>zx-240</td>
                                <td>hold 32-55</td>
                                <td>screen holder </td>
                                <td>50</td>
                                <td>
                                    <select id="unit" name="unit">
                                    <option value="australia">Kg</option>
                                    <option value="canada">box</option>
                                    <option value="usa">cardboard</option>
                                    </select>
                                </td>
                                <td>
                                    220.50
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
