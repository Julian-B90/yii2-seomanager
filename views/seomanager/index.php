<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\orbitstation\models\search\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Seo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'route',
            'title',
            'description',
            'canonical',
            // 'data',
            // 'updated',
            // 'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
