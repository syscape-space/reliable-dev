<?php
namespace App\DataTables;
use App\Models\Career;
use App\Models\JudgerRequest;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.38]
// Copyright Reserved [it v 1.6.38]
class JudgerRequestDataTable extends DataTable
{

    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.judger_request.buttons.actions')
            ->addColumn('order_name', function ($item){
                return $item->order->order_title;
            })
            ->addColumn('status', function ($item){
                return __('admin.'.$item->status).'<br>'.$item->note;
            })
            // ->addColumn('address', '{{ $address }}')
   			->addColumn('created_at', '{{ date("Y-m-d H:i:s", strtotime($created_at)) }}')   		
			->addColumn('updated_at', '{{ date("Y-m-d H:i:s", strtotime($updated_at)) }}')            
			->addColumn('checkbox', 
				'<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>'
			)
            ->rawColumns(['checkbox','actions','status']);
    }
  

     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.38]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
        return JudgerRequest::query()->orderByDesc('id')->select("*");

    }

	/**
 	* Optional method if you want to use html builder.
 	*[it v 1.6.38]
	* @return \Yajra\Datatables\Html\Builder
	*/
	public function html()
	{
		$html =  $this->builder()
		->columns($this->getColumns())
		//->ajax('')
		->parameters([
			'searching'   => true,
			'paging'   => true,
			'bLengthChange'   => true,
			'bInfo'   => true,
			'responsive'   => true,
			'dom' => 'Blfrtip',
			"lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('admin.all_records')]],
			'buttons' => [
				[
					'extend' => 'print',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-print"></i> '.trans('admin.print')
				],	
				[
				'extend' => 'excel',
				'className' => 'btn btn-outline',
				'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')
				],	
				[
				'extend' => 'csv',
				'className' => 'btn btn-outline',
				'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_csv')
				],
				[
					'extend' => 'pdf',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-pdf"> </i> '.trans('admin.export_pdf')
				],
				[
				'extend' => 'reload',
				'className' => 'btn btn-outline',
				'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
				],
			],
			'initComplete' => "function () {
		
				". filterElement('1,2,3,4,5,6', 'input') . "
				
			}",
			'order' => [[1, 'desc']],

				'language' => [
					'sProcessing' => trans('admin.sProcessing'),
                    'sLengthMenu'        => trans('admin.sLengthMenu'),
                    'sZeroRecords'       => trans('admin.sZeroRecords'),
                    'sEmptyTable'        => trans('admin.sEmptyTable'),
                    'sInfo'              => trans('admin.sInfo'),
                    'sInfoEmpty'         => trans('admin.sInfoEmpty'),
                    'sInfoFiltered'      => trans('admin.sInfoFiltered'),
                    'sInfoPostFix'       => trans('admin.sInfoPostFix'),
                    'sSearch'            => trans('admin.sSearch'),
                    'sUrl'               => trans('admin.sUrl'),
                    'sInfoThousands'     => trans('admin.sInfoThousands'),
                    'sLoadingRecords'    => trans('admin.sLoadingRecords'),
                    'oPaginate'          => [
                        'sFirst'            => trans('admin.sFirst'),
                        'sLast'             => trans('admin.sLast'),
                        'sNext'             => trans('admin.sNext'),
                        'sPrevious'         => trans('admin.sPrevious'),
                    ],
                    'oAria'            => [
                        'sSortAscending'  => trans('admin.sSortAscending'),
                        'sSortDescending' => trans('admin.sSortDescending'),
                    ],
				]
			]);

			return $html;

	}

    	

    	/**
	     * Get columns.
	     * Auto getColumns Method By Baboon Script [it v 1.6.38]
	     * @return array
	     */

	    protected function getColumns()
	    {
	        return 
			[
				[
					'name' => 'checkbox',
					'data' => 'checkbox',
					'title' => '<div  class="icheck-danger">
					<input type="checkbox" class="select-all" id="select-all" onclick="select_all()" >
					<label for="select-all"></label>
					</div>',
					'orderable'      => false,
					'searchable'     => false,
					'exportable'     => false,
					'printable'      => false,
					'width'          => '10px',
					'aaSorting'      => 'none'
				],
				[
					'name'=>'city',
					'data'=>'city',
					'title'=>'??????????????',
				],
				[
					'name'=>'name',
					'data'=>'name',
					'title'=>trans('admin.name'),
				],
				[
					'name'=>'contact',
					'data'=>'contact',
					'title'=>'??????????????',
				],
				[
					'name'=>'status',
					'data'=>'status',
					'title'=>'????????',
				],
				[
					'name'=>'order_name',
					'data'=>'order_name',
					'title'=>'??????????',
				],
                [
					'name'=>'amount_rate',
					'data'=>'amount_rate',
					'title'=>'???????? ????????????',
				],
				[
					'name' => 'created_at',
					'data' => 'created_at',
					'title' => trans('admin.created_at'),
					'exportable' => false,
					'printable'  => false,
					'searchable' => false,
					'orderable'  => false,
				],
				[
					'name' => 'updated_at',
					'data' => 'updated_at',
					'title' => trans('admin.updated_at'),
					'exportable' => false,
					'printable'  => false,
					'searchable' => false,
					'orderable'  => false,
				],
				[
					'name' => 'actions',
					'data' => 'actions',
					'title' => trans('admin.actions'),
					'exportable' => false,
					'printable'  => false,
					'searchable' => false,
					'orderable'  => false,
				],
    	 	];
		}

	    /**
	     * Get filename for export.
	     * Auto filename Method By Baboon Script
	     * @return string
	     */
	    protected function filename()
	    {
	        return 'careers_' . time();
	    }
    	
}