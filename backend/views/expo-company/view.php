<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpoCompany */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expo Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'username' => $model->username], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'username' => $model->username], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'company_name',
            'company_sname',
            'company_rep_name',
            'address',
            'city',
            'state',
            'country',
            'zip_postal',
            'mobile_phone',
            'office_phone',
            'fax',
            'primary_email:email',
            'secondary_email:email',
            'company_logo',
            'mkt_doc_dir',
            'created_datetime',
            'remember_token',
        ],
    ]) ?>

</div>
