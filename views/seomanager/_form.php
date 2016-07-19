<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use julianb90\seomanager\assets\CKEditorAsset;

/* @var $this yii\web\View */
/* @var $model julianb90\seomanager\models\Seomanager */
/* @var $form yii\widgets\ActiveForm */

CKEditorAsset::register($this);
$this->registerJs('CKEDITOR.replace( "seomanager-content" );');
?>

<div class="seo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true, 'placeholder' => 'Comma separated']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'canonical')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php if (!$model->isNewRecord && $this->context->module->cache): ?>

            <?= Html::a('<span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Clear Cache', ['seomanager/clear-cache', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'title' => 'clear cache',
                'arial-label' => 'Left Align'
            ]); ?>

        <?php endif ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
