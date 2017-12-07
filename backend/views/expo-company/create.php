<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ExpoCompany */

$this->title = 'Create Expo Company';
$this->params['breadcrumbs'][] = ['label' => 'Expo Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
