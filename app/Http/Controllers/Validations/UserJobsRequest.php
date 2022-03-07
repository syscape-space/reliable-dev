<?php
namespace App\Http\Controllers\Validations;

use App\Models\Occupation;
use Illuminate\Foundation\Http\FormRequest;

class UserJobsRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}
	protected function getOccupation($check_type = 'create') {
		$rules      = [];
		$Occupation = Occupation::find(request('occupation_id'));
		if (!empty($Occupation) && $Occupation->licenses == 'enable') {
			if ($check_type == 'create') {
				$rules['licenses']   = 'required|array';
				$rules['licenses.*'] = 'file';
				//$rules['license_name']     = 'required|array';
				$rules['license_name.*'] = 'required|string';
				//$rules['license_end_at']   = 'required|array';
				$rules['license_end_at.*'] = 'required|date';

			} else {
				$rules['licenses']   = 'sometimes|nullable|array';
				$rules['licenses.*'] = 'file';
				//$rules['license_name']     = 'sometimes|nullable|array';
				$rules['license_name.*'] = 'sometimes|nullable|string';
				//$rules['license_end_at']   = 'sometimes|nullable|array';
				$rules['license_end_at.*'] = 'sometimes|nullable|date';

			}
			//$rules['license_comment']   = 'sometimes|nullable|array';
			$rules['license_comment.*'] = 'sometimes|nullable|string';
		}

		if (!empty($Occupation) && $Occupation->experiences == 'enable') {

			if ($check_type == 'create') {
				$rules['experiences']   = 'required|array';
				$rules['experiences.*'] = 'file';
				//$rules['experience_name']   = 'required|array';
				$rules['experience_name.*'] = 'required|string';
			} else {
				$rules['experiences']   = 'sometimes|nullable|array';
				$rules['experiences.*'] = 'file';
				//$rules['experience_name']   = 'sometimes|nullable|array';
				$rules['experience_name.*'] = 'sometimes|nullable|string';
			}

			//$rules['experience_comment']   = 'sometimes|nullable|array';
			$rules['experience_comment.*'] = 'sometimes|nullable|string';

		}
		if (!empty($Occupation) && $Occupation->qualifications == 'enable') {
			if ($check_type == 'create') {
				$rules['qualifications']   = 'required|array';
				$rules['qualifications.*'] = 'file';
				//$rules['qualification_name']   = 'required|array';
				$rules['qualification_name.*'] = 'required|string';
			} else {
				$rules['qualifications']   = 'sometimes|nullable|array';
				$rules['qualifications.*'] = 'file';
				//$rules['qualification_name']   = 'sometimes|nullable|array';
				$rules['qualification_name.*'] = 'sometimes|nullable|string';
			}
			//$rules['qualifications_comment']   = 'sometimes|nullable|array';
			$rules['qualifications_comment.*'] = 'sometimes|nullable|string';
		}
		if (!empty($Occupation) && $Occupation->commercial_records == 'enable') {
			if ($check_type == 'create') {
				$rules['commercial_records']   = 'required|array';
				$rules['commercial_records.*'] = 'file';
				//$rules['commercial_end_at']    = 'required|array';
				$rules['commercial_end_at.*'] = 'required|date';
				$rules['commercial_id.*']     = 'required|string';
			} else {
				$rules['commercial_records']   = 'sometimes|nullable|array';
				$rules['commercial_records.*'] = 'sometimes|nullable|file';
				//$rules['commercial_end_at']    = 'sometimes|nullable|array';
				$rules['commercial_end_at.*'] = 'sometimes|nullable|date';
				$rules['commercial_id.*']     = 'sometimes|nullable|string';
			}
			//$rules['commercial_comment']   = 'sometimes|nullable|array';
			$rules['commercial_comment.*'] = 'sometimes|nullable|string';

		}
		return $rules;
	}
	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		$rules = [
			'occupation_id' => 'required|integer|exists:occupations,id',
			'specialtie_id' => 'required|integer|exists:specialties,id',
			'user_id'       => 'required|integer|exists:users,id',
		];
		return array_merge($rules, $this->getOccupation());
	}

	protected function onUpdate() {
		return [
			'occupation_id' => 'required|integer|exists:occupations,id',
			'specialtie_id' => 'required|integer|exists:specialties,id',
			'user_id'       => 'required|integer|exists:users,id',
		];
		return array_merge($rules, $this->getOccupation('update'));
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch')?
		$this->onUpdate():$this->onCreate();
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
			'occupation_id'      => trans('admin.occupation_id'),
			'specialtie_id'      => trans('admin.specialtie_id'),
			'user_id'            => trans('admin.user_id'),
			'licenses'           => trans('admin.licenses'),
			'experiences'        => trans('admin.experiences'),
			'qualifications'     => trans('admin.qualifications'),
			'commercial_records' => trans('admin.commercial_records'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson()?
		response([
				'status'     => false,
				'StatusCode' => 422,
				'StatusType' => 'Unprocessable',
				'errors'     => $errors,
			], 422):
		back()->withErrors($errors)->withInput();// Redirect back
	}

}