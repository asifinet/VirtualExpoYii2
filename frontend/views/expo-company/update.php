<?php

use yii\helpers\Html;
use frontend\models\ExpoMktDoc;
/* @var $this yii\web\View */
/* @var $model frontend\models\ExpoCompany */

$this->title = 'Update Expo Company: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expo Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'username' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expo-company-update">

    <h1><?= Html::encode($this->title);  $ExpoMktDocModel = new ExpoMktDoc(); ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ExpoMktDocModel' => $ExpoMktDocModel,
    ]) ?>

</div>
