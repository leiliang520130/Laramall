<?php

namespace LaraStore\Forms\Comment;
use App\Models\Goods;
use App\Models\Message;
use LaraStore\Forms\Form;
use App\Http\Controllers\Api\ApiController as Api;

class ShowForm extends Form{

	public $api;
	/*
    |-------------------------------------------------------------------------------
    |
    | 表单验证规则
    |
    |-------------------------------------------------------------------------------
    */
    protected $rules = [
        
    ];


    /*
    |-------------------------------------------------------------------------------
    |
    | 表单验证规则提示信息
    |
    |-------------------------------------------------------------------------------
    */
    protected $messages = [
       	
    ];


    /*
    |-------------------------------------------------------------------------------
    |
    | 构造函数
    |
    |-------------------------------------------------------------------------------
    */
    public function __construct(Api $api){
       $this->api           = $api;
    }


    /*
    |-------------------------------------------------------------------------------
    |
    |   检测模型是否存在
    |
    |-------------------------------------------------------------------------------
    */
    public function isEmpty(){

    	return (empty(Goods::find($this->id)))? true:false;
    }


    /*
    |-------------------------------------------------------------------------------
    |
    |   isValid
    |
    |-------------------------------------------------------------------------------
    */
    public function isValid(){

        return ($this->isEmpty())? false : true;
    }

    

    /*
    |-------------------------------------------------------------------------------
    |
    |  成功后返回
    |
    |-------------------------------------------------------------------------------
    */
    public function successRespond(){

    	$tag 				= 'success';
    	$info 				= 'success';
        $goods              = Goods::find($this->id);
        $comment_list       = $goods->presenter()->comment();

    	return $this->api->respond(['data'=>compact('tag','info','comment_list')]);
    	
    }


    /*
    |-------------------------------------------------------------------------------
    |
    |  验证未通过返回错误信息
    |
    |-------------------------------------------------------------------------------
    */
    public function errorRespond(){

    	if($this->isEmpty()){
            $info               = '模型异常';
    		return $this->api->respondCommonError($info);
    	}
    }



    /*
    |-------------------------------------------------------------------------------
    |
    | 处理数据库相关操作
    |
    |-------------------------------------------------------------------------------
    */
    public function persist()
    {
         return true;
    }
}