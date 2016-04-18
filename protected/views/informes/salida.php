    <!-- content-wrapper -->
                    <div class="col-md-12 content-wrapper">
                  
                        <!-- main -->
                        <div class="content">
                            <div class="main-header">
                                <h2><?php //echo $area; ?></h2>
                                <em>Informacion Estadistica del Área</em>
                                

                            </div>
                            <div class="main-content">
                                <div class="row">
                                    <div class="col-md-9">
                                        <!-- WIDGET NO HEADER -->
                                        <div class="widget widget-hide-header">
                                            <div class="widget-header hide">
                                                <h3>Summary Info</h3>
                                            </div>
                                  
                                        </div>
                                        <!-- WIDGET NO HEADER -->
                                    </div>
                                   
                                </div>

                            <?php

                              $id_area = Yii::app()->user->id_area;

                               $sql2 ="SELECT 
                                                                  count(correspondencia.id) as cuenta 
                                                                FROM 
                                                                  public.correspondencia, 
                                                                  public.documentos, 
                                                                  public.directorio, 
                                                                  public.directorio as direm
                                                                 
                                                                WHERE 
                                                                  correspondencia.destinatario = directorio.id_area AND
                                                                  documentos.id = correspondencia.id_docto AND
                                                                  documentos.remitente = direm.id AND
                                                                  documentos.estado = 1 AND
                                                                  correspondencia.estado = 1 AND
                                                                  directorio.id_area = $id_area";
                                $rem = Yii::app()->db->createCommand($sql2)->queryRow();

                              ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                        <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> <?=$titulo?></h3>
                                               
                                                <div class="btn-group widget-header-toolbar">
                                                    <div class="control-inline toolbar-item-group">
                                                      
                                                   <div id="btnExport"><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png')?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="widget-content">
                                            <div id="datos" >
                                                <table id="visit-stat-table" class="table table-sorting table-striped table-hover datatable">
                                                    
													 <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th ></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th colspan="3">Remitente</th>
                                                            <th colspan="3">Destinatario</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>Numero de Documento</th>
                                                            <th>Fecha_Documento</th>
                                                             <th>folio</th>
                                                            <th>tipo</th>
                                                            <th>FechaAcuse</th>
                                                            <th>Asunto</th>
                                                            <th>Area </th>
                                                            <th>Cargo</th>
                                                            <th>Nombre</th>
                                                            <th>Area </th>
                                                            <th>Cargo</th>
                                                            <th>Nombre</th>
                                                         
                                                        
                                                        </tr>
                                                    </thead>
                                                    

                                                   
                                                  
  <?php

                                                  


                                                    $query ="SELECT 
  documentos.documento, 
  documentos.fecha, 
  documentos.asunto, 
  correspondencia.folio, 
  correspondencia.fecha_acuse, 
  nombredoc.nombre as nomdoc, 
  directorio.cargo, 
  datos_personales.nombre as nombrerem, 
  datos_personales.apellido_p as apprem, 
  datos_personales.apellido_m as apmrem, 
  datosdest.nombre as nombredest, 
  datosdest.apellido_p as appdest, 
  datosdest.apellido_m as apmdest,  
  directoriodest.cargo as cargodest,
  areas.nombre as nombrearea,
  areas2.nombre as nombreareadest
FROM 
  public.documentos, 
  public.correspondencia, 
  public.directorio, 
  public.tipo_doc nombredoc, 
  public.datos_personales, 
  public.directorio directoriodest, 
  public.datos_personales datosdest,
  public.areas,
  public.areas areas2
WHERE 
  documentos.remitente = directorio.id AND
  documentos.id = correspondencia.id_docto AND
  correspondencia.destinatario = directoriodest.id AND
  directorio.id_dp = datos_personales.id AND
  nombredoc.id = documentos.tipo_docto AND
  directoriodest.id_dp = datosdest.id AND
  directoriodest.id_area = areas2.id AND
  areas.id = directorio.id_area AND
  directorio.id_area = $id_area AND 
  documentos.estado = 1
  order by documentos.id desc limit 100";

                                                    $resultrem=Yii::app()->db->createCommand($query)->queryAll();
$cuenta=0;
                                                     foreach ($resultrem as $value) {

                                                    

                                                

                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?=$value['documento']?></td>
                                                            <td><?=$value['fecha']?></td>
                                                            <td><?=$value['folio']?></td>
                                                            <td><?=$value['nomdoc']?></td>
                                                             <td><?=$value['fecha_acuse']?></td>
                                                             <td><?=$value['asunto']?></td>
                                                             <td><?=$value['nombrearea']?></td>
                                                            <td><?=$value['cargo']?></td>
                                                             <td><?=$value['nombrerem']?> <?=$value['apprem']?> <?=$value['apmrem']?></td>
                                                             <td><?=$value['nombreareadest']?></td>
                                                            <td><?=$value['cargodest']?></td>
                                                             <td><?=$value['nombredest']?> <?=$value['appdest']?> <?=$value['apmdest']?></td>
                                                        </tr>
                                                     
                                                    </tbody>

                                                    <?php 
                                                    $cuenta++;
                                                }

                                                ?>
                                               
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET TABLE -->

                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>


                      
                    </div>
                    <!-- /content-wrapper -->

                     <script>
    $(document).ready(function() {
    $("#btnExport").click(function(e) {
        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('datos');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'correspondencia_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
    });
});
    </script>