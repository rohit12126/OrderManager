<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{

    protected $orderByValues = [
        'latest','oldest'
    ];
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
            ->editColumn('name', function($query){
                return $query->customer->name;
            })->editColumn('status', function($query){
                return ucfirst($query->status);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        $query = $model->newQuery()->with('customer');

        if(request()->has('orderBy') && !empty(request('orderBy')) && in_array(request('orderBy'), $this->orderByValues))
        {
            $query->{request('orderBy')}();
        }

        return $query;
    }
}
