<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 15:00
 */

namespace app\controllers;


class AdminController extends AppController{
    public function actionIndex(){
        return $this->render('index');
    }
}