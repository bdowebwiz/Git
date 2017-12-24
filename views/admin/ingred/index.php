
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
            <li class="active"><a href="index.php?r=admin/ingred/index">Ингридиенты</a></li>
            <li><a href="index.php?r=admin/dish/index">Блюда</a></li>
            <li><a href="index.php?r=search">Поиск Блюд</a></li>
        </ul>
    </div>

    <div class="col-md-9 col-md-offset-1">


        <ul class="nav nav-tabs">
            <li class="active"><a href="index.php?r=admin/ingred/index">Главная</a></li>
            <li><a href="index.php?r=admin/ingred/add">Добавление</a></li>
        </ul>
        
        
        <div class="row">
            <div class="col-md-12">

                 <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Имя</th>
                        <th>Скрыт</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>

                    </tr>
                    </thead>
                    <tbody>

                    <? foreach ($arArrayBd as $key => $arItem) {?>
                        <tr>
                            <td><?=$arItem['id']?></td>
                            <td><?=$arItem['name']?></td>
                            <td><?
                                if ($arItem['hidden'] == 1) {
                                    echo 'Скрыт';
                                }else{
                                    echo '';
                                }
                                ?></td>
                            <td><a href="index.php?r=admin/ingred/edit&edit=<?=$arItem['id']?>" class=""><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td><a href="index.php?r=admin/ingred/index&del=<?=$arItem['id']?>" class=""><span class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>
                    <?}?>
                    </tbody>
                </table>


            </div>
        </div>



    </div>
</div>
