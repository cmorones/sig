<?php

class DocumentosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $destiny;
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','circular','update','buscar','eliminaDocto'),
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
   $a = trim($_POST['ajaxData']);


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
            $docto = trim($_POST['Documentos']['documento']);
			if($docto==""){
				$model->documento="F-".$this->ultimofolio()."/".date('y');
			}else {
				$model->documento=$docto;
			}





			$model->user_reg=1;
			if($model->save()){
			$fecha_reg = date("Y-m-d H:i:s");



			
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
               
			    
if(isset($_POST['Documentos']['copiasIds'])){
$ccp = $_POST['Documentos']['copiasIds'];
			  
foreach ($ccp as $value) {
  		
        if($model->tipo_docto==4){

        	$sql = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
  		values (
  			$model->id,
  			$value,
  			1,
  			0,
  			$model->tipo_caracter,
			1,
			2,
			1,
			'$fecha_reg',
			1
  			)";

        }else{

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
			}



       // echo $q;
        $cmd = Yii::app()->db->createCommand($sql);
        $resultado = $cmd->query();
}
}



			    Yii::app()->user->setFlash('success',"Documento: $model->documento registrado correctamente!");
				$this->redirect(array('//salidaView/admin','id'=>$model->id));
			
		

			}
			  
			}
		

		$this->render('create',array(
			'model'=>$model,
			'caracter'=>$caracter,

		));
	}


	public function actionCircular()
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
			





			$model->user_reg=1;
			if($model->save()){
			$valor=intval($model->tipo_caracter);
			$fecha_reg = date("Y-m-d H:i:s");



			
            $destinatario = $_POST['Documentos']['destinatario'];
			


               
			    
if(isset($_POST['Documentos']['copiasIds'])){
$ccp = $_POST['Documentos']['copiasIds'];

 
foreach ($ccp as $value) {



 if($value==-1){

$query1 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 1 order by directorio.id";

$resultrem1=Yii::app()->db->createCommand($query1)->queryAll();

			foreach ($resultrem1 as $gp1) {

				$i = $gp1['id'];

				if($model->remitente == $i){

				}else {

				
				$sql1 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
			  		values (
			  			$model->id,
			  			$i,
			  			1,
			  			0,
			  			$model->tipo_caracter,
						1,
						2,
						1,
						'$fecha_reg',
						1
			  			)";
			        //echo $q;
			        //die();
			        $cmd1 = Yii::app()->db->createCommand($sql1);
			        $resultado1 = $cmd1->query();
			     }

			}

  }
  elseif($value==-2){


  	$query2 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 2 order by directorio.id";

$resultrem2=Yii::app()->db->createCommand($query2)->queryAll();

		foreach ($resultrem2 as $gp2) {

			$i2 = $gp2['id'];

				if($model->remitente == $i2){

				}else {

			$sql2 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
		  		values (
		  			$model->id,
		  			$i2,
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
		        $cmd2 = Yii::app()->db->createCommand($sql2);
		        $resultado2 = $cmd2->query();

		}
	}

  }
  elseif($value==-3){

  	  	$query3 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 3 order by directorio.id";

$resultrem3=Yii::app()->db->createCommand($query3)->queryAll();

			foreach ($resultrem3 as $gp3) {

				$i3 = $gp3['id'];

				if($model->remitente == $i3){

				}else {

				$sql3 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
			  		values (
			  			$model->id,
			  			$i3,
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
			        $cmd3 = Yii::app()->db->createCommand($sql3);
			        $resultado3 = $cmd3->query();

			}
		}

  }
  elseif($value==-4){

  	 	$query4 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 4 order by directorio.id";

$resultrem4=Yii::app()->db->createCommand($query4)->queryAll();

		foreach ($resultrem4 as $gp4) {

			$i4 = $gp4['id'];
				if($model->remitente == $i4){

				}else {

			$sql4 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
		  		values (
		  			$model->id,
		  			$i4,
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
		        $cmd4 = Yii::app()->db->createCommand($sql4);
		        $resultado4 = $cmd4->query();

		}
	}

  }
  elseif($value==-5){

  	  	 	$query5 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 5 order by directorio.id";

$resultrem5=Yii::app()->db->createCommand($query5)->queryAll();

			foreach ($resultrem5 as $gp5) {

				$i5 = $gp5['id'];

					if($model->remitente == $i5){

				}else {

				$sql5 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
			  		values (
			  			$model->id,
			  			$i5,
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
			        $cmd5 = Yii::app()->db->createCommand($sql5);
			        $resultado5 = $cmd5->query();

			}
		}

  }
  elseif($value==-6){

  	  	 	$query6 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 6 order by directorio.id";

$resultrem6=Yii::app()->db->createCommand($query6)->queryAll();

			foreach ($resultrem6 as $gp6) {

				$i6 = $gp6['id'];

					if($model->remitente == $i6){

				}else {

				$sql6 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
			  		values (
			  			$model->id,
			  			$i6,
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
			        $cmd6 = Yii::app()->db->createCommand($sql6);
			        $resultado6 = $cmd6->query();

			}
		}

  }
  elseif($value==-7){



  	  	  	 	$query7 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 7 order by directorio.id";

$resultrem7=Yii::app()->db->createCommand($query7)->queryAll();

			foreach ($resultrem7 as $gp7) {

				$i7 = $gp7['id'];

					if($model->remitente == $i7){

				}else {

				$sql7 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
			  		values (
			  			$model->id,
			  			$i7,
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
			        $cmd7 = Yii::app()->db->createCommand($sql7);
			        $resultado7 = $cmd7->query();

			}
		}

  } elseif($value==-8){



  	  	  	 	$query8 ="SELECT 
  directorio.id 
  FROM 
    public.directorio
WHERE 
    directorio.status=1 and directorio.id_grupo = 8 order by directorio.id";

$resultrem8=Yii::app()->db->createCommand($query8)->queryAll();

	foreach ($resultrem8 as $gp8) {

		$i8 = $gp8['id'];

			if($model->remitente == $i8){

				}else {
		$sql8 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
	  		values (
	  			$model->id,
	  			$i8,
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
	        $cmd8 = Yii::app()->db->createCommand($sql8);
	        $resultado8 = $cmd8->query();

	}
}

  }

  elseif($value>0){



  		$sql = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
  		values (
  			$model->id,
  			$value,
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
        $cmd = Yii::app()->db->createCommand($sql);
        $resultado = $cmd->query();
   }


}
}


				
			    Yii::app()->user->setFlash('success',"Documento: $model->documento registrado correctamente! ");
			    $this->redirect(array('//salidaView/admin','id'=>$model->id));
			
		

			}
			  
			}
		

		$this->render('create2',array(
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

	public function actionUpdate($id,$acuse,$idc)
	{
		$model=$this->loadModel($id);
	

		$sql = "SELECT destinatario from correspondencia where id_docto=".$model->id." and tipo=1 and estado=1"; 
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
		$fecha_reg = date("Y-m-d H:i:s");
		$model->attributes=$_POST['Documentos'];
		$model->fecha_mod=$fecha_reg;
		$dest =$_POST['Documentos']['destinatario'];
		$this->actualizaDest($id,$dest);
        
        if(isset($_POST['Documentos']['copiasIds'])){
        	$ccp = $_POST['Documentos']['copiasIds'];
        }else {
        	$ccp = array();
        }
//Actualizacion
		if($model->save()){

			if(isset($_POST['Documentos']['copiasIds'])){

					$ccp = $_POST['Documentos']['copiasIds'];

					print_r($ccp);



					 $resultado = Correspondencia::model()->findAll((array(
						    'condition'=>'id_docto='.$model->id.' and tipo=2 and estado=1',
						    'order'=>'id'
							)));
				     if($resultado){
				     foreach ($resultado as $key => $row) {


				     	if (in_array($row['destinatario'], $ccp)) {
				     		//echo "<bR>Se actualiza:".$row['destinatario']."<br>";//$this->actualizaCopia();
				     		//$this->deleteFromArray($ccp,$row['destinatario']);
				     	}
						else {
							echo "<br>Elimina correspondencia:".$row['destinatario']."<br>";
							$this->eliminaCopia($model->id,$row['destinatario']);
						}
					}
					}

					foreach ($ccp as $value) {
				              
				          $num = Yii::app()->db->createCommand("select count(*) from correspondencia where id_docto='".$id."' and tipo=2 and estado=1 and  destinatario='".$value."'")->queryScalar();

                          //echo "<br>";
				         if($num>0){
				         // 	echo "Se actualiza 2ces: $value  <br>";//$this->actualizaCopia();

				          }else{

				           	echo "Se inserta2: $value <br> ";//$this->insertaCopia();
				           	$this->insertaCopia($model->id,$value,$model->tipo_caracter);
				          }
						}

                 
					/*foreach ($ccp as $value) {
                          echo "inserta nuevos". $value ."<br>";
                          $this->insertaCopia($model->id,$value,1);
						}
					*/

					//print_r($ccp);

					//print_r($resultado);

					/*	foreach ($ccp as $value) {
				              
				          $existe = $this->buscaCopia($idc,$value);

				         if($existe){
				          	echo "Se actualiza";//$this->actualizaCopia();
				          }else{
				           	echo "Se inserta ";//$this->insertaCopia();
				          }
						}

						*/

					
		}else {
			echo "<br>Elimina toda correspondencia";
			$this->eliminaTodos($model->id);
		}

		  Yii::app()->user->setFlash('success',"Documento: $model->documento registrado correctamente! ");
				$this->redirect(array('//salidaView/admin','id'=>$model->id));


			//	echo "Este es el docto" . $_POST['Documentos']['destinatario'];
			
			//$this->redirect(array('//salidaView/admin','id'=>$model->id));

			}
			//Fin de la actualizacion
		
		} //final del POST
	
if($model->tipo_docto==4){
	$resultado = Correspondencia::model()->findAll((array(
    'condition'=>'id_docto='.$id.' and tipo=1 and estado=1',
    'order'=>'id'
)));

}else {	   
$resultado = Correspondencia::model()->findAll((array(
    'condition'=>'id_docto='.$id.' and tipo=2 and estado=1',
    'order'=>'id'
)));

}


			$valores=array();
			foreach ($resultado as $key => $row) {


			// $this->insertaCopias($model->id,$row["destinatario"],$model->tipo_caracter);
			 array_push($valores,$row["destinatario"]);

					
			}

$model->copiasIds=$valores;//$this->listaexistente($id);

echo "el id es". $id;

		$this->render('update',array(
			'model'=>$model,
			'caracter'=>$caracter,
			'acuse'=>$acuse,
			'idc'=>$idc,
		));
	}

	function deleteFromArray($array, $element, $useOldKeys = FALSE)
{
    $key = array_search($element,$array,TRUE);
    if($key === FALSE)
        return FALSE;
    unset($array[$key]);
    if(!$useOldKeys)
        $array = array_values($array);
    return TRUE;
}

		public function insertaCopia($id,$destinatario,$tipo_caracter){
	$user = Yii::app()->user->id;
	$fecha_reg = date("Y-m-d H:i:s");
 	$sql1 = "INSERT INTO correspondencia (id_docto,destinatario,tipo,estado_acuse,caracter,estado_rem,estado_dest,estado,fecha_reg,user_reg) 
  		values (
  			$id,
  			$destinatario,
  			2,
  			0,
			$tipo_caracter,
			1,
			2,
			1,
			'$fecha_reg',
			$user
  			)";
       // echo $q;
        $cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();

}

	public function actualizaCopia($id,$destinatario,$tipo_caracter){
	$fecha_reg = date("Y-m-d H:i:s");
 	$sql1 = "UPDATE correspondencia set caracter=$tipo_caracter where id_docto=$id and destinatario=$destinatario and estado=1 ";
       // echo $q;
        $cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();
    }

    public function eliminaCopia($id,$destinatario){
	$fecha_reg = date("Y-m-d H:i:s");
 	$sql1 = "UPDATE correspondencia set estado=2 where id_docto=$id and destinatario=$destinatario and estado=1";
       // echo $q;
        $cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();
    }

      public function eliminaTodos($id){
	$fecha_reg = date("Y-m-d H:i:s");
 	$sql1 = "UPDATE correspondencia set estado=2 where id_docto=$id and estado=1 and tipo=2";
       // echo $q;
        $cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();
    }

public function buscaCopia($id,$dest){
   
 
	   $num = Yii::app()->db->createCommand("select count(*) from correspondencia where id_docto='".$id."' and tipo=2 and estado=1 and  destinatario='".$dest."'")->queryScalar();

	   if($num>0){
	   	echo '1';
	   } else {
	   	echo '0';
	   }


    }

     public function actualizaDest($id,$destinatario){
	$fecha_reg = date("Y-m-d H:i:s");
 	$sql1 = "UPDATE correspondencia set destinatario=$destinatario where id_docto=$id and tipo=1 and estado=1";
       // echo $q;
        $cmd1 = Yii::app()->db->createCommand($sql1);
        $resultado1 = $cmd1->query();
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


	  public function actionEliminaDocto($id)
    {

 	echo $sql1 = "UPDATE documentos set estado=2 where id=$id and estado=1";
       // echo $q;
    $cmd1 = Yii::app()->db->createCommand($sql1);
    $resultado1 = $cmd1->query();


 	echo $sql1 = "UPDATE correspondencia set estado=2 where id_docto=$id and estado=1";
       // echo $q;
    $cmd1 = Yii::app()->db->createCommand($sql1);
    $resultado1 = $cmd1->query();



 $this->redirect(array('//salidaView/admin/$id'));




    }




}
