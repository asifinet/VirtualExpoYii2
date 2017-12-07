<?php

namespace backend\controllers;

use Yii;
use backend\models\ExpoStand;
use backend\models\ExpoLookup;
use backend\models\ExpoSearchStand;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpoStandController implements the CRUD actions for ExpoStand model.
 */
class ExpoStandController extends Controller
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
     * Lists all ExpoStand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpoSearchStand();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExpoStand model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ExpoStand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExpoStand();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            print_r($model->getErrors());
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ExpoStand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionLists($id){
                //count
                $countStand =ExpoStand::find()->where(['event_id'=> $id])->count();
                $EventStand =ExpoStand::find()->where(['event_id'=> $id])->orderBy('id DESC')->all();
            
                $expolookup = ExpoLookup::findBySql('
                select NULL value,"Select Code" description from dual
                UNION ALL 
                select value,description from expo_lookup where colum_name = "event_code" and status="1"
                 ')->all();



                if ($countStand > 0){
                foreach($EventStand as $result) {
                    echo "<option value ='".
                $result ->code."'>".$result->code."</option>";
                break;
                }
            }else{
                foreach($expolookup as $result) {
                echo "<option value ='".
                $result ->value."'>".$result->description."</option>";
                  }
                }
                }
            
    /**
     * Deletes an existing ExpoStand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the ExpoStand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExpoStand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExpoStand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
