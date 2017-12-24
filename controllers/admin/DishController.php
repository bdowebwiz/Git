<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 14:56
 */

namespace app\controllers\admin;
use app\controllers\AppController;
use app\models\AddDishForm;
use app\models\Ingred;
use app\models\Dish;
use Yii;

class DishController extends AppController{



    public function actionIndex($del = null){

        if(!empty($del)){
            if(Dish::findOne($del)->delete()){
                Yii::$app->session->setFlash('success', 'Ингридиент Удален');
                return Yii::$app->response->redirect('index.php?r=admin/dish/index');
            }else{
                Yii::$app->session->setFlash('error', 'Произошла ошибка');
            }
        }

        $arResult = Dish::find()->asArray()->all();
        $arArrayBdIngred = Ingred::find()->asArray()->all();

        foreach ($arResult as $keyt => $arItem ) {
            foreach (unserialize($arItem['arrayidingred']) as $key => $arIngred ) {
                foreach ($arArrayBdIngred as $arArrayBdIngredItem) {
                    if ($arIngred == $arArrayBdIngredItem['id']) {

                        $arResult[$keyt]['nameIngred'][]= $arArrayBdIngredItem['name'];
                    }
                }
            }
        }

        return $this->render('index', compact('arResult'));
    }



    public function actionAdd(){

        $model = new AddDishForm();
        $arArrayBdIngred = Ingred::find()->asArray()->all();
        
        if( $model->load(Yii::$app->request->post()) ){

            $model->name = Yii::$app->request->post()['AddDishForm']['name'];
            $arArrayIngred =  Yii::$app->request->post()['AddDishForm']['ingred'];
            $arResultItem ="";
            foreach ($arArrayIngred as $key => $arItemIngred ) {
                if($key ==0){
                    $arResultItem = $arItemIngred;
                }else{
                    $arResultItem = $arResultItem."-".$arItemIngred;
                }
            }

            $model->allidingred = $arResultItem;
            $model->arrayidingred = serialize($arArrayIngred);

            if(count($arArrayIngred) <= 5){
                if( $model->save() ){
                    Yii::$app->session->setFlash('success', 'Блюдо добавлено');
                    return $this->refresh();
                }else{
                    Yii::$app->session->setFlash('error', 'Произошла ошибка');
                }
            }else{
                Yii::$app->session->setFlash('error', 'Ингридиентов больше 5!!!');
            }


        }

        return $this->render('add', compact('model','arArrayBdIngred'));
    }



    public function actionEdit($edit=null){
        $arArrayBdIngred = Ingred::find()->asArray()->all();

        $model = new AddDishForm();
        $arItemBd = Dish::findOne($edit);
        foreach (unserialize($arItemBd->arrayidingred) as $key => $arItemIngred) {
            $arParams[$arItemIngred]['Selected']=true;
        }
        if( $model->load(Yii::$app->request->post()) ){

            $arItemBd->name = Yii::$app->request->post()['AddDishForm']['name'];
            $arArrayIngred =  Yii::$app->request->post()['AddDishForm']['ingred'];
            $arResultItem ="";
            foreach ($arArrayIngred as $key => $arItemIngred ) {
                if($key ==0){
                    $arResultItem = $arItemIngred;
                }else{
                    $arResultItem = $arResultItem."-".$arItemIngred;
                }
            }

            $arItemBd->allidingred = $arResultItem;
            $arItemBd->arrayidingred = serialize($arArrayIngred);
            if(count($arArrayIngred) <= 5){
                if( $arItemBd->save() ){
                    Yii::$app->session->setFlash('success', 'Ингридиент Обнавлен');
                    return Yii::$app->response->redirect('index.php?r=admin/dish/index');
                }else{
                    Yii::$app->session->setFlash('error', 'Произошла ошибка');
                }
            }else{
                Yii::$app->session->setFlash('error', 'Ингридиентов больше 5!!!');
            }
        }else{
            $model->name = $arItemBd->name;
        }
        return $this->render('edit', compact('arItemBd','model','arArrayBdIngred','arParams'));
    }

}