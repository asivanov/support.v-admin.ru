<?php

class ZayavkiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create', 'update'),
				'roles'=>array('1'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','admin','delete', 'view', 'index', 'update'),
				'roles'=>array('2'),
            ),   
            array('allow', // allow manager user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'view', 'index', 'update'),
				'roles'=>array('3'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
			$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Zayavki;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
        Yii::app()->user->setFlash('info', '<strong>Добро пожаловать '.Yii::app()->user->name.'!</strong> Внимательно заполняйте все поля, это может ускорить рекацию менеджера на Вашу заявку.');
		if(isset($_POST['Zayavki']))
		{
			$model->attributes=$_POST['Zayavki'];
			if($model->save())
    		$user = CUsers::model()->find('LOWER(Username)=?', array(strtolower(Yii::app()->user->name)));
            $message = '<body><h1>Создана новая заявка</h1><p><a href="http://support.v-admin.ru/index.php/zayavki/'.$model->id.'">Просмотреть</a></p> <p><b>Номер заявки:</b> '.$model->id.'</p><p><b>Компания заказчик:</b> '.$model->company.'</p><p><b>Наименование:</b>  '.$model->Name. '</p><p> <b>Создатель:</b> '.Yii::app()->user->name.'</p> <p><b>Статус:</b> '.$model->Status.'</p><p><b>Тип</b>: '.$model->Type.'</p><p><b>Категория:</b> '.$model->ZayavCategory_id.'</p><p> <b>Cодержимое:</b> '.$model->Content.'</p></body>';
            Yii::app() ->mailer->Host = 'p7982.mail.ihc.ru';
            Yii::app() ->mailer->Port = 25;
            Yii::app() ->mailer->IsSMTP();
            Yii::app() ->mailer->IsHTML(true);
            Yii::app() ->mailer->SMTPAuth = true;
            Yii::app() ->mailer->Username = 'info@v-admin.ru';
            Yii::app() ->mailer->Password = 'p62D639775';
            Yii::app() ->mailer->From = 'info@v-admin.ru';
            Yii::app() ->mailer->FromName = 'Система заявок';
            Yii::app() ->mailer->AddReplyTo('info@v-admin.ru');
            Yii::app() ->mailer->AddAddress($user->Email);
            Yii::app() ->mailer->AddAddress('ivanov@roi.rosinkas.ru');
            Yii::app() ->mailer->CharSet = 'UTF-8';
            Yii::app() ->mailer->Subject = ''.strip_tags($model->Status).' Заявка '.$model->Name.'';
            Yii::app() ->mailer->Body = $message;
            Yii::app() ->mailer->Send();
            Yii::app()->user->setFlash('info', '<strong>Поздравляем!</strong> Ваша заявка успешно создана.');
             
            $this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Zayavki']))
		{
			$model->attributes=$_POST['Zayavki'];
			if($model->save())
            $manager = CUsers::model()->find('LOWER(Username)=?', array(strtolower($model->Managers_id)));
            $user = CUsers::model()->find('LOWER(Username)=?', array(strtolower($model->CUsers_id)));
            $message = '<body><h1>Изменена заявка</h1><p><i>'.$model->Date.'</i></p><p><a href="http://support.v-admin.ru/index.php/zayavki/'.$model->id.'">Просмотреть</a></p> <p><b>Номер заявки:</b> '.$model->id.'</p><p><b>Компания заказчик:</b> '.$model->company.'</p><p><b>Наименование:</b>  '.$model->Name. '</p><p> <b>Создатель:</b> '.$model->CUsers_id.'</p> <p><b>Статус:</b> '.$model->Status.'</p><p><b>Тип</b>: '.$model->Type.'</p><p><b>Категория:</b> '.$model->ZayavCategory_id.'</p><p> <b>Cодержимое:</b> '.$model->Content.'</p></body>';
            Yii::app() ->mailer->Host = 'p7982.mail.ihc.ru';
            Yii::app() ->mailer->Port = 25;
            Yii::app() ->mailer->IsSMTP();
            Yii::app() ->mailer->IsHTML(true);
            Yii::app() ->mailer->SMTPAuth = true;
            Yii::app() ->mailer->Username = 'info@v-admin.ru';
            Yii::app() ->mailer->Password = 'p62D639775';
            Yii::app() ->mailer->From = 'info@v-admin.ru';
            Yii::app() ->mailer->FromName = 'Система заявок';
            Yii::app() ->mailer->AddReplyTo('info@v-admin.ru');
            Yii::app() ->mailer->AddAddress($user->Email);
            Yii::app() ->mailer->AddAddress($manager->Email);
            Yii::app() ->mailer->AddAddress('ivanov@roi.rosinkas.ru');
            Yii::app() ->mailer->CharSet = 'UTF-8';
            Yii::app() ->mailer->Subject = ''.strip_tags($model->Status).' Заявка '.$model->Name.'';
            Yii::app() ->mailer->Body = $message;
            Yii::app() ->mailer->Send();
           
		    $this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'УПС! Неверный запрос, что-то вы делаете не так.');
	}

	/**
	 * Lists all models.
	 */
	 /*
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Zayavki');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
*/
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Zayavki('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Zayavki']))
			$model->attributes=$_GET['Zayavki'];
            Yii::app()->user->setFlash('info', '<strong>Добро пожаловать '.Yii::app()->user->name.'!</strong> Управляйте своими заявками на этой странице.');

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$usr = Yii::app()->user->name;
		if(Yii::app()->user->checkAccess('2')){
   		$model=Zayavki::model()->findByPk($id);
		}
        elseif (Yii::app()->user->checkAccess('3')) {
	   $model=Zayavki::model()->findByPk($id,'Managers_id = :usr', array(':usr'=>$usr));
		}
		elseif (Yii::app()->user->checkAccess('1')) {
	   $model=Zayavki::model()->findByPk($id,'CUsers_id = :usr', array(':usr'=>$usr));
		}
		if($model===null)
			throw new CHttpException(404,'УПС! Такой страницы не существует в природе.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='zayavki-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    
}
