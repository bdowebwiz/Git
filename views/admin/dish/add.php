<?

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1>
            Ингредиенты
        </h1>
    </div>
</div>

<div style="height: 100px;"></div>

<? if(Yii::$app->session->hasFlash('success')):?>
    <?=Yii::$app->session->getFlash('success');?>
<? endif;?>

<? if(Yii::$app->session->hasFlash('error')):?>
    <?=Yii::$app->session->getFlash('error');?>
<? endif;?>

<div class="row">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked" ">
            <li ><a href="index.php?r=admin">Главная</a></li>
            <li ><a href="index.php?r=admin/ingred/index">Ингридиенты</a></li>
            <li class="active"><a href="index.php?r=admin/dish/index">Блюда</a></li>
            <li><a href="index.php?r=search">Поиск Блюд</a></li>
        </ul>
    </div>

    <div class="col-md-9 col-md-offset-1">


        <ul class="nav nav-tabs">
            <li ><a href="index.php?r=admin/dish/index">Главная</a></li>
            <li class="active"><a href="index.php?r=admin/dish/add">Добавление</a></li>
        </ul>


        <div class="row">
            <div class="col-md-12">
                <div style="height: 50px;"></div>
                <? $form = ActiveForm::begin(['id'=> 'testForm']);?>
                    <?= $form->field($model, 'name')?>
                    <?
                    $items = ArrayHelper::map($arArrayBdIngred,'id','name');
                    $params = [
                        'maxlength' => 500,
                        'multiple' => 'true',
                        'size'=>20,
                    ];
                    ?>
                    <?= $form->field($model, 'ingred')->listBox($items, $params) ?>
                
                    <?= Html::submitButton('Добавить',['class' => 'btn btn-success js_button'] )?>
                <? ActiveForm::end(); ?>
            </div>
        </div>



    </div>
</div>


<?
$js=<<<JS
    /*$('.js_button').on('click', function(){
        $.ajax({
            url: 'index.php?r=admin/ingred/add',
            type: 'POST',
            data: {text: '123'},
            success: function(res){
                console.log(res);
            },
            erros: function(){
                alert('Error');
            }
        });
    });*/
JS;

$this->registerJs($js);
?>

