<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Установить изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Задать категорию', ['set-category', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Задать тэги', ['set-tags', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            //'content:ntext',
            'date',
            'image',
            'viewed',
            'comments',
            'author_id',
            [
                'label' => 'Статус',
                'value' => function($data){
                    return ($data->status === 1)? 'Активна' : 'Неактивна';
                }
            ],
            'category_id',
            [
                'label' => 'Главная новость',
                'value' => function($data){
                    return ($data->is_top === 0)? 'Нет' : 'Да';
                }
            ],
        ],
    ]) ?>

</div>
