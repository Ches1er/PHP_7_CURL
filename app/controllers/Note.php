<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 11:07
 */

namespace app\controllers;

use core\base\Controller;
use app\services\NotesService;

class Note extends Controller
{
    private $noteservice;

    /**
     * User constructor.
     * @param $userservice
     */
    public function __construct()
    {
        $this->noteservice = new NotesService();
    }

    public function actionNoteadd(){
        $this->noteservice->addNote($_POST["user_id"],$_POST["name"],$_POST["desc"]);
        return "redirect:/usernotes/".$_POST["user_id"];
    }
    public function actionNotedel(){
        $this->noteservice->delNote($this->getParam("id"));
        return "redirect:/usernotes/".$this->getParam("userid");
    }

}