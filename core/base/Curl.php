<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 20.03.2019
 * Time: 12:55
 */

namespace core\base;

abstract class Curl
{
    protected $curl;

    public function init(){
        $this->curl = curl_init();
        curl_setopt($this->curl,CURLOPT_RETURNTRANSFER,1);
        return $this;
    }

    public function setUrl($url){
        curl_setopt($this->curl,CURLOPT_URL,$url);
        return $this;
    }

    public function setHeaders(array $headers){
        curl_setopt($this->curl,CURLOPT_HEADER,$headers);
        return $this;
    }

    public function setMethod(string $method){
        curl_setopt($this->curl,CURLOPT_CUSTOMREQUEST,$method);
        return $this;
    }

    public function setParams(array $params){
        curl_setopt($this->curl,CURLOPT_POSTFIELDS,$params);
        return $this;
    }

    public function exec(){
        $resp = curl_exec($this->curl);
        if ($code=curl_errno($this->curl)){
            $error = curl_error($this->curl);
            curl_close($this->curl);
            return $error.":".$code;
        }
        curl_close($this->curl);
        return $resp;
    }
}