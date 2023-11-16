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
                            <h1>products</h1>
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


                    <a href="{{ route('product.create') }}" class="btn btn-success" role="button" aria-disabled="true">Add item</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item code</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                {{-- <th>Total</th>
                                <th>Discount (%)</th>
                                <th>Total After Discount</th>
                                <th>Tax (%)</th>--}}
                                {{-- <th>code</th> --}}
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->item_code }}</td>
                                    <td>{{ $product->item }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    {{-- <td>{!!DNS2D::getBrcodeHTML("$product->par_code",'QRCODE') !!}</td> --}}
                                   {{-- <td>{!!   DNS2D::getBarcodeHTML("$product->par_code", 'QRCODE')  !!}</td> --}}
                                    {{-- <td>{{ $product->price * $product->quantity }}</td> --}}
                                    {{-- <td>{{ $product->discount }}%</td>
                                    <td>{{ $product->price * $product->quantity - ($product->price * $product->quantity * $product->discount / 100) }}</td>
                                    <td>{{ $product->tax }}%</td>
                                    <td>{{ ($product->price * $product->quantity - ($product->price * $product->quantity * $product->discount / 100)) + (($product->price * $product->quantity - ($product->price * $product->quantity * $product->discount / 100)) * $product->tax / 100) }}</td> --}}
                                    <td>
                                        <a href="{{ route('product.edit',$product) }}" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a>

                                        <form action="{{ route('product.delete',$product) }}" method="POST">
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
