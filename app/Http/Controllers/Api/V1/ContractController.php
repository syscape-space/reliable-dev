<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractTemplate;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function preview($template_id){
        $template = ContractTemplate::query()->find($template_id);
        $data = \request()->all();
        $content = $template->renderContent($data);
        return response(compact('content'));
    }
    public function store(){
        $data = \request()->all();
        $data['terms'] = json_encode($data['terms']);
        $data['financial_allowances'] = json_encode($data['financial_terms']);
        unset($data['financial_terms']);
        $contract = Contract::query()->create($data);
        return response($contract);
    }
}
