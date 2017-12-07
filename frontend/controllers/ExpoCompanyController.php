<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ExpoCompany;
use frontend\models\ExpoEvent;
use frontend\models\ExpoCompanyStand;
use frontend\models\ExpoMktDoc;
use frontend\models\ExpoCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * ExpoCompanyController implements the CRUD actions for ExpoCompany model.
 */
class ExpoCompanyController extends Controller
{

    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ExpoCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpoCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExpoCompany model.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionView($id, $username)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $username),
        ]);
    }
 
    /**
     * Creates a new ExpoCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExpoCompany();
        $expoStand = new ExpoCompanyStand();
        $expoEvent = new ExpoEvent();
        $ExpoMktDocModel = new ExpoMktDoc();

        $standID = $_GET["standID"];
        $eventId = $_GET["eventId"];
        if ($model->load(Yii::$app->request->post())&& $ExpoMktDocModel->load(Yii::$app->request->post())) {

            $imageName = $model->company_name;
            // if(!empty($model->mkt_doc_dir)||!empty($ExpoMktDocModel->doc_name))
           //  {
             if (Yii::$app->request->isPost) {
                 $file1 = UploadedFile::getInstance($model, 'file');
                  if ($model->upload($imageName,$file1)) {
                     // file is uploaded successfully
                  //   return;
                 }
                 
                   // $model->actionUpload();

                    if (Yii::$app->request->isPost) {
                        $ExpoMktDocModel->doc_name = UploadedFile::getInstances($ExpoMktDocModel, 'doc_name');
                        $counter=1;
                      //  $transaction = $this->getDb()->beginTransaction();
                        foreach ($ExpoMktDocModel->doc_name as $file) {
                          $ExpoMktDocModel = new ExpoMktDoc();
                            $ExpoMktDocModel ->doc_name = $file->baseName;
                            $ExpoMktDocModel ->doc_path = '/advanced/assets/uploads/';
                            $ExpoMktDocModel ->doc_ext  = $file->extension;
                            $ExpoMktDocModel ->comp_id  = $counter;
                            $ExpoMktDocModel ->event_id  = $eventId;
                            $ExpoMktDocModel ->stand_id  = $standID;
                            $counter++;

                            $ExpoMktDocModel->save(false);
                             $file->saveAs('assets/uploads/' . $file->baseName . '.' . $file->extension);
                         }
                    }
                }
          //  $expoStand = ExpoCompanyStand::findOne(['id'=> $standID,'event_id'=> $eventId]);
           // $expoStand->stand_owner_id = $model->id;
            $model->stand_id = $standID;
            $model->event_id = $eventId;
            $model->username =Yii::$app->user->identity->username;
            //$expoStand->update();
                //save the path in mkt_doc_dir
               // $model->mkt_doc_dir ='../web/assets/uploads/';
                $model->file='/assets/uploads/'. $file1->baseName.'-'.$imageName . '.' . $file1->extension;    
                $model->mkt_doc_dir = '/assets/uploads/'. $imageName . '.' . $file1->extension; 
                
                //send Email to current User for reserving the Stand space for the event
                    
                $time = time();
                 
                    $value = yii::$app->mailer->compose()
                    ->setFrom(['asif_inet@hotmail.com' => 'Asif'])
                    ->setTo($model->primary_email)
                    ->setSubject('Event Both Reservation Successfull')
                    ->setHtmlBody('<h1>Congratulation!</h1> 
                    <p>Thank you for reserving the event stand both space with us. 
                    Detail of the event and stand booth you resereved on '.$time . ' as follows</p>'
                    /*'<ul>
                    <li>Event Name<span>'.$expoEvent.name.'</span></li>
                    <li>Event Location <span>'.$expoEvent.name.'</span></li>
                    <li>Event Date Start <span>'.$expoEvent.start_date.' - '.$expoEvent.start_time.'</span></li>
                    <li>Event Date End <span>'.$expoEvent.end_date.' - '.$expoEvent.end_time.'</span></li>
                    <li>Stand Both Code</li>
                    <li>Date and Time of Registration</li>
                    </ul>'*/
                    )
                  //  ->attach($model ->attachment)
                    ->send();
                    $expoStand->email_sent=1;
              

                    

                $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username,'stand_id'=>$model->stand_id,'event_id'=>$model->event_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ExpoMktDocModel' => $ExpoMktDocModel,
         
            ]);
        }
    }

    /**
     * Updates an existing ExpoCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionUpdate($id, $username)
    {
        $model = $this->findModel($id, $username);
        $ExpoMktDocModel = new ExpoMktDoc();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ExpoMktDocModel' => $ExpoMktDocModel,
            ]);
        }
    }

    /**
     * Deletes an existing ExpoCompany model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     */
    public function actionDelete($id, $username)
    {
        $this->findModel($id, $username)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ExpoCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $username
     * @return ExpoCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $username)
    {
        if (($model = ExpoCompany::findOne(['id' => $id, 'username' => $username])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
