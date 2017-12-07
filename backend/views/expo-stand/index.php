<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpoSearchStand */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expo Stands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-stand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expo Stand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_time',
            'event_id',
            'code',
            'stand_status',
            // 'price',
            // 'sq_meter',
            // 'image_ext',
            // 'description',
            // 'logo_pos',
            // 'email_sent:email',
            // 'stand_owner_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
