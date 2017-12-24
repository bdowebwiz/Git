<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 14:35
 */

namespace app\controllers;
use yii\web\Controller;



class AppController extends Controller{

    public function debug($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

}
