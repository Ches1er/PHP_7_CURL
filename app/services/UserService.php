<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 9:43
 */
namespace app\services;
use core\base\Curl;

class UserService extends Curl
{
    public function showUsers(){
        $responce = $this->init()->setUrl("http://pdfstep.zzz.com.ua?action=user&method=getAll")->
            exec();
        $responce = json_decode($responce,true);
        return $responce["data"];
    }
    public function addUser(string $name){
        $this->init()->setUrl("http://pdfstep.zzz.com.ua?action=user&method=add")->
            setMethod("POST")->setParams(["name"=>$name])->exec();
    }
    public function delUser(int $id){
        $this->init()->setUrl("http://pdfstep.zzz.com.ua?action=user&method=del")->
        setMethod("POST")->setParams(["id"=>$id])->exec();
    }
}