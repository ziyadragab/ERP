@extends('layouts.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Item</h1>
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


                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Edit Item</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('store.store')}}" method="POST">
                        @csrf
                        <div class="container-fluid">
                            <div class="row  justify-content-center">
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="itemCode">Item code</label>
                                            <input type="text" name="itemCode" class="form-control @error('itemCode') is-invalid @enderror" value="{{ old('itemCode') }}">
                                            @error('itemCode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="item">Item</label>
                                            <input type="text" name="item"
                                                class="form-control @error('item') is-invalid @enderror"
                                                value="{{ old('item') }}">
                                            @error('item')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="description">Description</label>
                                            <input type="text" name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                value="{{ old('description') }}">
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="type">Type</label>
                                            <input type="text" name="type"
                                                class="form-control @error('type') is-invalid @enderror"
                                                value="{{ old('type') }}">
                                            @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="unit">Unit</label>
                                            <select class="w-100 " style="height: 37px" id="unit" name="unit">
                                                <option value="box" {{ old('unit')=='box' ? 'selected' : '' }}>Box
                                                </option>
                                                <option value="cardboard" {{ old('unit')=='cardboard' ? 'selected' : ''
                                                    }}>Cardboard</option>
                                            </select>
                                            @error('unit')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="quantity">Number of unit pieces</label>
                                            <input type="number" name="quantity"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body py-2">
                                        <div class="form-group m-0">
                                            <label for="price">Price</label>
                                            <input type="number" step="0.01" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                {{-- <div class="col-md-3">
                                    <div class="card-body py-2">
                                        <div class="form-group">
                                            <label for="discount">Discount</label>
                                            <input type="number" name="discount"
                                                class="form-control @error('discount') is-invalid @enderror"
                                                value="{{ old('discount') }}">
                                            @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-3">
                                    <div class="card-body py-2">
                                        <div class="form-group">
                                            <label for="tax">Tax</label>
                                            <input type="number" name="tax"
                                                class="form-control @error('tax') is-invalid @enderror"
                                                value="{{ old('tax') }}">
                                            @error('tax')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
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
