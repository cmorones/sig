<?php

class CorrespondenciaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','confirmar','confirmado','entrada','salida','turnos','salidas'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionConfirmar()
	{
		$model=new Correspondencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Correspondencia']))
			$model->attributes=$_GET['Correspondencia'];

		$this->render('confirmar',array(
			'model'=>$model,
		));
	}

	public function actionEntrada()
	{
		$model=new Correspondencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Correspondencia']))
			$model->attributes=$_GET['Correspondencia'];

		$this->render('entrada',array(
			'model'=>$model,
		));
	}

	public function actionSalida()
	{
		$model=new Correspondencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Correspondencia']))
			$model->attributes=$_GET['Correspondencia'];

		$this->render('salida',array(
			'model'=>$model,
		));
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
		$model=new Correspondencia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Correspondencia']))
		{
			$model->attributes=$_POST['Correspondencia'];
			if($model->save())
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Correspondencia']))
		{
			$model->attributes=$_POST['Correspondencia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionConfirmado($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Correspondencia']))
		{
			
			$id_area = Yii::app()->user->id_area;
			$model->attributes=$_POST['Correspondencia'];
			$model->estado_acuse=1;
			$model->folio=$this->ultimofolio($id_area);
			if($model->save())
				$this->redirect(array('confirmar','id'=>$model->id));
		}

		$this->render('confirmado',array(
			'model'=>$model,
		));
	}

		public function actionTurnos($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Correspondencia']))
		{
			$model->attributes=$_POST['Correspondencia'];
			$model->estado_acuse=1;
			if($model->save())
				$this->redirect(array('confirmar','id'=>$model->id));
		}

		$this->render('turnos',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

			public function actionSalidas($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Correspondencia']))
		{
			$model->attributes=$_POST['Correspondencia'];
			$model->estado_acuse=1;
			if($model->save())
				$this->redirect(array('confirmar','id'=>$model->id));
		}

		$this->render('salidas',array(
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Correspondencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Correspondencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Correspondencia']))
			$model->attributes=$_GET['Correspondencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Correspondencia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Correspondencia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Correspondencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='correspondencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function ultimofolioturnos($id_area)
	{
		
		$sql_lid="SELECT 
  max(folio) as fol
FROM 
  public.turnos, 
  public.directorio
WHERE 
  turnos.destinatario = directorio.id and 
  (turnos.fecha_reg between '".$this->fechaInicioActivo()."' and '".$this->fechaFinActivo()."') and directorio.id_area=$id_area"; 
					

		$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();		
					
		if( $lid['fol'] !=0 ){
			return $lid['fol']+1; 
		}else{
			return 0+1; 
		}

	}




	public function ultimoFolio($id_area){


		$sql_lid = "SELECT 
  max (correspondencia.folio) as folio 
FROM 
  public.correspondencia, 
  public.directorio
WHERE 
  correspondencia.destinatario = directorio.id AND
  directorio.id_area = $id_area and correspondencia.estado=1 and (correspondencia.fecha_acuse between '".$this->fechaInicioActivo()."' and '".$this->fechaFinActivo()."');
";

		
		$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();		
					
		if( $lid['folio'] !=0 ){
			return $lid['folio']+1; 
		}else{
			return 0+1; 
		}

	}





















	public function fechaInicioActivo($anio=null){
		if(is_null($anio)){
			$anio =date('Y');
		}

		$fechaini = $anio."-01-01";

		return $fechaini;

	}

	public function fechaFinActivo($anio=null){
		if(is_null($anio)){
			$anio =date('Y');
		}

		$fechafin = $anio."-12-31";
		
		return $fechafin;

	}
}
