<?php

class InformesController extends Controller
{
	

	
	public function actionIndex()
	{

		$this->render('index');

	}

	public function actionAdmin()
	{
		$this->render('admin');
	}

	public function actionSalida()
	{
		
		$id_area= Yii::app()->user->id_area;
		
		$sql = "SELECT nombre from areas where id=$id_area"; 
	    $ejercicio = Yii::app()->db->createCommand($sql)->queryRow();
	    $area = $ejercicio['nombre'];



		$this->render('salida', array(
			'area'=>$area,
			
			));
	}


    public function actionCargo()
	{
		$this->render('cargo');
	}


public function actionReqPto() {





if(empty($_POST['fecha1']) && empty($_POST['fecha2'])  && empty($_POST['fecha2'])){
echo "Debe seleccionar un criterio";

}
elseif($_POST['id_tipo']==0){

$this->renderPartial('_porconfirmar', array(
		//	'model'=>$model,
			'fecha1'=>$_POST['fecha1'],
			'fecha2'=>$_POST['fecha2'],
			'id_tipo'=>$_POST['id_tipo']));
}
elseif($_POST['id_tipo']==1){

$this->renderPartial('_entrada', array(
		//	'model'=>$model,
			'fecha1'=>$_POST['fecha1'],
			'fecha2'=>$_POST['fecha2'],
			'id_tipo'=>$_POST['id_tipo']));
}
elseif($_POST['id_tipo']==2){

$this->renderPartial('_salida', array(
		//	'model'=>$model,
			'fecha1'=>$_POST['fecha1'],
			'fecha2'=>$_POST['fecha2'],
			'id_tipo'=>$_POST['id_tipo']));
}
elseif($_POST['id_tipo']==3){

$this->renderPartial('_turnos', array(
		//	'model'=>$model,
			'fecha1'=>$_POST['fecha1'],
			'fecha2'=>$_POST['fecha2'],
			'id_tipo'=>$_POST['id_tipo']));
}





/*if(isset($_POST['fecha1'],$_POST['fecha2']) && $_POST['fecha1'] !=''  && $_POST['fecha2'])
{
 $fecha1 =$_POST['fecha1'];
 $fecha2 =$_POST['fecha2'];

 $tit1 = "del $fecha1 al $fecha2<br>";
} else {
 $fecha1 ='';
 $fecha2 ='';
 $tit1 ='';
}

$id_tipo = "Informe de Correspondencia por criterios $tit1";

$this->renderPartial('salida', array(
		//	'model'=>$model,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'id_tipo'=>$titulo));

/*

if(isset($_POST['id_partida']) && $_POST['id_partida'] !="" && $_POST['id_partida'] !=0){
$id_partida =$_POST['id_partida'];
$tit3 = "por partida:$id_partida<br>";
}else
{
$id_partida =0;
$tit3 = "";
}

if(isset($_POST['id_subprog']) && $_POST['id_subprog'] !="" && $_POST['id_subprog'] !=0){
$id_subprog =$_POST['id_subprog'];
$tit2 = "por subprograma:$id_subprog<br>";
}else
{
$id_subprog =0;
$tit2 = '';
}

if(isset($_POST['id_area']) && $_POST['id_area'] !="" && $_POST['id_area'] !=0){
$id_area =$_POST['id_area'];
$tit4 = "por area:$id_area<br>";
}else
{
$id_area =0;
$tit4 = "";
}

if(isset($_POST['id_bandera']) && $_POST['id_bandera'] !="" && $_POST['id_bandera'] !=0){
$id_bandera =$_POST['id_bandera'];
$tit6 = "por bandera:$id_bandera<br>";
}else
{
$id_bandera =0;
$tit6 = "";
}

if(isset($_POST['proveedor']) && ($_POST['proveedor'] !="" && $_POST['proveedor'] !='0')){
$proveedor =$_POST['proveedor'];
$tit5 = "por proveedor:$proveedor<br>";

}else
{
$proveedor ="";
$tit5 = "";

}

if(isset($_POST['observa']) && $_POST['observa'] !=""){
$observa =$_POST['observa'];
$tit7 = "por observaciones:$observa<br>";

}else
{
$observa ="";
$tit7 = "";

}

if(isset($_POST['importe']) && $_POST['importe'] !=""){
$importe =$_POST['importe'];
$tit8 = "por importe mayor o igual a $$importe<br>";

}else
{
$importe =0;
$tit8 = "";

}



$sql = "UPDATE  criterios set subprog='$id_subprog', partida='$id_partida' , area='$id_area', bandera='$id_bandera', proveedor='$proveedor', observa='$observa', importe='$importe'  where id=1"; 
$criterios = Yii::app()->db->createCommand($sql)->queryRow();


$titulo = "Informe de Gastos por criterios $tit1$tit5$tit7$tit8";

/*$fecha1 = $post['fecha1'];
$fecha2 = $post['fecha2'];*/



/*
$url = "http://localhost/spdgm/index.php/api/all?fecha1=$fecha1&fecha2=$fecha2";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

$this->renderPartial('_rptall', array(
			'model'=>$model,
			'fecha1'=>$fecha1,
			'fecha2'=>$fecha2,
			'titulo'=>$titulo));

//echo CHtml::encode(print_r($_POST, true));
//$fecha1 = $_REQUEST['fecha1'];
/*$fecha2 = $_REQUEST['fecha2'];



echo $id_subprog;
echo $fecha2;



//$id_tipo = $_POST['id_tipo'];

//if(isset($id_tipo,$id_subprog)){

/*if(isset($id_subprog)){


if ($id_subprog != '' && $id_subprog != 0) {

//echo $id_tipo;
$titulo = "Informe presupuestal 2014";

$url = "http://localhost/spdgm/index.php/api/infpto?id_subprog=$id_subprog";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rpt', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog));



	}elseif ($id_subprog == 0) {

		$titulo = "Informe presupuestal por Subprogramas 2014";

$url = "http://localhost/spdgm/index.php/api/infSubprog?id_subprog=$id_subprog";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $model;
$this->renderPartial('_rptsubprog', array(
			'model'=>$model,
			'titulo'=>$titulo,
			'id_subprog'=>$id_subprog));
		# code...
	} else {

?>
</div>
</div>
<div class="alert alert-info">
<button class="close" data-dismiss="alert" type="button">×</button>
<strong>Atención!!</strong>
Debe seleccionar un criterio de busqueda.
</div>
<?php

}

	}*/
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