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
                    <h4>All Products</h4>
                    {!! $dataTable->table(['class'=>'table table-bordered dt-table-hover dataTable text-center'])
                    !!}
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush

