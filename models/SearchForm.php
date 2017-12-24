<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.12.2017
 * Time: 12:30
 */

namespace app\models;
use yii\db\ActiveRecord;


class SearchForm extends ActiveRecord {
    public $ingred;

    public static function tableName(){
        return 'dish';
    }

    public function attributeLabels(){
        return [
            'ingred'=> 'Список ингредиентов',
        ];
    }



    public function rules(){
        return [
            
        ];
    }
}