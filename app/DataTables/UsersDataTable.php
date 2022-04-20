<?php
namespace App\DataTables;
use App\Models\Judger;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved [it v 1.6.37]

class UsersDataTable extends DataTable {


	public function dataTable(DataTables $dataTables, $query) {
		return datatables($query)
            ->addColumn('orders',function ($d){
                return "<a href='".url('admin/orders?user_id='.$d->id)."'> ".$d->orders()->count()." طلب </a>";
            })
			->addColumn('actions', 'admin.users.buttons.actions')
			->addColumn('email_verify', '{{ trans("admin.".$email_verify) }}')
			->addColumn('mobile_verify', '{{ trans("admin.".$mobile_verify) }}')
			->addColumn('photo_profile', '{!! view("admin.show_image",["image"=>$photo_profile])->render() !!}')
			->addColumn('membership_type', '{{ trans("admin.".$membership_type) }}')
			->addColumn('account_type', '{{ trans("admin.".$account_type) }}')
			->addColumn('id_type', '{{ trans("admin.".$id_type) }}')
			->addColumn('id_status', '{{ trans("admin.".$id_status) }}')
			->addColumn('account_status', '{{ trans("admin.".$account_status) }}')
			->addColumn('add_offer', '{{ trans("admin.".$add_offer) }}')
			->addColumn('add_request', '{{ trans("admin.".$add_request) }}')
			->addColumn('gender', '{{ trans("admin.".$gender) }}')
			->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')	->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')	->addColumn('checkbox', '<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>')
			->rawColumns(['checkbox', 'actions', "photo_profile",'orders']);
	}

	/**
	 * Get the query object to be processed by dataTables.
	 * Auto Ajax Method By Baboon Script [it v 1.6.37]
	 * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
	 */
	public function query() {
        if (request('membership_type') and request('membership_type') == 'judger') {
            return Judger::query()->with(['orders']);
        }
		return User::query()->where(function ($q) {
				if (request('membership_type')) {
					$q->where('membership_type', request('membership_type'));
				}
				if (request('account_type')) {
					$q->where('account_type', request('account_type'));
				}
				if (request('status')) {
					$q->where('account_status', request('status'));
				}
				if (request('id_status')) {
					$q->where('id_status', request('id_status'));
				}
			})->with(['company_id','orders'])->select("users.*");

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
                        	window.location.href =  "'.\URL::current().'/create?membership_type='.request('membership_type').'";
                        }',
					],
				],
				'initComplete' => "function () {



            ".filterElement('1,2,3,4,7', 'input')."

            ".filterElement('6', 'select', [
						'company'    => trans('admin.company'),
						'individual' => trans('admin.individual'),
					])."
            ".filterElement('9', 'select', [
						'pending'  => trans('admin.pending'),
						'verified' => trans('admin.verified'),
					])."

            ".filterElement('8', 'select', [
						'national_id' => trans('admin.national_id'),
						'iqama'       => trans('admin.iqama'),
						'passport'    => trans('admin.passport'),
					])."



            ".filterElement('11', 'select', [
						'pending' => trans('admin.pending'),
						'active'  => trans('admin.active'),
						'refused' => trans('admin.refused'),
						'ban'     => trans('admin.ban'),
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
				'name'  => 'name',
				'data'  => 'name',
				'title' => trans('admin.name'),
			],
			[
				'name'  => 'email',
				'data'  => 'email',
				'title' => trans('admin.email'),
			],
			[
				'name'  => 'mobile',
				'data'  => 'mobile',
				'title' => trans('admin.mobile'),
			],
			[
				'name'  => 'photo_profile',
				'data'  => 'photo_profile',
				'title' => trans('admin.photo_profile'),
			],
			// [
			// 	'name'  => 'users.membership_type',
			// 	'data'  => 'membership_type',
			// 	'title' => trans('admin.membership_type'),
			// ],
			[
				'name'  => 'users.account_type',
				'data'  => 'account_type',
				'title' => trans('admin.account_type'),
			],
			[
				'name'  => 'id_number',
				'data'  => 'id_number',
				'title' => trans('admin.id_number'),
			],
			[
				'name'  => 'users.id_type',
				'data'  => 'id_type',
				'title' => trans('admin.id_type'),
			],
			[
				'name'  => 'users.id_status',
				'data'  => 'id_status',
				'title' => trans('admin.id_status'),
			],
			[
				'name'  => 'orders',
				'data'  => 'orders',
				'title' => trans('admin.orders'),
			],
			[
				'name'  => 'users.account_status',
				'data'  => 'account_status',
				'title' => trans('admin.account_status'),
			],
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
				'name'       => 'updated_at',
				'data'       => 'updated_at',
				'title'      => trans('admin.updated_at'),
				'exportable' => false,
				'printable'  => false,
				'searchable' => false,
				'orderable'  => false,
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
		return 'users_'.time();
	}

}