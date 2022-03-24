<?php

namespace App\Http\Controllers\Admin;

use Ahmedjoda\JodaResources\JodaResource;
use App\DataTables\OurServiceDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurServiceController extends Controller
{
    use JodaResource;
    protected $rules = [
        'title' =>  'required',
        'logo'  =>  'image'
    ];
    protected $files = [
        'logo'
    ];
    public function index(OurServiceDataTable $table)
    {
        return $table->render('admin.our-service.index');
    }
    protected function uploadFilesIfExist($data)
    {
        if (isset($this->files)) {
            foreach ($this->files as $file) {
                if (request()->hasFile($file) and request()->$file) {
                    $fileName =
                        (auth()->user() ? auth()->user()->id : '') . '-' .
                        time() . '.' .
                        request()->file($file)->getClientOriginalExtension();
                    $filePath = "$this->pluralCamelName/$fileName";
                    $data[$file] = $filePath;
                    Storage::disk('cloud')->put($filePath, file_get_contents(request()->$file));
                }
            }
        }
        return $data;
    }
}
