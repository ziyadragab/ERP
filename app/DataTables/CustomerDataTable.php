<?php

namespace App\DataTables;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CustomerDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = (new EloquentDataTable($query))
            ->addColumn('action', function (Customer $customer) {
                return view('customer.action', compact('customer'));
            })

            ->editColumn('id', function ($raw) {
                static $i = 1;
                return $i++;
            });

        return $dataTable->rawColumns(['action', 'id'])->addIndexColumn();
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(Customer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-table')
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
            ['data' => 'name', 'title' => 'Name', 'name' => 'name'],
            ['data' => 'email', 'title' => 'Email', 'name' => 'email'],
            ['data' => 'address_1', 'title' => 'Address 1', 'name' => 'address_1'],
            ['data' => 'address_2', 'title' => 'Address 2', 'name' => 'address_2'],
            ['data' => 'country', 'title' => 'Country', 'name' => 'country'],
            ['data' => 'post_code', 'title' => 'Post Code', 'name' => 'post_code'],
            ['data' => 'name_ship', 'title' => 'Shipping Name', 'name' => 'name_ship'],
            ['data' => 'address_1_ship', 'title' => 'Shipping Address 1', 'name' => 'address_1_ship'],
            ['data' => 'action', 'title' => 'ACTION', 'name' => 'action', 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Customer_' . date('YmdHis');
    }
}
