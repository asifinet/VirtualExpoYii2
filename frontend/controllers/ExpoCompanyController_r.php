<?php

namespace frontend\Controllers;

use Yii;
use frontend\models\ExpoCompany;
use frontend\models\ExpoCompanyStand;
use frontend\models\ExpoCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\UploadForm;

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
