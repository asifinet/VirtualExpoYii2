<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpoLookup */

$this->title = 'Update Expo Lookup: ' . $model->sno;
$this->params['breadcrumbs'][] = ['label' => 'Expo Lookups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sno, 'url' => ['view', 'id' => $model->sno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expo-lookup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
