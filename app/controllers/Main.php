<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 9:19
 */
namespace app\controllers;
use core\base\Controller;
use core\base\TemplateView;
use app\services\UserService;
use app\services\NotesService;

class Main extends Controller
{
    private $userservice;
    private $notesservice;

    public function __construct()
    {
        $this->userservice = new UserService();
        $this->notesservice = new NotesService();
    }

    public function actionIndex(){
        $view = new TemplateView("main","templates/def");
        $view->users = $this->userservice->showUsers();
        $view->notes = $this->notesservice->showNotes($this->getParam("userid"));
        $view->fullnote = $this->notesservice->showNote($this->getParam("userid"),
            $this->getParam("id"));
        $view->user_id = $this->getParam("userid");
        return $view;
    }

}