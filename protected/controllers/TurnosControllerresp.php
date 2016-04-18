<?php

class TurnosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='main2';

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
				'actions'=>array('create','seg','baja','update','info'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//$this->render('view',array(
		//	'model'=>$this->loadModel($id),
		//));
		$model=$this->loadModel($id);


		$this->render('_info',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
    public function actionCreate()
	{
		$model=new Turnosp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$model->attributes=$_POST['Turnos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreate2($id_area,$id_corresp,$rem)
	{
		$this->layout='//layouts/column2';
		//public $layout='//layouts/column2';

		$model=new Turnos;

		$criteria = new CDbCriteria;
		$criteria->with=array('personas');
		//$criteria->join="right JOIN datos_personales as dp ON(dp.id=t.id_dp)";
		$criteria->condition= "t.id_area=:id_area and t.status=:status";
		$criteria->params=array(':id_area'=>$id_area,':status'=>1);
		$criteria->order = "personas.nombre";


		$resultado = Directorio::model()->findAll($criteria);
		//Apply To CActiveDataProvider
	    $listTurno = array();
        $listTurno['falso'] = 'Selecciona a quien turnar';
        foreach ($resultado as $key => $value) {
            $listTurno[$value->id] = $value->personas->nombre." ".$value->personas->apellido_p." ".$value->personas->apellido_m."-".$value->cargo;
        }

        $resultBanderas = CatInstrucciones::model()->findAll(array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }


        $resultCaracter = CatCaracter::model()->findAll(array('order'=>'id'));
        $caracter = array();
        $caracter['falso'] = 'Seleccionar';
        foreach ($resultCaracter as $key => $value) {
            $caracter[$value->id] = "$value->nombre";
        }



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*

		id serial NOT NULL,
  folio integer,
  id_corresp integer,
  remitente integer,
  estado_rem integer,
  destinatario integer,
  estado_dest integer,
  instruccion1 integer,
  instruccion2 integer,
  instruccion_adicional character varying(500),
  caracter integer,
  fecha_plazo date,
  doc_respuesta character varying(200),
  solucion character varying(5000),
  fecha_turno date,
  fecha_solucion date,
  estado_sol integer,
  estado integer,
  fecha_reg timestamp without time zone,
  fecha_mod timestamp without time zone,
  user_reg integer,
  user_mod integer,

  */

		if(isset($_POST['Turnos']))
		{
			$fecha_reg = date("Y-m-d H:i:s");
			
			//$model->attributes=$_POST['Turnos'];
			 echo "Folio:" . $this->ultimofolio($id_area) . "<br>";
			 echo "Id Correspondencia:" . $id_corresp . "<br>";
			 echo "Remitente:" . $rem . "<br>";
			 echo "Turnnado a:" . $_POST['Turnos']['destinatario'] . "<br>";
			 echo "instruccion1 a:" . $_POST['Turnos']['instruccion1'] . "<br>";
			 echo "instruccion2 a:" . $_POST['Turnos']['instruccion2'] . "<br>";
			 echo "instruccion_adicional a:" . $_POST['Turnos']['instruccion_adicional'] . "<br>";
			 echo "caracter a:" . $_POST['Turnos']['caracter'] . "<br>";
			 echo "fecha_plazo a:" . $_POST['Turnos']['fecha_plazo'] . "<br>";
		
            $model2=new Turnos;
			$model2->folio=$this->ultimofolio($id_area);
			$model2->id_corresp=$id_corresp;
			$model2->remitente=$rem;
			$model2->estado_rem=1;
			$model2->destinatario=$_POST['Turnos']['destinatario'];
			$model2->estado_dest=1;
			$model2->instruccion1=$_POST['Turnos']['instruccion1'];
			$model2->instruccion2=$_POST['Turnos']['instruccion2'];
			$model2->instruccion_adicional=$_POST['Turnos']['instruccion_adicional'];
			$model2->caracter=$_POST['Turnos']['caracter'];
			$model2->fecha_plazo=$_POST['Turnos']['fecha_plazo'];
			$model2->fecha_turno=$fecha_reg;
			$model2->fecha_reg=$fecha_reg;
			$model2->estado=1;
			$model2->estado_sol=1;
			$model2->user_reg = Yii::app()->user->id;

			//print_r($model);
			/*$fecha_reg = date("Y-m-d H:i:s");
			$model->fecha_reg=$fecha_reg;
			$model->remitente=$rem;
			$model->estado=1;
			$model->estado_sol=1;
			$model->folio=$this->ultimofolio($id_area);
			$model->id_corresp=$id_corresp;
			$model->user_reg = Yii::app()->user->id;*/
			//$this->redirect(array('correspondencia/turnos','id'=>$id_corresp));

			if($model2->save()){
			  $this->redirect(array('correspondencia/turnos','id'=>$id_corresp));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'id_area'=>$id_area,
			'rem'=>$rem,
			'listTurno'=>$listTurno,
			'banderas'=>$banderas,
			'caracter'=>$caracter,
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

		

        $sql ="SELECT 
  directorio.id_area,
  directorio.id
FROM 
  public.directorio, 
  public.turnos
WHERE 
  turnos.remitente = directorio.id AND
  turnos.id = $id";

  $area = Yii::app()->db->createCommand($sql)->queryRow();
 $id_area =$area['id_area'];
 $rem = $area['id'];



		$criteria = new CDbCriteria;
		$criteria->with=array('personas');
		//$criteria->join="right JOIN datos_personales as dp ON(dp.id=t.id_dp)";
		$criteria->condition= "t.id_area=:id_area and t.status=:status";
		$criteria->params=array(':id_area'=>$id_area,':status'=>38);
		$criteria->order = "personas.nombre";


		$resultado = Directorio::model()->findAll($criteria);
		//Apply To CActiveDataProvider
	    $listTurno = array();
        $listTurno['falso'] = 'Selecciona a quien turnar';
        foreach ($resultado as $key => $value) {
            $listTurno[$value->id] = $value->personas->nombre." ".$value->personas->apellido_p." ".$value->personas->apellido_m."-".$value->cargo;
        }

        $resultBanderas = CatInstrucciones::model()->findAll(array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }


        $resultCaracter = CatCaracter::model()->findAll(array('order'=>'id'));
        $caracter = array();
        $caracter['falso'] = 'Seleccionar';
        foreach ($resultCaracter as $key => $value) {
            $caracter[$value->id] = "$value->nombre";
        }


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			
			$model->attributes=$_POST['Turnos'];
			$fecha_mod = date("Y-m-d H:i:s");
			$model->fecha_mod=$fecha_mod;
			$model->user_mod = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('//turnosList/admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'id_area'=>$id_area,
			'rem'=>$rem,
			'listTurno'=>$listTurno,
			'banderas'=>$banderas,
			'caracter'=>$caracter,
		));
	}

	public function actionSeg($id)
	{
		$model=$this->loadModel($id);

		

        $sql ="SELECT 
  directorio.id_area,
  directorio.id
FROM 
  public.directorio, 
  public.turnos
WHERE 
  turnos.remitente = directorio.id AND
  turnos.id = $id";

  $area = Yii::app()->db->createCommand($sql)->queryRow();
 $id_area =$area['id_area'];
 $rem = $area['id'];



		$criteria = new CDbCriteria;
		$criteria->with=array('personas');
		//$criteria->join="right JOIN datos_personales as dp ON(dp.id=t.id_dp)";
		$criteria->condition= "t.id_area=:id_area and t.status=:status";
		$criteria->params=array(':id_area'=>$id_area,':status'=>38);
		$criteria->order = "personas.nombre";


		$resultado = Directorio::model()->findAll($criteria);
		//Apply To CActiveDataProvider
	    $listTurno = array();
        $listTurno['falso'] = 'Selecciona a quien turnar';
        foreach ($resultado as $key => $value) {
            $listTurno[$value->id] = $value->personas->nombre." ".$value->personas->apellido_p." ".$value->personas->apellido_m."-".$value->cargo;
        }

        $resultBanderas = CatInstrucciones::model()->findAll(array('order'=>'id'));
        $banderas = array();
        $banderas['falso'] = 'Selecciona bandera';
        foreach ($resultBanderas as $key => $value) {
            $banderas[$value->id] = "$value->nombre";
        }


        $resultCaracter = CatCaracter::model()->findAll(array('order'=>'id'));
        $caracter = array();
        $caracter['falso'] = 'Seleccionar';
        foreach ($resultCaracter as $key => $value) {
            $caracter[$value->id] = "$value->nombre";
        }


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			
			$model->attributes=$_POST['Turnos'];
			$fecha_mod = date("Y-m-d H:i:s");
			$model->fecha_mod=$fecha_mod;
			$model->user_mod = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('turnos/info','id'=>$model->id_corresp));
		}

		$this->render('seg',array(
			'model'=>$model,
			'id_area'=>$id_area,
			'rem'=>$rem,
			'listTurno'=>$listTurno,
			'banderas'=>$banderas,
			'caracter'=>$caracter,
		));
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

	public function actionSolucion($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turnos']))
		{
			$model->attributes=$_POST['Turnos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('_info',array(
			'model'=>$model,
			'id'=>$id,
		));
	}





	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();
		$model=$this->loadModel($id);
        $model->estado=39;
		$model->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionBaja($id)
	{
		//$this->loadModel($id)->delete();
		$model=$this->loadModel($id);
        $model->estado=2;
		$model->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		$this->redirect(array('turnos/admin'));
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
  (turnos.fecha_reg between '".$this->fechaInicioActivo()."' and '".$this->fechaFinActivo()."') and directorio.id_area=$id_area"; 
					

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
}
