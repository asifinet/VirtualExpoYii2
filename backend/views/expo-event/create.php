<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ExpoEvent */

$this->title = 'Create Expo Event';
$this->params['breadcrumbs'][] = ['label' => 'Expo Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
