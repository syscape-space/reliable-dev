<?php
\Config::set('filesystems.disks.public.url', url('storage'));
//return dd(config('filesystems.disks.public.url'));
////// direction Function /////////////////////
app()->singleton('direction', function () {
		if (app('l') == 'ar') {
			return '-rtl';
		}
	});
////// direction Function /////////////////////

//////  upload Function /////////////////////
if (!function_exists('it')) {
	function it() {
		return new \App\Http\Controllers\FileUploader;
	}
}
//////  upload Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('aurl')) {
	function aurl($link) {
		if (substr($link, 0, 1) == '/') {
			return url(app('admin').$link);
		} else {
			return url(app('admin').'/'.$link);
		}
	}
}
////// Admin Url Function /////////////////////
////// Get Settings Function /////////////////////
if (!function_exists('AdminPanelCheckExt')) {
	function AdminPanelCheckExt($param_name, $ext) {
		$result = ['ext' => '', 'size' => '', 'size_type' => ''];
		$data   = setting()->{ $param_name};
		if (!empty($data)) {
			foreach (json_decode($data) as $param) {
				if (in_array($ext, $param->exts)) {
					foreach ($param->exts as $key => $ext_data) {
						if ($ext_data == $ext) {
							$result = [
								'ext'       => $ext,
								'size'      => $param->size[$key],
								'size_type' => $param->size_type[$key],
							];
						}
					}
				}
			}
		}

		return $result;
	}

}
if (!function_exists('setting')) {
	function setting() {
		$setting = \App\Models\Setting::orderBy('id', 'desc')->first();
		if (!empty($setting) && !empty($setting->theme_setting)) {
			$setting->theme_setting = json_decode($setting->theme_setting);
		}
		if (empty($setting)) {
			return \App\Models\Setting::create([
					'theme_setting' => '{"brand_color":"navbar-dark","sidebar_class":"sidebar-dark-navy","main_header":"","navbar":"navbar-dark navbar-dark"}',
					'sitename_ar'   => '', 'sitename_en'   => '']);
		} else {
			return $setting;
		}
	}
}
////// Get Settings Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('admin')) {
	function admin() {
		return auth()->guard('admin');
	}
}
////// Admin Url Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('active_link')) {
	function active_link($segment, $class = null) {
		if ($segment == null and request()->segment(2) == null) {
			return $class;
		} elseif (in_array(request()->segment(2), explode('|', $segment))) {
			if ($class != null || $class != 'block') {
				if ($segment != null) {
					return $class;
				}
			} else {
				if ($class == 'block') {
					return 'display:block';
				} else {
					return 'display:none';
				}
			}
		}
	}
}
////// Admin Url Function /////////////////////

if (!function_exists('l')) {
	function l($obj) {
		return $obj.'_'.app('l');
	}
}

if (!function_exists('mK')) {
	function mK($num) {
		if ($num > 1000) {
			$x               = round($num);
			$x_number_format = number_format($x);
			$x_array         = explode(',', $x_number_format);
			$x_parts         = array('k', 'm', 'b', 't');
			$x_count_parts   = count($x_array)-1;
			$x_display       = $x;
			$x_display       = $x_array[0].((int) $x_array[1][0] !== 0?'.'.$x_array[1][0]:'');
			$x_display .= $x_parts[$x_count_parts-1];
			return $x_display;
		}
		return $num;
	}
}

if (!function_exists('filterElement')) {
	function filterElement($key, $type = 'input', $data = []) {
		if ($type == 'input') {
			$input = "
			this.api().columns([".$key."]).every(function () {

				var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
			});
		";
			return $input;
		} elseif ($type == 'select') {
			$select = "
			this.api().columns([".$key."]).every(function () {
				var column = this;
                var select = '<select style=\"width:100%;\" class=\"form-control select2\"><option selected value=\"\">".trans('admin.choose')."</option>";
			foreach ($data as $key => $val) {
				$select .= '<option value=\"'.$key.'\">'.$val.'</option>';
			}
			$select .= "</select>';
                $(select).appendTo($(column.footer()).empty())
                .on('change', function () {
                	var selectedVal = $('option:selected', this).val();
                	//console.log(selectedVal);
                    column.search(selectedVal).draw();
                });
            });

		";
			return $select;
		}
	}
}

if (!function_exists('redirectWithSuccess')) {
	function redirectWithSuccess($url, $msg = null) {
		!empty($msg)?session()->flash('success', $msg):'';
		if (request()->ajax() or request()->wantsJson()) {
			return successResponseJson([
					'message' => $msg,
				]);
		} else {
			return redirect($url);
		}
	}
}

if (!function_exists('redirectWithError')) {
	function redirectWithError($url, $msg = null) {
		if (request()->ajax() || !request()->ajax()) {
			!empty($msg) && !is_null($msg)?session()->flash('error', $msg):'';
		}

		if (request()->ajax() or request()->wantsJson()) {
			return errorResponseJson([
					'message' => $msg,
				]);
		} else {
			return redirect($url);
		}
	}
}

if (!function_exists('backWithSuccess')) {
	function backWithSuccess($msg = null, $url = null) {
		if (request()->ajax() || !request()->ajax()) {
			!empty($msg) && !is_null($msg)?session()->flash('success', $msg):'';
		}

		if (request()->ajax() or request()->wantsJson()) {
			return successResponseJson([
					'message' => $msg,
				]);
		} else {
			if (!empty($url)) {
				return redirect($url);
			} else {
				return back();
			}
		}
	}
}

if (!function_exists('backWithError')) {
	function backWithError($msg = null, $url = null) {
		if (request()->ajax() || !request()->ajax()) {
			!empty($msg) && !is_null($msg)?session()->flash('error', $msg):'';
		}

		if (request()->ajax() or request()->wantsJson()) {
			return errorResponseJson([
					'message' => $msg,
				]);
		} else {
			if (!empty($url)) {
				return redirect($url);
			} else {
				return back();
			}
		}
	}
}

if (!function_exists('errorResponse')) {
	function errorResponseJson(array $data, $status = 422) {
		$data['status']       = false;
		$data['StatusCode']   = $status;
		$data['StatusType']   = 'Unprocessable Entity';
		$data['explainError'] = 'The request was well-formed but was unable to be followed due to semantic errors.';
		if (!isset($data['message'])) {
			$data['message'] = trans("admin.undefinedRecord");
		}
		return response()->json($data, $status);

	}
}

if (!function_exists('successResponseJson')) {
	function successResponseJson(array $data) {
		$data['status']     = true;
		$data['StatusCode'] = 200;
		$data['StatusType'] = 'OK';
		return response()->json($data, 200);

	}
}

if (!function_exists('checkPermissionGroup')) {
	function checkPermissionGroup($permission, $group) {
		$explode_name = explode('_', $permission);
		$role         = $group->role()->where('name', $explode_name[0])->first();
		if (!empty($role) && $role->{ $explode_name[1]} == 'yes') {
			return true;
		}
		return false;
	}
}

////// Baundraies Function /////////////////////
if (!function_exists('load_dep')) {
	function load_dep($did = null) {
		return \App\Http\Controllers\Admin\Departments::load_dep($did);
	}
}

if (!function_exists('sys_conf')) {
	function sys_conf() {
		return (object) [
			// Here The arbitrators in DB
			'arbitrators' => 8,
		];
	}
}

//get vendor by specialiste and department to create Order
if (!function_exists('users_SD')) {
	function users_SD($department_id) {
		$department  = \App\Models\Department::find($department_id);
		$specialties = $department->specialties()->where('occupation_id', '!=', sys_conf()->arbitrators);
		if (!empty($department) && $specialties->count() > 0) {
			$specialties = $specialties->get(['specialtie_id']);
			return \App\Models\UserJob::whereIn('specialtie_id', $specialties)->get(['user_id']);
		} else {
			return [];
		}
	}
}

//get arbitrators by specialiste and department to create Order
if (!function_exists('arbitrators_SD')) {
	function arbitrators_SD($department_id) {
		$department  = \App\Models\Department::find($department_id);
		$specialties = $department->specialties()->where('occupation_id', sys_conf()->arbitrators);
		if (!empty($department) && $specialties->count() > 0) {
			$specialties = $specialties->get(['specialtie_id']);
			return \App\Models\UserJob::whereIn('specialtie_id', $specialties)->get(['user_id']);
		} else {
			return [];
		}
	}
}

if (!function_exists('checkNegative')) {
	function checkNegative($val) {
		return $val > 0?$val:0;
	}
}
if (!function_exists('ago')) {
	function ago($datetime, $full = false) {
		$now  = new DateTime;
		$ago  = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d/7);
		$diff->d -= $diff->w*7;

		$string = array(
			'y' => trans('admin.year'),
			'm' => trans('admin.month'),
			'w' => trans('admin.week'),
			'd' => trans('admin.day'),
			'h' => trans('admin.hour'),
			'i' => trans('admin.minute'),
			's' => trans('admin.second'),
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k.' '.$v.($diff->$k > 1?'':'');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) {
			$string = array_slice($string, 0, 1);
		}

		return $string?trans('admin.ago').' '.implode(', ', $string):trans('admin.just_now');
	}

}

if (!function_exists('getPercentFromSetting')) {
	function getPercentFromSetting($col, $amount) {
		return (setting()->{ $col}/100*$amount);
	}
}
if (!function_exists('orderBalance')) {
	function orderBalance() {
		return (new App\Http\Controllers\UserInvoices\OrderAndUserBalance);
	}
}