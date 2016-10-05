<?php

namespace frontend\controllers;

use Yii;
use backend\models\Applications;
use backend\models\Contract;
use backend\models\ApplicationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApplicationsController implements the CRUD actions for Applications model.
 */
class ApplicationsController extends Controller
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
     * Lists all Applications models.
     * @return mixed
     */
    public function actionIndex()
    {
		
		if(Yii::$app->user->isGuest)
		{
			return $this->redirect('index.php?r=site%2Flogin');	
		}
		
        $searchModel = new ApplicationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('index',
		[
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Applications model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$contracts = Contract::find()->all();
        $model = new Applications();

        if (Yii::$app->request->post()) 
		{
			$postData= Yii::$app->request->post();
			$userId = Yii::$app->user->id;
			
			$frontDir = '../web/uploads';
			$backendDir = '../../backend/web/uploads';
			$tmp_name = $_FILES["file"]["tmp_name"];
				// basename() may prevent filesystem traversal attacks;
				// further validation/sanitation of the filename may be appropriate
				$name = basename($_FILES["file"]["name"]);
				move_uploaded_file($tmp_name, "$backendDir/$name");
				copy("$backendDir/$name", "$frontDir/$name");
				$dbPath ="uploads/$name";
			
			$contract_number =  $postData['Applications']['contract_number'];
			$price = $postData['Applications']['price'];
			$name = $postData['Applications']['name'];
			$deadline = $postData['Applications']['deadline'];
			$guarantee = $postData['Applications']['guarantee'];
			$bulstat = $postData['Applications']['bulstat'];
			$address = $postData['Applications']['address'];
			$phone = $postData['Applications']['phone'];
			$Additional =$postData['Applications']['Additional'];
			$owner_id = $userId;
			$connection = new \yii\db\Connection([
					'dsn' => 'mysql:host=localhost;dbname=framework_yii2',
					'username' => 'root',
					'password' => '',
					'charset' =>'utf8'
				]);
				$query = "INSERT INTO applications VALUES(NULL,'$contract_number',$price,STR_TO_DATE('$deadline','%Y-%m-%d'),'$guarantee','$name','$bulstat','$address','$phone','$Additional','$owner_id','No','$dbPath')";
				$command = $connection->createCommand($query);
				$command->execute();
			return $this->redirect(array('applications/index'));
        } else {
			
            return $this->render('create', [
                'model' => $model,
				'contracts' => $contracts
            ]);
        }
    }

    /**
     * Updates an existing Applications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$contracts = Contract::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'contracts' => $contracts
            ]);
        }
    }

    /**
     * Deletes an existing Applications model.
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
