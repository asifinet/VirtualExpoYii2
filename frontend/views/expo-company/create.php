<?php

use yii\helpers\Html;
use frontend\models\ExpoMktDoc;

/* @var $this yii\web\View */
/* @var $model frontend\models\ExpoCompany */

$this->title = 'Reserve your event stand';

?>
<div class="expo-company-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'ExpoMktDocModel' => $ExpoMktDocModel,
    ]) ?>

</div>
