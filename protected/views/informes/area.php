    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                  
                        <!-- main -->
                        <div class="content">
                            <div class="main-header">
                                <h2><?php echo $area; ?></h2>
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
                                                <h3><i class="fa fa-desktop"></i> Detalle de correspondencia del Area</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                                <div class="btn-group widget-header-toolbar">
                                                    <div class="control-inline toolbar-item-group">
                                                        <span class="control-title">Total de oficios:</span>
                                                        <div class="label label-success"><i class="fa fa-caret-up"></i><?=$rem['cuenta'];?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content">
                                                <table id="visit-stat-table" class="table table-sorting table-striped table-hover datatable">
                                                    
													                             <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th colspan="3">Remitente</th>
                                                            <th colspan="3">Destinatario</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>Numero de Documento</th>
                                                            <th>Fecha</th>
                                                             <th>folio</th>
                                                            <th>tipo</th>
                                                            <th>fecha de Acuse</th>
                                                            <th>Asunto</th>
                                                            <th>Area </th>
                                                            <th>Cargo</th>
                                                            <th>Nombre</th>
                                                            <th>Area </th>
                                                            <th>Cargo</th>
                                                            <th>Nombre</th>
                                                            <th>Estado</th>
                                                        
                                                        </tr>
                                                    </thead>
                                                    

                                                    <?php

                                                  

                                                    foreach ($resultado as $key => $row) {

                                                       /* $sql2 = "SELECT 
                                                                      datos_personales.nombre, 
                                                                      datos_personales.apellido_p, 
                                                                      datos_personales.apellido_m, 
                                                                      directorio.cargo, 
                                                                      areas.nombre as nomarea,
                                                                      areas.id as id_area
                                                                    FROM 
                                                                      public.datos_personales, 
                                                                      public.directorio, 
                                                                      public.areas
                                                                    WHERE 
                                                                      directorio.id_dp = datos_personales.id AND
                                                                      directorio.id_area = areas.id AND
                                                                      directorio.id =$rem"; 
                                                        $rem = Yii::app()->db->createCommand($sql2)->queryRow();
                                                        */

                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?=$value['nombre']?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                     
                                                    </tbody>

                                                    <?php 
                                                }

                                                ?>
                                                 <thead>
                                                        <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END WIDGET TABLE -->

                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>


                      
                    </div>
                    <!-- /content-wrapper -->