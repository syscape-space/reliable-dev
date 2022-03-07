<?php
namespace App\DataTables;
use App\Models\Occupation;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved [it v 1.6.37]
class OccupationsDataTable extends DataTable
{
    	

     /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.occupations.buttons.actions')
            ->addColumn('licenses', '{{ trans("admin.".$licenses) }}')
            ->addColumn('experiences', '{{ trans("admin.".$experiences) }}')
            ->addColumn('qualifications', '{{ trans("admin.".$qualifications) }}')
            ->addColumn('commercial_records', '{{ trans("admin.".$commercial_records) }}')
   		->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')   		->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')            ->addColumn('checkbox', '<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>')
            ->rawColumns(['checkbox','actions',]);
    }
  

     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.37]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
        return Occupation::query()->select("occupations.*");

    }
    	

    	 /**
	     * Optional method if you want to use html builder.
	     *[it v 1.6.37]
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
					 ],	[
					'extend' => 'excel',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')
					],	[
					'extend' => 'csv',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_csv')
					],	[
					 'extend' => 'pdf',
					 'className' => 'btn btn-outline',
					 'text' => '<i class="fa fa-file-pdf"> </i> '.trans('admin.export_pdf')
					],	[
					'extend' => 'reload',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
					],	[
						'text' => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
						'className'    => 'btn btn-outline deleteBtn',
                    ], 	[
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {


            
            ". filterElement('1,2,3', 'input') . "

                        //licensesoccupation_name_ar,occupation_name_en,licenses,experiences,qualifications,commercial_records4
            ". filterElement('4', 'select', [
            'enable'=>trans('admin.enable'),
            'disable'=>trans('admin.disable'),
            ]) . "
            //experiencesoccupation_name_ar,occupation_name_en,licenses,experiences,qualifications,commercial_records5
            ". filterElement('5', 'select', [
            'enable'=>trans('admin.enable'),
            'disable'=>trans('admin.disable'),
            ]) . "
            //qualificationsoccupation_name_ar,occupation_name_en,licenses,experiences,qualifications,commercial_records6
            ". filterElement('6', 'select', [
            'enable'=>trans('admin.enable'),
            'disable'=>trans('admin.disable'),
            ]) . "
            //commercial_recordsoccupation_name_ar,occupation_name_en,licenses,experiences,qualifications,commercial_records7
            ". filterElement('7', 'select', [
            'enable'=>trans('admin.enable'),
            'disable'=>trans('admin.disable'),
            ]) . "


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
	     * Auto getColumns Method By Baboon Script [it v 1.6.37]
	     * @return array
	     */

	    protected function getColumns()
	    {
	        return [
	       	
 [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<div  class="icheck-danger">
                  <input type="checkbox" class="select-all" id="select-all"  onclick="select_all()" >
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
                'name' => 'id',
                'data' => 'id',
                'title' => trans('admin.record_id'),
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
				[
                 'name'=>'occupation_name_ar',
                 'data'=>'occupation_name_ar',
                 'title'=>trans('admin.occupation_name_ar'),
		    ],
				[
                 'name'=>'occupation_name_en',
                 'data'=>'occupation_name_en',
                 'title'=>trans('admin.occupation_name_en'),
		    ],
				[
                 'name'=>'occupations.licenses',
                 'data'=>'licenses',
                 'title'=>trans('admin.licenses'),
		    ],
				[
                 'name'=>'occupations.experiences',
                 'data'=>'experiences',
                 'title'=>trans('admin.experiences'),
		    ],
				[
                 'name'=>'occupations.qualifications',
                 'data'=>'qualifications',
                 'title'=>trans('admin.qualifications'),
		    ],
				[
                 'name'=>'occupations.commercial_records',
                 'data'=>'commercial_records',
                 'title'=>trans('admin.commercial_records'),
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
	        return 'occupations_' . time();
	    }
    	
}