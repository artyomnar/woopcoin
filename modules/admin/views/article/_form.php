<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_top')->checkbox() ?>

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <?/*= $form->field($model, 'image')->textInput(['maxlength' => true]) */?><!--

    <?/*= $form->field($model, 'viewed')->textInput() */?>

    <?/*= $form->field($model, 'comments')->textInput() */?>

    <?/*= $form->field($model, 'author_id')->textInput() */?>

    <?/*= $form->field($model, 'status')->textInput() */?>

    --><?/*= $form->field($model, 'category_id')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
