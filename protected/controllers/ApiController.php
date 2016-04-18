<?php



class ApiController extends Controller {


public function actionAcronimos(){

$request=trim($_GET['area']);

$query ="SELECT 
  areas.acronimo
FROM 
  public.areas, 
  public.directorio
WHERE 
  directorio.id_area = areas.id AND
  directorio.id = $request";

$resultrem=Yii::app()->db->createCommand($query)->queryAll();




foreach($resultrem as $model) {
                      /*  $data[] = array(
                                'acronimo'=>$model['acronimo'], // value for input field
                        );*/
                      $data['acronimo'] = $model['acronimo'];
                }


            header('Content-type: application/json');  
            echo json_encode($data);  
            Yii::app()->end();

 

}

public function actionDirectorio(){

$this->layout=false;

        $remitentes = array();

$id_area = Yii::app()->user->id_area;


$query ="SELECT 
  directorio.id_area, 
  documentos.documento, 
  documentos.fecha
FROM 
  public.correspondencia, 
  public.documentos, 
  public.directorio
WHERE 
  correspondencia.id_docto = documentos.id AND
  correspondencia.destinatario = directorio.id_area AND
  directorio.id_area = $id_area AND 
  documentos.estado = 1 AND 
  correspondencia.estado_acuse = 0 limit 1000";

$resultrem=Yii::app()->db->createCommand($query)->queryAll();




 foreach ($resultrem as $value) {
            $remitentes[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
        }


            header('Content-type: application/json');  
            echo json_encode($remitentes);  
            Yii::app()->end(); 
        }

  public function actionInitCopias(){

    $data[]=array('1'=>'Cesar Morones Sanchez', '2'=>'Cesar Morones Sanchez2');

    echo CJSON::encode($data);


  }


	}