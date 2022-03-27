<?php

namespace App\Http\Controllers\Api\V1;

use Ahmedjoda\JodaResources\JodaApiResource;
use App\Http\Controllers\Controller;
use App\Models\NegotiateMessage;
use Illuminate\Http\Request;

class NegotiationMessageController extends Controller
{
    use JodaApiResource;
    protected $model = NegotiateMessage::class;
    protected $rules = [
        'content'   =>  'required',
        'user_id'   =>  'required',
        'negotiate_id'   =>  'required',
    ];
}
