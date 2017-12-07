<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpoSearchEvent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expo Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expo Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_timestamp',
            'code',
            'image_type',
            'name',
            // 'location',
            // 'latitude',
            // 'longitude',
            // 'start_date',
            // 'start_time',
            // 'end_date',
            // 'end_time',
            // 'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
