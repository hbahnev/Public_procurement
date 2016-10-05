<?php

namespace backend\controllers;

use Yii;
use backend\models\Contract;
use backend\models\ContractSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

/**
 * ContractController implements the CRUD actions for Contract model.
 */
class ContractController extends Controller
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
     * Lists all Contract models.
     * @return mixed
     */
    public function actionIndex()
    {
		if(Yii::$app->user->can('create-contracts')){
        $searchModel = new ContractSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			//var_dump(Yii::$app->request->queryParams);
		//die();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		}
		
		 return $this->goHome();
    }

    /**
     * Displays a single Contract model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		
		if(!Yii::$app->user->can('create-contracts'))
		{
			return $this->goHome();
		}
		
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(Yii::$app->user->can('create-contracts'))
		{
			$model = new Contract();

			if (Yii::$app->request->post()) {
				
				$frontDir = '../../frontend/web/uploads';
				$backendDir = '../web/uploads';
				$tmp_name = $_FILES["file"]["tmp_name"];
				// basename() may prevent filesystem traversal attacks;
				// further validation/sanitation of the filename may be appropriate
				$name = basename($_FILES["file"]["name"]);
				move_uploaded_file($tmp_name, "$backendDir/$name");
				copy("$backendDir/$name", "$frontDir/$name");
				$dbPath ="uploads/$name";
				$postData = Yii::$app->request->post();
				$title = $postData['Contract']['title'];
				$price = $postData['Contract']['price'];
				$deadline_complete = $postData['Contract']['deadline_complete'];
				$deadline_application = $postData['Contract']['deadline_application'];
				$object = $postData['Contract']['object'];
				$contract_more=$postData['Contract']['contract_more'];
				$guarantee = $postData['Contract']['guarantee'];
				$status = $postData['Contract']['status'];
				$annex = $postData['Contract']['annex'];
				$checkout = $postData['Contract']['checkout'];
				
				$connection = new \yii\db\Connection([
					'dsn' => 'mysql:host=localhost;dbname=framework_yii2',
					'username' => 'root',
					'password' => '',
					'charset' => 'utf8',
				]);
				$query = "INSERT INTO contractt VALUES(NULL,'$title',$price,STR_TO_DATE('$deadline_complete','%Y-%m-%d'),STR_TO_DATE('$deadline_application','%Y-%m-%d'),'$object','$contract_more',$guarantee,'$status','$annex','$checkout','$dbPath')";
				$command = $connection->createCommand($query);
				$command->execute();
				
				return $this->redirect(array('contract/index'));
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}
		else{
			throw new ForbiddenHttpException;
		}
    }

    /**
     * Updates an existing Contract model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if(!Yii::$app->user->can('create-contracts'))
		{
			return $this->goHome();
		}
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contract model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if(!Yii::$app->user->can('create-contracts'))
		{
			return $this->goHome();
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contract model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contract the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contract::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
