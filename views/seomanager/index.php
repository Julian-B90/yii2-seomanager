<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel julianb90\seomanager\models\search\SeomanagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Übersicht';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Seo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'route',
            'title',
            'description',
            'canonical',
            'created:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => $this->context->module->cache ? '{view} {update} {clearCache} {delete}' : '{view} {update} {delete}',
                'buttons' => [
                    'clearCache' => function($url, $model, $key) {
                        return Html::a('', ['seomanager/clear-cache', 'id' => $model->id], [
                            'class' => 'glyphicon glyphicon-flash',
                            'title' => 'clear cache'
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
