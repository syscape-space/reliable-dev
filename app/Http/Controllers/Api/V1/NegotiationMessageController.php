<?php

namespace App\Http\Controllers\Api\V1;

use Ahmedjoda\JodaResources\JodaApiResource;
use App\Http\Controllers\Controller;
use App\Models\NegotiateMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NegotiationMessageController extends Controller
{
    use JodaApiResource;
    protected $model = NegotiateMessage::class;
    protected $rules = [
        'content'   =>  'required',
        'user_id'   =>  'required',
        'negotiate_id'   =>  'required',
    ];
    public function store()
    {
        $data = $this->validate(\request(),$this->rules);
        if (\request()->hasFile('content')){
            $mime = \request()->file('content')->getMimeType();
            if(strstr($mime, "video/")){
                $data["type"] = "video";
            }else if(strstr($mime, "image/")){
                $data["type"] = "image";
            }
            $data['content'] = it()->upload('content','messages');
        }
        $createdModel = NegotiateMessage::query()->create($data);
        return $this->jsonForm($createdModel, Response::HTTP_CREATED);

    }
}
