<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('in_stock',function($query){
                if($query->in_stock){
                    return 'Yes';
                }
                return 'No';
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {

        if(request()->has('stock_status') && !empty(request('stock_status'))){
            return $model->newQuery()->{request('stock_status')}();
        }
        return $model->newQuery();
    }
}
