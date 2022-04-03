<?php
namespace App\DataTables;
use App\Models\City;
use App\Models\Order;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved [it v 1.6.37]

class OrdersDataTable extends DataTable {


	public function dataTable(DataTables $dataTables, $query) {
		return datatables($query)
			->addColumn('actions', 'admin.orders.buttons.actions')
			->addColumn('choose_service_provider', function ($d){
			    return trans("admin.".$d->choose_service_provider)
                    .'<br>'.($d->choose_service_provider == "by_city" ? (City::query()->find($d->city_id)->city_name_ar ?? "") : "");
            })
			->addColumn('order_status', '{{ trans("admin.".$order_status) }}')
			->addColumn('negotiable', '{{ trans("admin.".$negotiable) }}')
			->addColumn('receive_offers', '{{ trans("admin.".$receive_offers) }}')
			->addColumn('assigning_arbitration', '{{ trans("admin.".$assigning_arbitration) }}')
			->addColumn('decisions_status', '{{ trans("admin.".$decisions_status) }}')
			->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')	->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')	->addColumn('checkbox', '<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>')
			->rawColumns(['checkbox', 'actions','choose_service_provider']);
	}

	/**
	 * Get the query object to be processed by dataTables.
	 * Auto Ajax Method By Baboon Script [it v 1.6.37]
	 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
	 */
	public function query() {
		return Order::query()->with([
				'department_id',
				'country_id',
				'city_id',
				'user_id',
				'order_type_id',
			])->where(function ($q) {
				if (request('status')) {
					$q->where('order_status', request('status'));
				}
				if (request('arbitration')) {
					$q->where('order_status','open')->where('assigning_arbitration', request('arbitration'));
				}
				if (request('negotiable')) {
					$q->where('order_status','open')->where('negotiable', request('negotiable'));
				}
			})->select("orders.*");

	}

	/**
	 * Optional method if you want to use html builder.
	 *[it v 1.6.37]
	 * @return \Yajra\Datatables\Html\Builder
	 */
	public function html() {
		$html = $this->builder()
		             ->columns($this->getColumns())
		//->ajax('')
			->parameters([
				'searching'     => true,
				'paging'        => true,
				'bLengthChange' => true,
				'bInfo'         => true,
				'responsive'    => true,
				'dom'           => 'Blfrtip',
				"lengthMenu"    => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('admin.all_records')]],
				'buttons'       => [
					[
						'extend'    => 'print',
						'className' => 'btn btn-outline',
						'text'      => '<i class="fa fa-print"></i> '.trans('admin.print'),
					], [
						'extend'    => 'excel',
						'className' => 'btn btn-outline',
						'text'      => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel'),
					], [
						'extend'    => 'csv',
						'className' => 'btn btn-outline',
						'text'      => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_csv'),
					], [
						'extend'    => 'pdf',
						'className' => 'btn btn-outline',
						'text'      => '<i class="fa fa-file-pdf"> </i> '.trans('admin.export_pdf'),
					], [
						'extend'    => 'reload',
						'className' => 'btn btn-outline',
						'text'      => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload'),
					], [
						'text'      => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
						'className' => 'btn btn-outline deleteBtn',
					], [
						'text'      => '<i class="fa fa-plus"></i> '.trans('admin.add'),
						'className' => 'btn btn-primary',
						'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
					],
				],
				'initComplete' => "function () {

            ".filterElement('1,2,4,6,8,10,11', 'input')."

            ".filterElement('3', 'select', \App\Models\OrderType::pluck("type_name_ar", "type_name_ar"))."

            ".filterElement('5', 'select', [
						'all'           => trans('admin.all'),
						'by_city'       => trans('admin.by_city'),
						'by_filter'     => trans('admin.by_filter'),
						'by_occupation' => trans('admin.by_occupation'),
					])."

            ".filterElement('5', 'select', \App\Models\City::pluck("city_name_ar", "city_name_ar"))."
                ".filterElement('7', 'select', [
						'yes' => trans('admin.yes'),
						'no'  => trans('admin.no'),
					])."
            ".filterElement('9', 'select', [
						'under_review' => trans('admin.under_review'),
						'open'         => trans('admin.open'),
						'closed'       => trans('admin.closed'),
					])."



	            }",
				'order' => [[1, 'desc']],

				'language'         => [
					'sProcessing'     => trans('admin.sProcessing'),
					'sLengthMenu'     => trans('admin.sLengthMenu'),
					'sZeroRecords'    => trans('admin.sZeroRecords'),
					'sEmptyTable'     => trans('admin.sEmptyTable'),
					'sInfo'           => trans('admin.sInfo'),
					'sInfoEmpty'      => trans('admin.sInfoEmpty'),
					'sInfoFiltered'   => trans('admin.sInfoFiltered'),
					'sInfoPostFix'    => trans('admin.sInfoPostFix'),
					'sSearch'         => trans('admin.sSearch'),
					'sUrl'            => trans('admin.sUrl'),
					'sInfoThousands'  => trans('admin.sInfoThousands'),
					'sLoadingRecords' => trans('admin.sLoadingRecords'),
					'oPaginate'       => [
						'sFirst'         => trans('admin.sFirst'),
						'sLast'          => trans('admin.sLast'),
						'sNext'          => trans('admin.sNext'),
						'sPrevious'      => trans('admin.sPrevious'),
					],
					'oAria'            => [
						'sSortAscending'  => trans('admin.sSortAscending'),
						'sSortDescending' => trans('admin.sSortDescending'),
					],
				],
			]);

		return $html;

	}

	/**
	 * Get columns.
	 * Auto getColumns Method By Baboon Script [it v 1.6.37]
	 * @return array
	 */

	protected function getColumns() {
		return [

			[
				'name'  => 'checkbox',
				'data'  => 'checkbox',
				'title' => '<div  class="icheck-danger">
                  <input type="checkbox" class="select-all" id="select-all"  onclick="select_all()" >
                  <label for="select-all"></label>
                </div>',
				'orderable'  => false,
				'searchable' => false,
				'exportable' => false,
				'printable'  => false,
				'width'      => '10px',
				'aaSorting'  => 'none',
			],
			[
				'name'      => 'id',
				'data'      => 'id',
				'title'     => trans('admin.record_id'),
				'width'     => '10px',
				'aaSorting' => 'none',
			],
			[
				'name'  => 'order_title',
				'data'  => 'order_title',
				'title' => trans('admin.order_title'),
			],
			[
				'name'  => 'order_type_id.'.l('type_name'),
				'data'  => 'order_type_id.'.l('type_name'),
				'title' => trans('admin.order_type_id'),
			],
			[
				'name'  => 'department_id.department_name_ar',
				'data'  => 'department_id.department_name_ar',
				'title' => trans('admin.department_id'),
			],
			[
				'name'  => 'city_id.city_name_ar',
				'data'  => 'city_id.city_name_ar',
				'title' => trans('admin.city_id'),
			],
			[
				'name'  => 'execution_time',
				'data'  => 'execution_time',
				'title' => trans('admin.execution_time'),
			], [
				'name'  => 'orders.negotiable',
				'data'  => 'negotiable',
				'title' => trans('admin.negotiable'),
			],
			[
				'name'  => 'amount',
				'data'  => 'amount',
				'title' => trans('admin.amount'),
			],
			[
				'name'  => 'orders.order_status',
				'data'  => 'order_status',
				'title' => trans('admin.order_status'),
			],
			[
				'name'  => 'user_id.name',
				'data'  => 'user_id.name',
				'title' => trans('admin.user_id'),
			],
			// [
			// 	'name'  => 'orders.receive_offers',
			// 	'data'  => 'receive_offers',
			// 	'title' => trans('admin.receive_offers'),
			// ],
			// [
			// 	'name'  => 'orders.assigning_arbitration',
			// 	'data'  => 'assigning_arbitration',
			// 	'title' => trans('admin.assigning_arbitration'),
			// ],
			// [
			// 	'name'  => 'decisions_refused_reason',
			// 	'data'  => 'decisions_refused_reason',
			// 	'title' => trans('admin.decisions_refused_reason'),
			// ],

			[
				'name'       => 'created_at',
				'data'       => 'created_at',
				'title'      => trans('admin.created_at'),
				'exportable' => false,
				'printable'  => false,
				'searchable' => false,
				'orderable'  => false,
			],
			[
				'name'       => 'choose_service_provider',
				'data'       => 'choose_service_provider',
				'title'      => "تحديد مقدم الخدمة",

			],
			[
				'name'       => 'actions',
				'data'       => 'actions',
				'title'      => trans('admin.actions'),
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
	protected function filename() {
		return 'orders_'.time();
	}

}