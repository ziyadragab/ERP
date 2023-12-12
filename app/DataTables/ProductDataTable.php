<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
            ->addColumn('action', function (product $product) {
                return view('product.action', compact('product'));
            })

            ->editColumn('id', function ($raw) {
                static $i = 1;
                return $i++;
            })

            ->editColumn('description', function (product $product) {
                return view('product.description', compact('product'));
            });

        return $dataTable->rawColumns(['action', 'id', 'description'])->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => 'id', 'title' => 'ID', 'name' => 'id'],
            ['data' => 'item_code', 'title' => 'Item Code', 'name' => 'item_code'],
            ['data' => 'item', 'title' => 'Item', 'name' => ''],
            ['data' => 'description', 'title' => 'Description', 'name' => 'description'],
            ['data' => 'price', 'title' => 'Price', 'name' => 'price'],
            ['data' => 'unit', 'title' => 'Unit', 'name' => 'unit'],
            ['data' => 'unit_pieces', 'title' => 'Number Of Pieces', 'name' => 'unit_pieces'],
            ['data' => 'quantity', 'title' => 'Quantity', 'name' => 'quantity'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
