<?

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1>
            Поиск блюд по ингредиентам
        </h1>
    </div>
</div>

<div style="height: 100px;"></div>

<div class="row">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked" ">
        <li ><a href="index.php?r=admin">Главная</a></li>
        <li ><a href="index.php?r=admin/ingred/index">Ингридиенты</a></li>
        <li><a href="index.php?r=admin/dish/index">Блюда</a></li>
        <li class="active"><a href="index.php?r=search">Поиск Блюд</a></li>
        </ul>
    </div>

    <div class="col-md-9 col-md-offset-1">

        <div class="row">
            <div class="col-md-12">
                <div style="height: 50px;"></div>
                <? $form = ActiveForm::begin(['id'=> 'testForm']);?>
                <?
                $items = ArrayHelper::map($arArrayBdIngred,'id','name');
                $params = [
                    'maxlength' => 500,
                    'multiple' => 'true',
                    'size'=>10,
                    'options' => $arParams,
                ];
                ?>
                <?= $form->field($model, 'ingred')->listBox($items, $params) ?>
                <?= Html::submitButton('Поиск',['class' => 'btn btn-success js_button'] )?>
                <? ActiveForm::end(); ?>
            </div>

            <? if ($arResult != null) {?>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Имя</th>
                        <th>Ингредиенты</th>
                    </tr>
                    </thead>
                    <tbody>

                    <? foreach ($arResult as $key => $arItem) {?>
                        <tr>
                            <td><?=$arItem['id']?></td>
                            <td><?=$arItem['name']?></td>
                            <? foreach ($arItem['nameIngred'] as $arIngredName) {?>
                                <td><?=$arIngredName?></td>
                            <?}?>
                        </tr>
                    <?}?>
                    </tbody>
                </table>
            <? }?>
        </div>



    </div>
</div>
