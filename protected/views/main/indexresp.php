    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                                    <li class="active">Principal</li>
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

                               
                               $perfil = Yii::app()->user->perfil;

                           //    if($perfil==1) {    
                              ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                        <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> Detalle de correspondencia</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                                <div class="btn-group widget-header-toolbar">
                                                    <div class="control-inline toolbar-item-group">
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="widget-content">
                                                <table id="visit-stat-table" class="table table-sorting table-striped table-hover datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Cargo</th>
                                                            <th>Por Confirmar</th>
                                                            <th>Entradas</th>
                                                            <th>Salidas</th>
                                                            <th>Turnos</th>
                                                        </tr>
                                                    </thead>

                                                    <?php

                                                  


                                                    $query ="SELECT 
                                                              distinct 
                                                              directorio.id_area,
                                                              directorio.id, 
                                                              directorio.cargo,
                                                              datos_personales.nombre, 
                                                              datos_personales.apellido_p, 
                                                               datos_personales.apellido_m 
                                                            FROM 
                                                              public.correspondencia, 
                                                              public.directorio,
                                                              public.datos_personales
                                                            WHERE 
                                                              correspondencia.destinatario = directorio.id AND
                                                              directorio.id_dp = datos_personales.id AND
                                                              directorio.status=1 and 
                                                              directorio.id_area = $id_area";

                                                    $resultrem=Yii::app()->db->createCommand($query)->queryAll();

                                                    $sinconfirmart =0;
                                                    $confirmadost =0;
                                                    $salidast=0;
                                                    $turnost=0;

                                                     foreach ($resultrem as $value) {

                                                    
                                                    $sqlin ="SELECT 
                                                                  count(correspondencia.id) as sinconfirmar
                                                                FROM 
                                                                  public.correspondencia, 
                                                                  public.directorio
                                                                WHERE 
                                                                  correspondencia.destinatario = directorio.id AND
                                                                  directorio.id_area = $id_area AND
                                                                  directorio.id = $value[id] AND
                                                                  correspondencia.estado=1 AND 
                                                                  correspondencia.estado_acuse = 0";

                                                    $sinconfirmar = Yii::app()->db->createCommand($sqlin)->queryRow();

                                                    $sqlin ="SELECT 
                                                                  count(correspondencia.id) as confirmados
                                                                FROM 
                                                                  public.correspondencia, 
                                                                  public.directorio
                                                                WHERE 
                                                                  correspondencia.destinatario = directorio.id AND
                                                                  directorio.id_area = $id_area AND
                                                                  directorio.id = $value[id] AND
                                                                  correspondencia.estado=1 AND 
                                                                  correspondencia.estado_acuse = 1";

                                                    $confirmados = Yii::app()->db->createCommand($sqlin)->queryRow();


                                                     $sqlin ="SELECT 
                                                                  count(documentos.id) as salidas
                                                                FROM 
                                                                  public.documentos, 
                                                                  public.directorio
                                                                WHERE 
                                                                  documentos.remitente = directorio.id AND
                                                                  directorio.id_area = $id_area AND
                                                                  directorio.id = $value[id] AND
                                                                  documentos.estado=1";

                                                    $salidas = Yii::app()->db->createCommand($sqlin)->queryRow();


                                                    $sqlin ="SELECT 
                                                                  count(turnos.id) as turnos
                                                                FROM 
                                                              public.turnos, 
                                                              public.directorio, 
                                                              public.datos_personales
                                                            WHERE 
                                                              turnos.destinatario = directorio.id AND
                                                              directorio.id_dp = datos_personales.id AND
                                                              directorio.id_area = $id_area AND 
                                                              directorio.id = $value[id] AND 
                                                              turnos.estado=1 AND 
                                                              directorio.status = 1";

                                                    $turnos = Yii::app()->db->createCommand($sqlin)->queryRow();
                                                    
                                                    $sinconfirmart = $sinconfirmart + $sinconfirmar['sinconfirmar'];
                                                    $confirmadost = $confirmadost + $confirmados['confirmados'];
                                                    $salidast = $salidast + $salidas['salidas'];
                                                    $turnost = $turnost + $turnos['turnos'];
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?=$value['nombre']?> <?=$value['apellido_p']?> <?=$value['apellido_m']?></td>
                                                            <td><?=$value['cargo']?></td>
                                                            <td align="right"><?=$sinconfirmar['sinconfirmar']?></td>
                                                            <td align="right"><?=$confirmados['confirmados']?></td>
                                                            <td align="right"><?=$salidas['salidas']?></td>
                                                            <td align="right"><?=$turnos['turnos']?></td>
                                                            
                                                        </tr>
                                                     
                                                    </tbody>

                                                    <?php 
                                                }

                                                ?>
                                                 <thead>
                                                        <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            <th class="tdt"><?=$sinconfirmart?></th>
                                                            <th class="tdt"><?=$confirmadost?></th>
                                                            <th class="tdt"><?=$salidast?></th>
                                                            <th class="tdt"><?=$turnost?></th>
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

                        <?php
               //     }
                    ?>

                   


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
                                                              turnos.destinatario,
                                                              directorio.cargo,
                                                              directorio.id
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

                                                    $turnos0 =0;
                                                    $turnos1 =0;
                                                    $turnostota =0;

                                                     foreach ($resultrem as $value) {

                                                     $sqlin ="SELECT 
                                                                  count(turnos.id) as turnos
                                                                FROM 
                                                              public.turnos, 
                                                              public.directorio, 
                                                              public.datos_personales
                                                            WHERE 
                                                              turnos.destinatario = directorio.id AND
                                                              directorio.id_dp = datos_personales.id AND
                                                              directorio.id_area = $id_area AND 
                                                              directorio.id = $value[id] AND 
                                                              turnos.estado=1 AND 
                                                              turnos.estado_sol=0 AND
                                                              directorio.status = 1";

                                                    $turnos = Yii::app()->db->createCommand($sqlin)->queryRow(); 


                                                     $sqlin ="SELECT 
                                                                  count(turnos.id) as turnossol
                                                                FROM 
                                                              public.turnos, 
                                                              public.directorio, 
                                                              public.datos_personales
                                                            WHERE 
                                                              turnos.destinatario = directorio.id AND
                                                              directorio.id_dp = datos_personales.id AND
                                                              directorio.id_area = $id_area AND 
                                                              directorio.id = $value[id] AND 
                                                              turnos.estado=1 AND 
                                                              turnos.estado_sol=1 AND
                                                              directorio.status = 1";

                                                    $turnossol = Yii::app()->db->createCommand($sqlin)->queryRow(); 

                                                    $totalturnos =  $turnos['turnos'] + $turnossol['turnossol'] ;

                                                        ?>
                                                    <tbody>
                                                        <tr>
                                                            <td ><?=$value['nombre']?> <?=$value['apellido_p']?> <?=$value['apellido_m']?></td>
                                                            <td ><?=$value['cargo']?></td>
                                                            <td align="right"><?=$turnos['turnos']?></td>
                                                            <td align="right"><?=$turnossol['turnossol']?></td>
                                                            <td align="right"><?=$totalturnos?></td>
                                                        </tr>
                                                     
                                                    </tbody>
                                                    <?php
                                                    $turnos0 = $turnos0 + $turnos['turnos'];
                                                    $turnos1 = $turnos1 + $turnossol['turnossol'];
                                                    $turnostotal = $turnos0 + $turnos1;
                                                }

                                                  if (isset($turnostotal)){
                                                  
                                                }else {
                                                  $turnostotal=0;
                                                }

 

                                                ?>
                                                 <thead>
                                                        <tr>
                                                            <th>Total</th>
                                                            <th></th>
                                                            
                                                            <th class="tdt"><?=$turnos0?></th>
                                                            <th class="tdt"><?=$turnos1?></th>
                                                            <th class="tdt"><?=$turnostotal?></th>
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
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->