<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 15:38
 */

namespace app\models;
use yii\db\ActiveRecord;

class AddDishForm extends ActiveRecord {

    public $ingred;

    public static function tableName(){
        return 'dish';
    }

    public function attributeLabels(){
        return [
            'name'=> 'Название блюда',
            'ingred'=> 'Список ингредиентов',
        ];
    }



    public function rules(){
        return [
            ['name', 'required'],
            ['name','string','min'=>2]
        ];
    }

}