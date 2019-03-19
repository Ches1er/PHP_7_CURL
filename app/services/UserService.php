<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 9:43
 */
namespace app\services;

class UserService
{
    public function __construct()
    {
    }

    private function startCurl(){
        return curl_init();
    }

    public function showUsers(){
        $curl = $this->startCurl();
        curl_setopt($curl,CURLOPT_URL,"http://pdfstep.zzz.com.ua?action=user&method=getAll");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $responce = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return $responce["data"];
    }
    public function addUser(string $name){
        $curl = $this->startCurl();
        curl_setopt($curl,CURLOPT_URL,"http://pdfstep.zzz.com.ua?action=user&method=add");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,"name=$name");
        curl_exec($curl);
        curl_close($curl);
    }
    public function delUser(int $id){
        $curl = $this->startCurl();
        curl_setopt($curl,CURLOPT_URL,"http://pdfstep.zzz.com.ua?action=user&method=del");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,"id=$id");
        curl_exec($curl);
        curl_close($curl);
    }
}