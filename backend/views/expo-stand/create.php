<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ExpoStand */

$this->title = 'Create Expo Stand';
$this->params['breadcrumbs'][] = ['label' => 'Expo Stands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expo-stand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
