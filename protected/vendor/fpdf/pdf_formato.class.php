<?php
//include_once ("fthis/class.fpdf.php");

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pdf_formato
 *
 * @author cesar
 */
class pdf_formato extends FPDF {
    //put your code here
    
       //public $id_persona = 0;
      
     function __construct(){
            parent::__construct('P', 'mm', 'letter');
          
        }
	public function generaDocumento($ticket,$document){            
            //$this->Open();
            $this->SetAutoPageBreak(TRUE, 15);
           // $this->AliasNbPages();
            $this->AddPage();   
            $this->titulo($ticket,$document);
            $this->DatosUsuario($ticket);
            $this->Footer();            
            $this->Output();    // mandamos al browser
        }
        
        
     	public function Header()
	{
	            
        $this->Image('../img/angel.jpg', 5, 10, 30);
      //  $this->Image('../img/iems2.jpg', 175, 10, 18);
       // $this->Image('../img/linea.jpg', 50, 8, 0);

        //Arial bold 15
        $this->SetFont('Helvetica', 'B', 12);
        $this->SetTextColor(128, 128, 128);
        //Movernos a la derecha
     //   $this->Cell(45);
        //T�tulo
       // $this->Cell(0, 20, 'Gobierno del Distrito Federal', 0, 0, 'L');
       // $this->Ln(2);
        $this->Cell(40);
        $this->Cell(0, 25, utf8_decode('Instituto de Educación Media Superior'), 0, 0, 'L');
        $this->Ln(2);
        $this->Cell(40);

        $this->Cell(0, 30,  utf8_decode('Dirección de Informática y Telecomunicaciones'), 0, 0, 'L');
        //Salto de l�nea
        $this->Ln(25);

        $this->Cell(10);
        $this->SetTextColor(10, 20, 50);
        //T�tulo
        $this->Cell(0, 0, 'REPORTE DE SERVICIO', 0, 0, 'C');
        //Salto de línea
        $this->Ln(8);


	}
        
        public function titulo($folio,$document){

       //$folio = print_r($folio);
        
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(217, 49, 17);
        $this->Cell(170, 6, "Folio:$folio[0]", 0, 1, 'R', 1);
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(66, 66, 66);
        $this->Cell(170, 6, "Ref:$document[0]-$folio[1]", 0, 1, 'R', 1);
        $this->SetTextColor(66, 66, 66);
        $this->Cell(170, 6, "Fecha:$folio[2]", 0, 1, 'R', 1);


        $this->Ln(5);
           
        }
        
      public function DatosUsuario($array){
               
        //$this->y0 = $this->GetY();
        
        $header = array('Area Solicitante:', 'Usuario:', 'Atiende:', 'Ing:');
        $this->SetFillColor(237, 237, 237);
        $this->SetTextColor(10, 20, 50);
        $this->SetFont('', 'B', 8);
         
       

        $w = array(30, 100);
      /*  $this->Cell($w[0], 5, $header[0], 0, 0, 'R', 1);
        $this->SetFillColor(255, 255, 255);
        $this->Cell($w[1], 5, $ALMACEN->getNombrePlantelSeg($nombrerpt[0]), 0, 1, 'L', 1);
*/
        $this->SetFillColor(237, 237, 237);
        $this->Cell($w[0], 5, $header[0], 0, 0, 'R', 1);
        $this->SetFillColor(255, 255, 255);
        $this->Cell($w[1], 5,  "", 0, 1, 'L', 1);

        $this->SetFillColor(237, 237, 237);
        $this->Cell($w[0], 5, $header[1], 0, 0, 'R', 1);
        $this->SetFillColor(255, 255, 255);
        $this->Cell($w[1], 5, "sdfsd", 0, 1, 'L', 1);

        $this->SetFillColor(237, 237, 237);
        $this->Cell($w[0], 5,"sdfsd", 0, 0, 'R', 1);
        $this->SetFillColor(255, 255, 255);
        $this->Cell($w[1], 5, "sdfsdf", 0, 1, 'L', 1);

         $this->SetFillColor(237, 237, 237);
        $this->Cell($w[0], 5, "sdfsd", 0, 0, 'R', 1);
        $this->SetFillColor(255, 255, 255);
        $this->Cell($w[1], 5, "sdfsd", 0, 1, 'L', 1);


        $this->Ln();

        
           
        }
        
         public function DatosPersonales(){
        $descripcion ="Datos Personales";
        $descripcion = mb_convert_encoding("$descripcion", 'ISO-8859-1', 'UTF-8');
        $this->SetFillColor(255, 255, 255);
           $this->SetTextColor(0,0, 0);
           $this->SetFont('Arial', '', 8);
           $this->MultiCell(195, 3, $descripcion, '0', 1, 'L', 1);
         //  $this->Ln(1);
           $x1=200;
           $y1=100;
           $x2=10;
           $y2=100;
           $this->Line($x1, $y1, $x2, $y2);
            $this->Ln(8);
           
        }
        
        public function DatosDomicilio(){
        $descripcion ="Datos Domicilio";
        $descripcion = mb_convert_encoding("$descripcion", 'ISO-8859-1', 'UTF-8');
        $this->SetFillColor(255, 255, 255);
           $this->SetTextColor(0,0, 0);
           $this->SetFont('Arial', '', 8);
           $this->MultiCell(195, 3, $descripcion, '0', 1, 'L', 1);
         //  $this->Ln(1);
           $x1=200;
           $y1=120;
           $x2=10;
           $y2=120;
           $this->Line($x1, $y1, $x2, $y2);
            $this->Ln(8);
           
        }
        
              
        public function DatosDocumentos(){
        $descripcion ="Datos Documentos";
        $descripcion = mb_convert_encoding("$descripcion", 'ISO-8859-1', 'UTF-8');
         $this->Ln(60);
        $this->SetFillColor(255, 255, 255);
           $this->SetTextColor(0,0, 0);
           $this->SetFont('Arial', '', 8);
           $this->MultiCell(195, 3, $descripcion, '0', 1, 'L', 1);
         //  $this->Ln(1);
           $x1=200;
           $y1=140;
           $x2=10;
           $y2=140;
           $this->Line($x1, $y1, $x2, $y2);
            $this->Ln(45);
           
        }
        
              public function DatosMensaje(){
        $descripcion ="Los datos personales recabados serán protegidos, incorporados y tratados en el Sistema de Datos Personales denominado Sistema Integral de Información Educativa del SBGDF en el IEMS, el cual tiene su fundamento en los artículos 87, 97, 98, 99 y 100 del Estatuto de Gobierno del Distrito Federal; 48, 54 y 71 fracción XI de la Ley Orgánica de la Administración Pública del Distrito Federal; Primero del Decreto por el que se Crea un Organismo Público Descentralizado Denominado Instituto de Educación Media Superior del Distrito Federal; 1, 2 y 12 del Estatuto Orgánico del Instituto de Educación Media Superior del Distrito Federal; 13, 14, 15 y Cuarto Transitorio de la Ley de Protección de Datos Personales para el Distrito Federal y 1, 2, 3, 4, 5, 10 de la Ley de Archivos del Distrito Federal, Reglas Generales de Control Escolar, cuya finalidad es contar con datos personales del estudiante que permitan automatizar procesos y facilitar los trámites escolares y podrán ser trasmitidos al Sistema Integral de Información Educativa del SBGDF en el IEMS y algunos datos pueden ser transmitidos a la Secretaría de Educación del Distrito Federal, además otras transmisiones previstas en la Ley de Protección de Datos Personales para el Distrito Federal. El responsable del Sistema de Datos Personales es el C. Abel Bravo Camacho, JUD de Administración de Bases de Datos y la dirección donde podrá ejercer los derechos de acceso, rectificación, cancelación y oposición, así como la revocación del conocimiento es en la calle San Lorenzo número 290, Colonia Del Valle Sur, Delegación Benito Juárez, C. P. 03100, México, D.F. El titular de los datos podrá dirigirse al Instituto de Acceso a la Información Pública del Distrito Federal, donde recibirá asesoría sobre los derechos que tutela la Ley de Protección de Datos Personales para el Distrito Federal al teléfono: 56364636; correo electrónico: datos.personales@infodf.org.mx o www.infodf.org.mx ";
        $descripcion = mb_convert_encoding("$descripcion", 'ISO-8859-1', 'UTF-8');
        $this->SetFillColor(255, 255, 255);
           $this->SetTextColor(0,0, 0);
           $this->SetFont('Arial', '', 7);
           $this->MultiCell(195, 3, $descripcion, '0', 1, 'L', 1);
         //  $this->Ln(1);
           $x1=200;
           $y1=100;
           $x2=10;
           $y2=100;
           $this->Line($x1, $y1, $x2, $y2);
            $this->Ln(20);
           
        }
        
            function Footer() {

                 $this->id = $_GET['id'];
       $DATABASE = BaseDeDatos::getInstancia();
   /*      $query  = "SELECT id_plantel, id_area, id_usuario,
    fecha, observacion,
    status, prioridad, folio, asign,
    id_falla_usuario, id_login, estadofalla, estadosol, solicita, asign, atiende, coment FROM soporte.reportes where clave=$_GET[id]";
   
        $nombrerpt = $DATABASE->getRegistro($query);*/
      
       // $datosuser = $RH->traerDatosGeneralesEmpleado($nombrerpt[2]);
       // $datosuser2 = $RH->traerDatosGeneralesEmpleadoID($nombrerpt[11]);
  //      $datosuser = $DATABASE->getReporteObs($_GET['id']);
    //    $datosuser2 = $DATABASE->getReporteObs($_GET['id']);

        $this->Image('../img/ciudad2.jpg', 10, 260, 30);
        $this->Image('../img/iems2.jpg', 175, 255, 16);

         $this->SetY(-80);



        $this->SetFillColor(110, 110, 110);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('', 'B', 8);

        $this->Cell(190, 5, 'Firmas de conformidad:', '1', 1, 'C', 1);
        $this->Ln(5);

        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(-120);
        $this->Cell(0,4,'Solicita:',0,0,'C');//
        $this->Cell(-70); //Mueve el cursor a la posición -60 de DER a IZQ "Valor 0 a la derecha"
        $this->Cell(0,4,'Atiende:',0,1,'C');
        $this->Ln(10);

        $this->Cell(10);
        $this->Cell(0,4,'______________________________________',0,0,'L');//
        $this->Cell(-60); //Mueve el cursor a la posición -60 de DER a IZQ "Valor 0 a la derecha"
        $this->Cell(0,4,'______________________________________',0,1,'L');

         $this->Cell(15);
        $this->Cell(0,4,"nombres",0,0,'L');//
   //      $this->Cell(0,4,"x",0,0,'L');
        $this->Cell(-60); //Mueve el cursor a la posición -60 de DER a IZQ "Valor 0 a la derecha"
        $this->Cell(0,4,"nombres",0,1,'C');
   //      $this->Cell(0,4,"x",0,1,'C');

        $this->Ln(12);

        $this->SetFont('', 'B', 9);
        $this->Cell(0,4,utf8_decode('San Lorenzo No. 290  Col. Del Valle Sur Del. Benito Juárez'),0,1,'C');//
        $this->Cell(0,4,utf8_decode('C.P. 03100  Tel. 5636-2500 Ext. 309 y 310,'),0,1,'C');//
        $this->Cell(0,4,utf8_decode('Correo electrónico: iems@df.gob.mx'),0,1,'C');//


       /* $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(10, 20, 50);
        $this->Ln(25);


        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(15);
        $this->Cell(190, 6, ' ____________________________ ', 0, 1, 'L', 1);
         $this->Cell(25);
        $this->Cell(190, 6, 'Vo.Bo. ' . 'hola mundo1 ' . '', 0, 1, 'L', 1);


         $this->SetFont('Arial', '', 12);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(110);
        $this->Cell(190, 6, ' ____________________________ ', 0, 1, 'L', 1);
         $this->Cell(120);
        $this->Cell(190, 6, 'Vo.Bo. ' . 'hola mundo2 ' . '', 0, 1, 'L', 1);
*/

        //Posici�n: a 1,5 cm del final
      /*  $this->SetY(-30);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 12);
        //$this->SetFont('Arial','B',6);
         $this->Cell(60);
        $this->Cell(0, 6, ' ____________________________ ', 0, 1, 'R', 0);
      //   $this->Cell(-60);
        $this->Cell(0, 6,  'Vo.Bo. hola mundo2 ', 0, 1, 'R', 0);
        //N�mero de p�gina
        $this->Cell(0, 10, '', 0, 0, 'C');
        $this->Ln(4);

*/

        $this->Ln(1);
        //Posici�n: a 1,5 cm del final
      //  $this->SetY(-20);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 6);
        //$this->SetFont('Arial','B',6);
        $this->Cell(0, 4, utf8_decode('Fecha de Impresión:') . date("d/m/Y") . '', 0, 1, 'C', 0);
        $this->Cell(0, 4,  utf8_decode('Hora de Impresión:') . date("H:i:s") . '', 0, 1, 'C', 0);
        //N�mero de p�gina
        $this->Cell(0, 10, '', 0, 0, 'C');
        $this->Ln(4);
    }
}

?>
