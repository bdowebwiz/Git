<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 15:23
 */

namespace app\controllers;
use app\controllers\AppController;
use app\models\Ingred;
use app\models\Dish;
use app\models\SearchForm;
use Yii;


class SearchController extends AppController {
    public function actionIndex(){

        $model = new SearchForm();
        $arArrayBdIngred = Ingred::find()->asArray()->all();
        $arArrayBdDish = Dish::find()->asArray()->all();


        if( $model->load(Yii::$app->request->post()) ){
            $arArrayIngred =  Yii::$app->request->post()['SearchForm']['ingred'];

            foreach ($arArrayIngred as $key => $arItemIngred) {
                $arParams[$arItemIngred]['Selected'] = true;
            }

            if(count($arArrayIngred) <= 5 && count($arArrayIngred) >= 2){

                $arResult = null;
                if (count($arArrayIngred) == 5 ) {
                    $arResultItem ="";

                    foreach ($arArrayIngred as $key => $arItemIngred ) {

                        if($key ==0){
                            $arResultItem = $arItemIngred;
                        }else{
                            $arResultItem = $arResultItem."-".$arItemIngred;
                        }
                    }

                    $arResult = Dish::find()->asArray()->where(['allidingred'=>$arResultItem])->all();

                }else{

                    foreach ($arArrayBdDish as $keyDish => $arItemDish ) {
                        $arArrayBdDish[$keyDish]['match'] =0;
                        foreach ($arArrayIngred as $keySec => $arSelectItem ) {
                            if (in_array($arSelectItem, unserialize($arItemDish['arrayidingred'])) ){
                                $arArrayBdDish[$keyDish]['match'] ++;
                            }
                        }
                    }

                    usort($arArrayBdDish, function($b,$a){ return $a['match'] <=> $b['match']; });

                    foreach ($arArrayBdDish as $arSelect ) {
                        if ($arSelect['match'] >= 2) {
                            $arResult[]=$arSelect;
                        }
                    }

                }
                if (!$arResult) {
                    Yii::$app->session->setFlash('error', 'Ничего не найдено.');
                }else{

                    foreach ($arResult as $keyt => $arItemSearch ) {
                        foreach (unserialize($arItemSearch['arrayidingred']) as $key => $arIngredSearch ) {
                            foreach ($arArrayBdIngred as $arArrayBdIngredItem) {
                                if ($arIngredSearch == $arArrayBdIngredItem['id']) {
                                    $arResult[$keyt]['nameIngred'][]=$arArrayBdIngredItem['name'];
                                }
                            }
                        }
                    } 
                }

            }elseif(count($arArrayIngred) < 2){
                $arResult = null;
                Yii::$app->session->setFlash('error', 'Выберите больше ингредиентов');
            }else{
                $arResult = null;
                Yii::$app->session->setFlash('error', 'Для поиска выбрано больше 5 ингридиентов.');
            }

        }else{
            $arResult = null;
            $arParams=null;
        }

        return $this->render('index',compact('model','arArrayBdIngred','arArrayBdDish','arParams','arResult'));
    }
}