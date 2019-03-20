<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 10:21
 */

namespace app\services;
use core\base\Curl;

class NotesService extends Curl
{

    public function showNotes($id){
        if (is_null($id)) return null;
        $responce = $this->init()->setUrl("http://pdfstep.zzz.com.ua?action=todo&method=get")->
            setMethod("POST")->setParams(["id"=>$id])->exec();
        $responce = json_decode($responce,true);
        return $responce["data"];
    }
    public function addNote(int $user_id,string $note_name,string $desc){
        $data = ["id"=>$user_id,"name"=>$note_name,"desc"=>$desc];
        $this->init()->setUrl("http://pdfstep.zzz.com.ua?action=todo&method=add")->
            setMethod("POST")->setParams($data)->exec();
    }
    public function delNote(int $id){
        $this->init()->setUrl("http://pdfstep.zzz.com.ua?action=todo&method=delete")->
            setMethod("POST")->setParams(["id"=>$id])->exec();
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