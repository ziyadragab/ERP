<?php

namespace App\DataTables;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InvoiceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
        ->addColumn('action', function (Invoice $invoice) {
            return view('invoice.action', compact('invoice'));
        })
        ->editColumn('id', function ($raw) {
            static $i = 1;
            return $i++;
        })
        ->addColumn('customer', function (Invoice $invoice) {
            return optional($invoice->customer)->name; // Assuming 'name' is the customer field you want to display
        })
        ->addColumn('products', function (Invoice $invoice) {
            return $this->formatProducts($invoice->products);
        });

    return $dataTable->rawColumns(['action','customer', 'id', 'products']);
    }
    protected function formatProducts($products)
    {
        $formattedProducts = collect($products)->map(function ($product) {
            return sprintf(
                'Code: %s,Name: %s , Quantity: %s , Price: %s , Discount: %s , SubTotal: %s ' ,
                $product->product_code,
                $product->product_name,
                $product->product_quantity,
                $product->product_price,
                $product->product_discount,
                $product->product_subTotal,

            );
        })->implode('<hr>');

        return $formattedProducts;
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Invoice $model): QueryBuilder
    {
        return $model->newQuery()->with(['customer','products']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('invoice-table')
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
            ['data' => 'customer', 'title' => 'Customer', 'name' => 'customer'],
            ['data' => 'number', 'title' => 'Invoice Number', 'name' => 'number'],
            ['data' => 'date', 'title' => 'Date', 'name' => 'date'],
            ['data' => 'due_date', 'title' => 'Due Date', 'name' => 'due_date'],
            ['data' => 'subtotal', 'title' => 'Sub Total', 'name' => 'subtotal'],
            ['data' => 'discount', 'title' => 'Discount', 'name' => 'discount'],
            ['data' => 'total', 'title' => 'Total', 'name' => 'total'],
            ['data' => 'type', 'title' => 'Payment Type', 'name' => 'type'],
            ['data' => 'products', 'title' => 'Products', 'name' => 'products'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Invoice_' . date('YmdHis');
    }
}
