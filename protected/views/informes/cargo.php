    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                    <li class="active">Dashboard</li>
                                </ul>
                            </div>
                            <div class="col-md-8 ">
                                <div class="top-content">
                                    <ul class="list-inline mini-stat">
                                       <li>
                                            <h5>POR CONFIRMAR<span class="stat-value stat-color-orange"><i class="fa fa-plus-circle"></i> <?php echo $sinconfirmar ?></span></h5>
                                            <span id="mini-bar-chart0" class="mini-bar-chart"></span>
                                        </li>
                                        <li>
                                            <h5>ENTRADAS<span class="stat-value stat-color-orange"><i class="fa fa-plus-circle"></i> <?php echo $entradas ?></span></h5>
                                            <span id="mini-bar-chart1" class="mini-bar-chart"></span>
                                        </li>
                                        <li>
                                            <h5>SALIDAS <span class="stat-value stat-color-blue"><i class="fa fa-plus-circle"></i><?php echo $salidas ?></span></h5>
                                            <span id="mini-bar-chart2" class="mini-bar-chart"></span>
                                        </li>
                                        <li>
                                            <h5>TURNOS <span class="stat-value stat-color-seagreen"><i class="fa fa-plus-circle"></i><?php echo $turnos ?></span></h5>
                                            <span id="mini-bar-chart3" class="mini-bar-chart"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                                            <div class="widget-content">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart green" data-percent="82.9">
                                                            <span class="percent">70</span>
                                                        </div>
                                                        <p class="text-center">Porcentaje de Correspondencia por confirmar</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart red" data-percent="22">
                                                            <span class="percent">22</span>
                                                        </div>
                                                        <p class="text-center">Porcentaje de Correspondencia Recibida</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart yellow" data-percent="65">
                                                            <span class="percent">65</span>
                                                        </div>
                                                        <p class="text-center">Porcentaje de correspondencia enviada</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart red" data-percent="87">
                                                            <span class="percent">87</span>
                                                        </div>
                                                        <p class="text-center">Porcentaje de turnos solucionados</p>
                                                    </div>
                                                </div>
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
                                                            <th>Area remitente</th>
                                                            <th>Por Confirmar</th>
                                                            <th>Confirmados</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>

                                                    <?php

                                                  


                                                    $query ="SELECT 
                                                                  distinct direm.id_area, 
                                                                  areas.nombre
                                                                FROM 
                                                                  public.correspondencia, 
                                                                  public.documentos, 
                                                                  public.directorio, 
                                                                  public.directorio as direm, 
                                                                  public.areas
                                                                WHERE 
                                                                  correspondencia.destinatario = directorio.id_area AND
                                                                  documentos.id = correspondencia.id_docto AND
                                                                  documentos.remitente = direm.id AND
                                                                  direm.id_area = areas.id AND
                                                                  documentos.estado = 1 AND
                                                                  directorio.id_area = $id_area order by nombre";

                                                    $resultrem=Yii::app()->db->createCommand($query)->queryAll();

                                                     foreach ($resultrem as $value) {

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


                           <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                        <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> Turnos Generados</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                                <div class="btn-group widget-header-toolbar">
                                                    <div class="control-inline toolbar-item-group">
                                                        <span class="control-title">Total de Turnos:</span>
                                                        <div class="label label-success"><i class="fa fa-caret-up"></i> 12345%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content">
                                                <table id="visit-stat-table" class="table table-sorting table-striped table-hover datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Asignado a:</th>
                                                            <th>Puesto</th>
                                                            <th>Turnos Pendientes</th>
                                                            <th>Turnos solucionados</th>
                                                             <th>Total</th>
                                                            

                                                        </tr>
                                                    </thead>

                                                      <?php

                                                  


                                                    $query ="SELECT 
                                                              distinct datos_personales.nombre, 
                                                              datos_personales.apellido_p, 
                                                              datos_personales.apellido_m, 
                                                              turnos.destinatario
                                                            FROM 
                                                              public.turnos, 
                                                              public.directorio, 
                                                              public.datos_personales
                                                            WHERE 
                                                              turnos.destinatario = directorio.id AND
                                                              directorio.id_dp = datos_personales.id AND
                                                              directorio.id_area = $id_area AND 
                                                              turnos.estado=1 AND 
                                                              directorio.status = 1";

                                                    $resultrem=Yii::app()->db->createCommand($query)->queryAll();

                                                     foreach ($resultrem as $value) {

                                                        ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?=$value['nombre']?> <?=$value['apellido_p']?> <?=$value['apellido_m']?></td>
                                                            <td>Macintosh</td>
                                                            <td>360</td>
                                                            <td>82.78%</td>
                                                        </tr>
                                                     
                                                    </tbody>
                                                    <?php
                                                }

                                                ?>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- END WIDGET TABLE -->

                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->