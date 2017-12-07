<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExpoCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expo Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expo Company', ['create'], ['class' => 'btn btn-success']) ?>
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
            'company_rep_name',
            // 'address',
            // 'city',
            // 'state',
            // 'country',
            // 'zip_postal',
            // 'mobile_phone',
            // 'office_phone',
            // 'fax',
            // 'primary_email:email',
            // 'secondary_email:email',
            // 'mkt_doc_dir',
            // 'created_datetime',
            // 'remember_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
