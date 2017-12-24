<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 14:11
 */

namespace app\controllers;



class MyController extends AppController{
    public  function actionIndex($id = null){
        $hi = 'hello, World';
        $names = ['ivanov','petrov','sidorov'];
        //return $this->render('index' , ['hello'=> $hi, 'names'=> $name]);
        return $this->render('index' ,compact('hi','names','id'));
    }
}