<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 14:27
 */

namespace app\controllers\admin;
use app\controllers\AppController;

class UserController extends AppController{
    public function actionIndex(){
       return $this->render('index');
    }
}