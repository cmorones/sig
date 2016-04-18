<?php

class DocumentosController extends Controller
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
				'actions'=>array('create','update','buscar'),
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
	public function actionBuscar(){
   $a = $_POST['ajaxData'];


	   $num = Yii::app()->db->createCommand("select count(*) from documentos where documento='".$a."' and estado=1")->queryScalar();

	   if($num>0){
	   	echo '1';
	   } else {
	   	echo '0';
	   }


    }

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
		$model=new Documentos;

		$resultCaracter = CatCaracter::model()->findAll(array('order'=>'id'));
        $caracter = array();
        $caracter['falso'] = 'Seleccionar';
        foreach ($resultCaracter as $key => $value) {
            $caracter[$value->id] = "$value->nombre";
        }

		
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Documentos']))
		{
			$fecha_reg = date("Y-m-d H:i:s");
			$model->attributes=$_POST['Documentos'];
			$model->estado=1;
			$model->fecha_reg=$fecha_reg;
            $docto = $_POST['Documentos']['documento'];
			if($docto==""){
				$model->documento="F-".$this->ultimofolio()."/".date('y');
			}





			$model->user_reg=1;
			if($model->save()){
			$fecha_reg = date("Y-m-d H:i:s");
			$ccp = $_POST['Documentos']['copiasIds'];
            $destinatario = $_POST['Documentos']['destinatario'];
			

			

$sql1 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
  		values (
  			$model->id,
  			$destinatario,
  			1,
  			0,
			$model->tipo_caracter,
			1,
			2,
			1,
			'$fecha_reg',
			1
  			)";
       // echo $q;
        $cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();
               
			    
if(is_array($ccp)){			   
foreach ($ccp as $value) {
  		$sql = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
  		values (
  			$model->id,
  			$value,
  			2,
  			0,
  			$model->tipo_caracter,
			1,
			2,
			1,
			'$fecha_reg',
			1
  			)";
       // echo $q;
        $cmd = Yii::app()->db->createCommand($sql);
        $resultado = $cmd->query();
}
}



			    Yii::app()->user->setFlash('success',"Documento: $model->documento registrado correctamente!");
				$this->redirect(array('//documentos/admin','id'=>$model->id));
			
		

			}
			  
			}
		

		$this->render('create',array(
			'model'=>$model,
			'caracter'=>$caracter,

		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 public function listaSimple($arreglo){
            
               
                $a ='';
                if(is_array($arreglo)){
                foreach ($arreglo as $k=>$v){
                    $a .= $v.',';
                }
                    $a= substr( $a, 0,-1);
                }else {
                    $a ='';	
                }

                return $a;
            
        }

    public function listaexistente($id_docto){

$this->layout=false;

$resultado = Correspondencia::model()->findAll((array(
    'condition'=>'id_docto='.$id_docto.'',
    'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {



			 $val= array_push($valores,$row["destinatario"]);

					
			}

 
     

 $serie = $this->listaSimple($valores);
return $serie;
		}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$sql = "SELECT destinatario from correspondencia where id_docto=".$model->id." and tipo=1"; 
		$result = Yii::app()->db->createCommand($sql)->queryRow();

		$model->destinatario =$result['destinatario'];

		$resultCaracter = CatCaracter::model()->findAll(array('order'=>'id'));
        $caracter = array();
        $caracter['falso'] = 'Seleccionar';
        foreach ($resultCaracter as $key => $value) {
            $caracter[$value->id] = "$value->nombre";
        }






		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Documentos']))
		{
			$model->attributes=$_POST['Documentos'];
			if($model->save()){
				$fecha_reg = date("Y-m-d H:i:s");
				$ccp = $_POST['Documentos']['copiasIds'];
			    if(is_array($ccp)){	

		



			foreach ($ccp as $value) {

			$resultado = Correspondencia::model()->findAll((array(
			    'condition'=>'id_docto='.$model->id.' and tipo=2',
			    'order'=>'id'
				)));
			$valores=array();
			foreach ($resultado as $key => $row) {



			 array_push($valores,$row["destinatario"]);

					
			}
				
				if (in_array($value, $valores)) {
				    //echo "Existe Irix";
				}else {

					$sql = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
					  		values (
					  			$model->id,
					  			$value,
					  			2,
					  			0,
					  			$model->tipo_caracter,
								1,
								2,
								1,
								'$fecha_reg',
								1
					  			)";
					       // echo $q;
					        $cmd = Yii::app()->db->createCommand($sql);
					        $resultado = $cmd->query();
				}
  		

/*
  		

        */
}
}



Yii::app()->user->setFlash('success',"Documento: $model->documento registrado correctamente!");
				$this->redirect(array('//documentos/admin','id'=>$model->id));
		}
		}
	
	   
$resultado = Correspondencia::model()->findAll((array(
    'condition'=>'id_docto='.$id.' and tipo=2',
    'order'=>'id'
	)));
			$valores=array();
			foreach ($resultado as $key => $row) {



			 array_push($valores,$row["destinatario"]);

					
			}

		$model->copiasIds=$valores;//$this->listaexistente($id);
/*	array(
   '4' => 'Lic. Virginia Álvarez Cruz - Jud de Biblioteca',
   '5' => 'Lic. Juan José Vázquez Mancilla - Jud de Sistema Semiescolarizado',
   '8' => 'Lic. Miguel Angel Razo Hernández Raso Hernández - Jud de Servicios Administrativos',
   '9' => 'Ing. Rey Felipe Garrido Jiménez - Jud de Apoyo Técnico',
   '11' => 'Lic. Ma. Magdalena Guerrero Tristan - Jud de Sistema Semiescolarizado',
   '12' => 'Mónica Ivonne Hernández Perea - Enlace de Servicios Escolares',
   '14' => 'Ing. Mauricio García Espinosa - Jud de Servicios Administrativos',
   '15' => 'Ing. José Guadalupe de Loza Guitiérrez - Jud de Apoyo Técnico',
));*/
		$this->render('update',array(
			'model'=>$model,
			'caracter'=>$caracter,
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
		$dataProvider=new CActiveDataProvider('Documentos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Documentos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Documentos']))
			$model->attributes=$_GET['Documentos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Documentos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Documentos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Documentos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='documentos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

		public function ultimofolio()
	{
		
$sql_lid="SELECT 
  max(id) as fol
FROM 
  public.documentos"; 
					

		$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();		
					
		if( $lid['fol'] !=0 ){
			return $lid['fol']+1; 
		}else{
			return 0+1; 
		}

	}
}
