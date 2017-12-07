    <?php
    
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\helpers\Url;
    
    /* @var $this yii\web\View */
    /* @var $model frontend\models\ExpoCompany */
    
    
    ?>
    <head>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    
    </head>
 
    <div class="expo-company-view">
    
        <h1><?= Html::encode($this->title) ;
           $stand_ID = $_GET["stand_id"];
           $event_Id = $_GET["event_id"];
           $username = $_GET["username"];
           $url = Url::to(['site/stand', 'eventID' => $event_Id,'username'=> $username]);
          
           $url =rawurldecode($url);
   // echo $url;
           ?></h1>
    
        <p>   <h1><?= Html::a('Reservation Successful',null,['id'=>'confirm']) ?></h1>
            <?= Html::a('Back to Expo',$url, ['id'=>'back','class' => 'btn btn-primary']) ?>
           
        </p>
    
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'company_name',
                'company_rep_name',
                'address',
                'office_phone',
                'primary_email:email',
                'secondary_email:email',
                'created_datetime',
            ],
        ]) ?>
    
    </div>
    