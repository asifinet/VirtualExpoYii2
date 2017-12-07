<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpoProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expo Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expo Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'company_name',
            'company_sname',
            'primary_email:email',
            // 'secondary_email:email',
            // 'dir_name',
            // 'logo',
            // 'created_date_time',
            // 'remember_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
