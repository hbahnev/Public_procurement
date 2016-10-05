<?php

namespace backend\controllers;

use Yii;
use backend\models\Applications;
use backend\models\ApplicationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApplicationsController implements the CRUD actions for Applications model.
 */
class ApplicationsController extends Controller
{
	
	private function CheckAccess(){
		$connection = new \yii\db\Connection([
			'dsn' => 'mysql:host=localhost;dbname=framework_yii2',
			'username' => 'root',
			'password' => '',
		]);

		$user = $connection->createCommand('SELECT * FROM user WHERE id ='.Yii::$app->user->id)->queryOne();
		if($user['isAdmin'] != 1){
			die('NO ACCESS');
		}
		
	}
	
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
     * Lists all Applications models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->CheckAccess();
		
        $searchModel = new ApplicationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Applications model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$this->CheckAccess();
		
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Applications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->CheckAccess();
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionApprove($id){
		$this->CheckAccess();

		$contractId = $_GET['cId'];
		$application = Applications::findOne($id);
		$application->isActive = 'Yes';
		$application->price = 555;
		$application->save();
		
		
		
		$makeAppActive = "UPDATE applications SET isActive = 'Yes' WHERE id=$id";
		Yii::$app->db->createCommand($makeAppActive)->execute(); 
		$deleteApplications = "DELETE FROM applications WHERE contract_number  = $contractId AND isActive = 'No';";
        Yii::$app->db->createCommand($deleteApplications)->execute();
		$makeContractInProcess = "UPDATE contractt SET status='In Process' WHERE id=$contractId";
		Yii::$app->db->createCommand($makeContractInProcess)->execute();
		
		Yii::$app->session->setFlash('success', 'Вие одобрихте тази оферта успешно!');
		
		return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
		
	}

    /**
     * Deletes an existing Applications model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$this->CheckAccess();
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Applications model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Applications the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Applications::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
