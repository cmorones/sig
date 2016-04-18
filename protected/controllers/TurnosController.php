<?php

class TurnosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('create','update','info','seg','del','returnar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Turnos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$id_area = Yii::app()->user->id_area;
			$id2 = $_GET['id_corresp'];
			$model->attributes=$_POST['Turnos'];
			$model->folio=$this->ultimofolio($id_area);
			$model->id_corresp=$_GET['id_corresp'];
			$model->remitente=$_GET['rem'];
			$model->estado_rem=1;
			$model->estado_dest=1;
			$model->estado=1;
			$model->estado_sol=0;
			$model->user_reg = Yii::app()->user->id;
			$fecha_reg = date("Y-m-d H:i:s");
			$model->fecha_reg=$fecha_reg;
			$model->fecha_turno=$fecha_reg;
			if($model->save())
		    //$this->redirect(array('view','id'=>$model->id));
			$this->redirect(array('correspondencia/turnos','id'=>$id2));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

		public function actionReturnar()
	{
		$model=new Turnos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$id_area = Yii::app()->user->id_area;
			$id2 = $_GET['id_corresp'];
			$model->attributes=$_POST['Turnos'];
			$model->folio=$this->ultimofolio($id_area);
			$model->id_corresp=$_GET['id_corresp'];
			$model->remitente=$_GET['rem'];
			$model->estado_rem=1;
			$model->estado_dest=1;
			$model->estado=1;
			$model->estado_sol=0;
			$model->user_reg = Yii::app()->user->id;
			$fecha_reg = date("Y-m-d H:i:s");
			$model->fecha_reg=$fecha_reg;
			$model->fecha_turno=$fecha_reg;
			if($model->save())
		    //$this->redirect(array('view','id'=>$model->id));
			$this->redirect(array('correspondencia/turnos','id'=>$id2));
		}

		$this->render('returnar',array(
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


		 $id_area = Yii::app()->user->id_area;

		 $sql ="SELECT 
  turnos.id_corresp, 
  turnos.remitente
FROM 
  public.turnos
WHERE 
  turnos.id = $id";

   $info = Yii::app()->db->createCommand($sql)->queryRow();

   $id_corresp = $info['id_corresp'];
   $rem = $info['remitente'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$model->attributes=$_POST['Turnos'];
			
			if($model->save())
				$this->redirect(array('turnos/info','id'=>$id));
		}




		$this->render('update',array(
			'model'=>$model,
			'id_area'=>$id_area,
			'id_corresp'=>$id_corresp,
			'rem'=>$rem,

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
		$dataProvider=new CActiveDataProvider('Turnos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Turnos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Turnos']))
			$model->attributes=$_GET['Turnos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Turnos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Turnos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Turnos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='turnos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function ultimofolio($id_area)
	{
		
		$sql_lid="SELECT 
  max(folio) as fol
FROM 
  public.turnos, 
  public.directorio
WHERE 
  turnos.destinatario = directorio.id and 
  (turnos.fecha_reg between '".$this->fechaInicioActivo()."' and '".$this->fechaFinActivo()."') and directorio.id_area=$id_area and turnos.estado=1"; 
					

		$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();		
					
		if( $lid['fol'] !=0 ){
			return $lid['fol']+1; 
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

		public function actionInfo($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$model->attributes=$_POST['Turnos'];
			$model->fecha_solucion=$_POST['Turnos']['fecha_solucion'];
			$model->doc_respuesta=$_POST['Turnos']['doc_respuesta'];
			$model->estado_sol=1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('_info',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	public function actionSeg($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$model->attributes=$_POST['Turnos'];
			if($model->save())
			//	$this->redirect(array('//turnosList/admin'));
		    $this->redirect(array('turnos/info','id'=>$id));
		}

		$this->render('seg',array(
			'model'=>$model,
		));
	}

	public function actionDel($id)
	{
		$model=$this->loadModel($id);
        $model->estado=2;
		$model->save();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
       $this->redirect(array('turnosList/admin','id'=>$id));
		
	}




}
