<?php

namespace App\DataTables;

use App\Models\Congregation;
use App\Models\CongregationDeath;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CongregationDeathDataTable extends DataTable
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

        return $model->query()->whereNull('deleted_at')->whereNull('out_date')->whereNotNull('death_date')->orderBy('name', 'ASC');
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
            ['data' => 'birthday_date', 'name' => 'birthday_date', 'title' => 'Tanggal Lahir'],
            ['data' => 'death_date', 'name' => 'death_date', 'title' => 'Tanggal Meninggal'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'congregation_deaths_datatable_' . time();
    }
}
