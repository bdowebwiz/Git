<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 14:27
 */

namespace app\controllers\admin;
use app\controllers\AppController;
use app\models\AddIngredForm;
use app\models\Ingred;
use Yii;

class IngredController extends AppController{


    public function actionIndex($del = null){
        if(!empty($del)){
            if(Ingred::findOne($del)->delete()){
                Yii::$app->session->setFlash('success', 'Ингридиент Удален');
                return Yii::$app->response->redirect('index.php?r=admin/ingred/index');
            }else{
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }
        }
        $arArrayBd = Ingred::find()->asArray()->all();
        return $this->render('index', compact('arArrayBd'));
    }



    public function actionAdd(){

        $model = new AddIngredForm();

        if( $model->load(Yii::$app->request->post()) ){

            if( $model->save() ){
                Yii::$app->session->setFlash('success', 'Ингридиент Добавлен');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }
        }

        return $this->render('add', compact('model'));
    }



    public function actionEdit($edit=null){

        $model = new AddIngredForm();
        $arItemBd = Ingred::findOne($edit);

        if( $model->load(Yii::$app->request->post()) ){
            $arItemBd->name= Yii::$app->request->post()['AddIngredForm']['name'];
            $arItemBd->hidden= Yii::$app->request->post()['AddIngredForm']['hidden'];
            if( $arItemBd->save() ){
                Yii::$app->session->setFlash('success', 'Ингридиент Обнавлен');
                return Yii::$app->response->redirect('index.php?r=admin/ingred/index');
            }else{
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }
        }else{
            $model->name = $arItemBd->name;
            $model->hidden = $arItemBd->hidden;
        }
        return $this->render('edit', compact('arItemBd','model'));
    }

}