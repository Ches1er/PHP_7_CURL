<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 10:21
 */

namespace app\services;


class NotesService
{
    public function __construct()
    {
    }

    private function startCurl(){
        return curl_init();
    }

    public function showNotes($id){
        if (is_null($id)) return null;
        $curl = $this->startCurl();
        curl_setopt($curl,CURLOPT_URL,"http://pdfstep.zzz.com.ua?action=todo&method=get");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,"id=$id");
        $responce = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return $responce["data"];
    }
    public function addNote(int $user_id,string $note_name,string $desc){
        $data = ["id"=>$user_id,"name"=>$note_name,"desc"=>$desc];
        $curl = $this->startCurl();
        curl_setopt($curl,CURLOPT_URL,"http://pdfstep.zzz.com.ua?action=todo&method=add");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        curl_exec($curl);
        curl_close($curl);
    }
    public function delNote(int $id){
        $curl = $this->startCurl();
        curl_setopt($curl,CURLOPT_URL,"http://pdfstep.zzz.com.ua?action=todo&method=delete");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,"id=$id");
        curl_exec($curl);
        curl_close($curl);
    }
    public function showNote($user_id,$note_id){
        if (is_null($user_id) || is_null($note_id)) return null;
        $notes = $this->showNotes($user_id);
        $note = [];
        $note[]= array_filter($notes,function ($n) use ($note_id){
            return $n["id"]===$note_id;
        });
        return $note[0];
    }
}