<?php

class MainController extends Controller
{

		public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','admin2'),
				'users'=>array('admin','admin2'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		//$this->layout='main2';
		//Yii::app()->theme = 'abound';
		if (!Yii::app()->user->isGuest) {

		$id_area= Yii::app()->user->id_area;
		
		$sql = "SELECT nombre from areas where id=$id_area"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $area = $ejercicio['nombre'];

	    $sql = "SELECT 
				  count(documentos.id) as salidas
				FROM 
				  public.documentos, 
				  public.directorio
				WHERE 
				  documentos.remitente = directorio.id AND
				  directorio.status=1 AND
				  directorio.id_area =$id_area"; 
	    $salidas = Yii::app()->db->createCommand($sql)->queryRow();
	    $salidas = $salidas['salidas'];

	     $sqlin ="SELECT 
					  count(correspondencia.id) as entradas
					FROM 
					  public.correspondencia, 
					  public.directorio
					WHERE 
					  correspondencia.destinatario = directorio.id AND
					  directorio.status=1 AND
					  directorio.id_area = $id_area AND 
					  correspondencia.estado_acuse = 1";

  		$entradas = Yii::app()->db->createCommand($sqlin)->queryRow();
	    $entradas = $entradas['entradas'];

	    $sqlsin ="SELECT 
					  count(correspondencia.id) as sinconfirmar
					FROM 
					  public.correspondencia, 
					  public.directorio
					WHERE 
					  correspondencia.destinatario = directorio.id AND
					  directorio.status=1 AND
					  directorio.id_area = $id_area AND 
					  correspondencia.estado_acuse = 0";

  		$sinconfirmar = Yii::app()->db->createCommand($sqlsin)->queryRow();
	    $sinconfirmar = $sinconfirmar['sinconfirmar'];

	     $sqlturn ="SELECT 
					  count(turnos.id) as turnos
					FROM 
					  public.turnos, 
					  public.directorio
					WHERE 
					  turnos.remitente = directorio.id AND
					  directorio.status=1 AND
					  directorio.id_area = $id_area";

  		$turnos = Yii::app()->db->createCommand($sqlturn)->queryRow();
	    $turnos = $turnos['turnos'];

		
		$this->render('index',array(
				'area'=>$area,
				'salidas'=>$salidas,
				'entradas'=>$entradas,
				'sinconfirmar'=>$sinconfirmar,
				'turnos'=>$turnos,
			
		));
	}else{
		$this->redirect(Yii::app()->homeUrl);
	}
	}

	public function actionPrivilegios()
	{
		
		$menus_principales = Menu::model()->findAll("parent_id=0");
		//echo $this->renderPartial('_permisos', array('menus_principales'=>$menus_principales, 'id_persona'=>$_GET['id_persona'], 'nombre'=>$_GET['nombre']), false, true);

		$this->render('_permisos',array('menus_principales'=>$menus_principales));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}