<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpoStand */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expo Stands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-stand-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'date_time',
            'event_id',
            'code',
            'stand_status',
            'price',
            'sq_meter',
            'description',
            'logo_pos',
            'email_sent:email',
        ],
    ]) ?>

</div>
