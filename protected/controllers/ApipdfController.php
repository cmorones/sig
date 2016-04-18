<?php

class ApipdfController extends Controller
{

	public function encabezado()
	{
		
		$logo1 = Yii::app()->request->baseUrl . '/images/escudo_cd_mex_alta.png';
		$logo = Yii::app()->request->baseUrl . '/images/logo_df.jpg';
		$logocdmx = Yii::app()->request->baseUrl . '/images/logocdmx.png';
		//$html =file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.css');



        $html ="<div class=\"row headercontentRow\">
        <table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
        <tr>
            <td style=\"width: 10%;\">
            <img style=\"width:90px;higth:90px;\" src=\"$logo\" alt=\"Instituto de Educacion Media Superior\" /> 
            </td>
            <td style=\"width: 60%;\">
           <div  class=\"coltituloHeader\"><h1 class=\"tituloHeader\">Instituto de Educacion Media Superior</h1></div><br>
           <div  class=\"coltituloHeadertituloPresentacion\">Sistema Institucional de Gestión Documental(SIGEDO)</div>
            </td>

             <td style=\"width: 10%;\">
             <div class=\"col-md-5 text-center colcdmxHeader\"></div>
             </td>
            
        </tr>
    </table></div>";

        return $html;
	}


public function pie()
	{
		
		$logo1 = Yii::app()->request->baseUrl . '/images/escudo_cd_mex_alta.png';
		$logo = Yii::app()->request->baseUrl . '/images/logo_iems_alta_bn.png';
		$logocdmx = Yii::app()->request->baseUrl . '/images/escudo-pie.png';
		//$html =file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.css');
 


        $html ="<div class=\"row headercontentRow\">
        <table cellspacing=\"0\" style=\"width: 100%; text-align: center; \">
        <tr>
        
          
            <td style=\"width: 60%;\">
           <div  class=\"coltituloHeader\"><h6 class=\"tituloHeader\">Av. División del Norte No. 906, Col. Narvarte Poniente, Del. Beito Juarez, México D.F. C.P. 03020 Tel. 5636 2500</h6></div><br>
          
            </td>
             <td style=\"width: 10%;\">
            <img style=\"width:30px;higth:30px;\" src=\"$logo\" alt=\"Instituto de Educacion Media Superior\" /> 
            </td>

            
        </tr>
    </table></div>";

        return $html;
	}
		public function actionTurno($id)
	{
		
	
		$html=$this->encabezado();
		$html2=$this->tabla_turno($id);
		$html3=$this->pie();

		$mPDF1 = Yii::app()->ePdf->mPDF('',   // mode - default ''
									'',    // format - A4, for example, default ''
									0,     // font size - default 0
									'',    // default font family
									5,    // margin_left
									5,    // margin right
									16,     // margin top
									16,    // margin bottom
									9,     // margin header
									9,     // margin footer
									'L'); 
 
      	//$mPDF1->SetFooter('Reporte Económico de la Ciudad de México|{PAGENO}');
		
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/estilos-personalizadospdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);
 
        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($html,2);
        $mPDF1->WriteHTML($html2,3);
        $mPDF1->SetHtmlFooter($html3);
 
        # Outputs ready PDF
        $report = "turno_". date("d/m/y H:i:s").".pdf";
		$mPDF1->Output("$report",EYiiPdf::OUTPUT_TO_DOWNLOAD);


	}

	public function tabla_turno($id)
	{
	error_reporting(0);
    
    $model = Turnos::model()->findbypk($id);

    $fechadoc =$model->corresp->docto->fecha;
    $idrem =$model->corresp->docto->remitente;
    $iddest =$model->corresp->destinatario;
    $turnosrem =$model->remitente;
    $desturno=$model->destinatario;

    $sql2 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$idrem"; 
$info = Yii::app()->db->createCommand($sql2)->queryRow();


    $sql3 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$iddest"; 
$info2 = Yii::app()->db->createCommand($sql3)->queryRow();

    $sql ="SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m
FROM 
  public.directorio, 
  public.datos_personales, 
  public.turnos
WHERE 
  directorio.id_dp = datos_personales.id AND
  turnos.destinatario = directorio.id AND
  turnos.id =$id";

   $info4 = Yii::app()->db->createCommand($sql)->queryRow();

      $sql5 = "SELECT 
  datos_personales.nombre, 
  datos_personales.apellido_p, 
  datos_personales.apellido_m, 
  directorio.cargo, 
  areas.nombre as nomarea
FROM 
  public.datos_personales, 
  public.directorio, 
  public.areas
WHERE 
  directorio.id_dp = datos_personales.id AND
  directorio.id_area = areas.id AND
  directorio.id =$turnosrem"; 
$info5 = Yii::app()->db->createCommand($sql5)->queryRow();

if($model->solucion!=""){
	$solucionturno=$model->solucion;
}else {
	$solucionturno='<bR><bR><bR><BR><bR><bR><bR>';
}

	$html ="

<br>
<br>
<h4>Recepción</h4>

	<center>
		<table style=\"width:100%; border-collapse: collapse; font-size: 12px;\" border=\"1\">
			<thead>
				<tr style=\"background-color: rgb(204, 204, 204)\;\">
					<td  style=\"text-align: center;\">Turno No.</td>
					<td style=\"text-align: center;\">Folio de Entrada</td>
					<td style=\"text-align: center;\">Fecha</td>
					<td style=\"text-align: center;\">Tipo de Documento</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  style=\"text-align: center;\">
						<b>$model->id</b></td>
						<td  style=\"text-align: center;\">
						<b>".$model->corresp->folio."</b></td>
						<td  style=\"text-align: center;\">
						".$model->fecha_reg."</td>
					<td  style=\"text-align: center;\">
						".$model->corresp->docto->tipo->nombre."</td>
				</tr>

				<thead>
				<tr style=\"background-color: rgb(204, 204, 204)\;\">
					<td  style=\"text-align: center;\" colspan=\"3\">No. de Oficio</td>
					<td style=\"text-align: center;\">Fecha del Documento</td>
					
				</tr>
		</thead>

		<tr >
					<td  style=\"text-align: center;font-size: 16px;color: red;\" colspan=\"3\">".$model->corresp->docto->documento."</td>
					<td style=\"text-align: center;\">".$fechadoc."</td>
					
				</tr>
				
			</tbody>
		</table>
		<h4>Procedencia</h4>
	
		<table style=\"width:100%; border-collapse: collapse; font-size: 12px;\" border=\"1\">
	
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Remitente</td>
					<td  style=\"text-align: left;font-size: 14px;\">".$info['nombre']. " " .$info['apellido_p']." ".$info['apellido_m']."<br>".$model->corresp->docto->remitentes->cargo."<bR>".$model->corresp->docto->remitentes->areas->nombre."</td>
				</tr>
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Destinatario</td>
						<td  style=\"text-align: left;font-size: 14px;\">".$info2['nombre']. " " .$info2['apellido_p']." ".$info2['apellido_m']."<br>".$model->corresp->dest->cargo."<bR>".$model->corresp->dest->areas->nombre."</td>
				
				</tr>
	
		
		</table>

		<table style=\"width:100%; border-collapse: collapse; font-size: 12px;\" border=\"1\">
			<thead>
				<tr style=\"background-color: rgb(204, 204, 204)\;\">
					<td  style=\"text-align: center;\">Asunto</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  style=\"text-align: left;font-size: 16px;\">".$model->corresp->docto->asunto."
				</td>
						
				</tr>

				
				
			</tbody>
		</table>
		<br>
		   <h4>Tratamiento</h4>

		<table style=\"width:100%; border-collapse: collapse; font-size: 12px;\" border=\"1\">
	
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Remitente:</td>
					<td  style=\"text-align: left; font-size: 16px;\">".$info5['nombre']. " " .$info5['apellido_p']." ".$info5['apellido_m']."<br>".$model->rem->cargo."</td>
				</tr>
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Turna a:</td>
					<td  style=\"text-align: left; font-size: 16px;\">".$info4['nombre']. " " .$info4['apellido_p']." ".$info4['apellido_m']."<br>".$model->dest->cargo."</td>
				</tr>
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Instrucciones</td>
					<td  style=\"text-align: left; font-size: 16px;\">1. ".$model->inst1->nombre."<bR>2. ".$model->inst2->nombre."</td>
				</tr>
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Adicionales</td>
					<td  style=\"text-align: left;\">".$model->instruccion_adicional."</td>
				</tr>

				

	
		
		</table>

		<br>

		<table style=\"width:100%; border-collapse: collapse; font-size: 12px;\" border=\"1\">
	
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\">Fecha de solucion</td>
					<td  style=\"text-align: left;\">".$model->fecha_solucion."</td>
				</tr>
				
			
				<tr>
					<td  style=\"background-color: rgb(204, 204, 204)\;text-align: center;\" colspan=2>Solucion</td>
					
				</tr>

				<tr>
					
					<td  style=\"text-align: left; \" colspan=2><div style=\"width=60; height=60;\">".$solucionturno."</div></td>
				</tr>
	
		
		</table>
	</center>
	<p style=\"font-size: 11px;\">Para el desahogo de este asunto devuelva el Turno al área de control, anotando la solución y en su caso, anexando copia del escrito de respuesta.</p>
";

 
		
        return $html;
	}



 

}