<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы криптовалют';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Созать курс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'currency',
            'old_value',
            'new_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
