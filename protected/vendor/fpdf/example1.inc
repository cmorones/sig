<?php

	//load the table default definitions DEFAULT!!!
	require("example1_def.inc");
	
	$columns = 4; //number of Columns

	
	//Initialize the table class
	$pdf->tbInitialize($columns, true, true);
	
	//set the Table Type
	$pdf->tbSetTableType($table_default_table_type);
	
	
	$aSimpleHeader = array();
	
	//Table Header
	
		$aSimpleHeader[0] = $table_default_header_type;
		$aSimpleHeader[0]['TEXT'] = "Num";
		$aSimpleHeader[0]['WIDTH'] = 10;

                $aSimpleHeader[1] = $table_default_header_type;
		$aSimpleHeader[1]['TEXT'] = "Fecha";
		$aSimpleHeader[1]['WIDTH'] = 20;

                $aSimpleHeader[2] = $table_default_header_type;
		$aSimpleHeader[2]['TEXT'] = "Diagnostico";
		$aSimpleHeader[2]['WIDTH'] = 40;

                $aSimpleHeader[3] = $table_default_header_type;
		$aSimpleHeader[3]['TEXT'] = "Solucion";
		$aSimpleHeader[3]['WIDTH'] = 120;


	

	//set the Table Header
	$pdf->tbSetHeaderType($aSimpleHeader);
	
	//Draw the Header
	$pdf->tbDrawHeader();

	//Table Data Settings
	$aDataType = Array();
	for ($i=0; $i<$columns; $i++) $aDataType[$i] = $table_default_data_type;

	$pdf->tbSetDataType($aDataType);

	$j=1;
		$data = Array();
		$data[0]['TEXT'] = "Line $j Text 1";
		$data[0]['T_ALIGN'] = "L";//default in the example is C
		$data[1]['TEXT'] = "Line $j Text 2";
		$data[2]['TEXT'] = "Line $j Text 3";
		$data[2]['T_ALIGN'] = "R";

            
		
		$pdf->tbDrawData($data);

        $j=2;
		$data = Array();
		$data[0]['TEXT'] = "Line $j Text 1";
		$data[0]['T_ALIGN'] = "L";//default in the example is C
		$data[1]['TEXT'] = "Line $j Text 2";
		$data[2]['TEXT'] = "Line $j Text 3";
                $data[2]['T_ALIGN'] = "R";
                $data[3]['TEXT'] = "TODO EL TEXT1 \n O TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTOTODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO TODO EL TEXTO";



		$pdf->tbDrawData($data);



	
	//output the table data to the pdf
	$pdf->tbOuputData();
	
	//draw the Table Border
	$pdf->tbDrawBorder();
	

?>