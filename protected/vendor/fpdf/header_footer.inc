<?php

require_once("../class/DataBase.php");
require_once("../class/DBAlmacen.php");
require_once("../class/DB_RecursosHumanos.php");

/**
 * Class extention for Header and Footer Definitions
 *
 */
class pdf_usage extends fpdf_table
{
	
	public function Header()
	{
	//$fecha1 = $_POST['fecha1'];
//$fecha2 = $_POST['fecha2'];
        //Logo
        $this->Image('../img/angel.jpg', 10, 10, 35);
       // $this->Image('../img/iems2.jpg', 175, 10, 18);
     //   $this->Image('../img/linea.jpg', 50, 8, 0);

        //Arial bold 15
        $this->SetFont('Helvetica', 'B', 10);
        $this->SetTextColor(128, 128, 128);
        //Movernos a la derecha
   
        $this->Cell(40);
        $this->Cell(0, 25, utf8_decode('Instituto de Educación Media Superior del DF'), 0, 0, 'L');
        $this->Ln(2);
        $this->Cell(40);

        $this->Cell(0, 30,  utf8_decode('Dirección de Informática y Telecomunicaciones'), 0, 0, 'L');
        //Salto de l�nea
        $this->Ln(35);

        $this->Cell(10);
        $this->SetTextColor(10, 20, 50);
        //T�tulo
        $this->Cell(0, 0, 'REPORTE DE SERVICIO', 0, 0, 'C');
        //Salto de línea
        $this->Ln(8);
	}

            function folio() {
        //T�tulo
        //$nom_dependencia = $_SESSION['dependencianom'];
        $this->id = $_GET['id'];
        $DATABASE = new DataBase();
        $nombrerpt = $DATABASE->getReporteSeg($this->id);

        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(217, 49, 17);
        $this->Cell(170, 6, "Folio:$nombrerpt[8]", 0, 1, 'R', 1);
         $this->SetFont('Arial', '', 12);
         $this->SetTextColor(66, 66, 66);
        $this->Cell(170, 6, "Fecha:$nombrerpt[4]", 0, 1, 'R', 1);


        $this->Ln(5);
        //Guardar ordenada
        $this->y0 = $this->GetY();
    }
	

    function Footer() {

          $this->id = $_GET['id'];
        $ALMACEN = new DBAlmacen();
        $DATABASE = new DataBase();
        $RH = new DB_RecursosHumanos();
        $nombrerpt = $DATABASE->getReporteSeg($this->id);
       // $datosuser = $RH->traerDatosGeneralesEmpleado($nombrerpt[2]);
       // $datosuser2 = $RH->traerDatosGeneralesEmpleadoID($nombrerpt[11]);
        $datosuser = $DATABASE->getReporteObs($_GET['id']);
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
      //  $this->Cell(0,4,"$datosuser[0] $datosuser[1] $datosuser[2]",0,0,'L');//
         $this->Cell(0,4,"$datosuser[1]",0,0,'L');
        $this->Cell(-60); //Mueve el cursor a la posición -60 de DER a IZQ "Valor 0 a la derecha"
    //    $this->Cell(0,4,"$datosuser2[0] $datosuser2[1] $datosuser2[2]",0,1,'C');
         $this->Cell(0,4,"$datosuser[2]",0,1,'C');

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
        $this->Cell(0, 4, utf8_decode('Fecha de Impresión:') . date("d/m/Y") . '', 0, 1, 'R', 0);
        $this->Cell(0, 4,  utf8_decode('Hora de Impresión:') . date("H:i:s") . '', 0, 1, 'R', 0);
        //N�mero de p�gina
        $this->Cell(0, 10, '', 0, 0, 'C');
        $this->Ln(4);
    }
} 

?>