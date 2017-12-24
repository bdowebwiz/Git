<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.2017
 * Time: 15:38
 */

namespace app\models;
use yii\db\ActiveRecord;

class AddIngredForm extends ActiveRecord {

    public $ingred;
   // public $hidden;

    public static function tableName(){
        return 'ingred';
    }

    public function attributeLabels(){
        return [
            'name'=> 'Название ингридиента',
            'hidden'=> 'Скрыть ингридиент',
        ];
    }

    public function rules(){
        return [
            ['name', 'required'],
            ['name','string','min'=>2],
            [['hidden',], 'boolean'],
        ];
    }

}