<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 19.03.2019
 * Time: 11:05
 */

namespace app\controllers;


use core\base\Controller;
use app\services\UserService;

class User extends Controller
{
    private $userservice;

    /**
     * User constructor.
     * @param $userservice
     */
    public function __construct()
    {
        $this->userservice = new UserService();
    }

    public function actionUseradd(){
        $this->userservice->addUser($_POST["name"]);
        return "redirect:/";
    }
    public function actionUserdel(){
        $this->userservice->delUser($this->getParam("id"));
        return "redirect:/";
    }
}