<?php

namespace App\DataTables;

use App\Models\Congregation;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CongregationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'congregations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Congregation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Congregation $model)
    {
        
        return $model->query()->whereNull('deleted_at')->whereNull('death_date')->whereNull('out_date')->orderBy('name', 'ASC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'name', 'name' => 'name', 'title' => 'Nama'],
            ['data' => 'address', 'name' => 'address', 'title' => 'Alamat'],
            ['data' => 'gender', 'name' => 'gender', 'title' => 'Jenis Kelamin'],
            ['data' => 'occupation', 'name' => 'occupation', 'title' => 'Pekerjaan'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'congregations_datatable_' . time();
    }
}
