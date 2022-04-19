<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractTemplate extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends =['title','content'];
    public function getTitleAttribute(){
        return app()->getLocale() === 'ar' ?  $this->title_ar : $this->title_en ;
    }
    public function getContentAttribute(){
        return app()->getLocale() === 'ar' ?  $this->content_ar : $this->content_en ;
    }
}
