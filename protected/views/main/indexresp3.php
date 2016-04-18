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


                            <?php

                            /*
                            Al ingresar los tres valores:

1) 255
2) 133
3) 87

Para sacar el porcentaje:

255+133+87 = 475 (que equivaldria al 100%)

Ya despues se sacaria el porcentaje de cada valor:


Para el Primero

255*100 = 25500
25500/475 = 53.68


Para el Segundo

133*100 = 13300
13300/475 = 28


Para el Tercero

87*100 = 8700
8700/475 = 18.31


*/
                            $id_area= Yii::app()->user->id_area;
                            $sql = "SELECT 
                                         count(correspondencia.id) as total
                                        FROM 
                                          public.correspondencia, 
                                          public.directorio
                                        WHERE 
                                          correspondencia.destinatario = directorio.id AND
                                          directorio.id_area = $id_area"; 
                            $x = Yii::app()->db->createCommand($sql)->queryRow();

                             $sql = "SELECT 
                                         count(correspondencia.id) as subtotal
                                        FROM 
                                          public.correspondencia, 
                                          public.directorio
                                        WHERE 
                                          correspondencia.destinatario = directorio.id AND
                                          correspondencia.estado_acuse=0 AND
                                          directorio.id_area = $id_area"; 
                            $y = Yii::app()->db->createCommand($sql)->queryRow();

                            $valor = $y['subtotal']*100;
                            $confirmado = $valor / $x['total'];


                            $sql = "SELECT 
                                         count(correspondencia.id) as subtotal
                                        FROM 
                                          public.correspondencia, 
                                          public.directorio
                                        WHERE 
                                          correspondencia.destinatario = directorio.id AND
                                          correspondencia.estado_acuse=1 AND
                                          directorio.id_area = $id_area"; 
                            $y2 = Yii::app()->db->createCommand($sql)->queryRow();

                            $valor2 = $y2['subtotal']*100;
                            $confirmado2 = $valor2 / $x['total'];


                            $sql = "SELECT 
                                         count(turnos.id) as total
                                        FROM 
                                          public.turnos, 
                                          public.directorio
                                        WHERE 
                                          turnos.destinatario = directorio.id AND
                                          directorio.id_area = $id_area"; 
                            $tturnos = Yii::app()->db->createCommand($sql)->queryRow();

                            $sql = "SELECT 
                                         count(turnos.id) as subtotal
                                        FROM 
                                          public.turnos, 
                                          public.directorio
                                        WHERE 
                                          turnos.destinatario = directorio.id AND
                                          turnos.estado_sol=0 AND
                                          directorio.id_area = $id_area"; 
                            $yturnos = Yii::app()->db->createCommand($sql)->queryRow();

                            $valor = $yturnos['subtotal']*100;
                            $turnos = $valor / $tturnos['total'];


                          
                            $sql = "SELECT 
                                         count(turnos.id) as subtotal
                                        FROM 
                                          public.turnos, 
                                          public.directorio
                                        WHERE 
                                          turnos.destinatario = directorio.id AND
                                          turnos.estado_sol=1 AND
                                          directorio.id_area = $id_area"; 
                            $yturnos2 = Yii::app()->db->createCommand($sql)->queryRow();

                            $valor2 = $yturnos2['subtotal']*100;
                            $turnos2 = $valor2 / $tturnos['total']


                            ?>
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
                                                        <div class="easy-pie-chart green" data-percent="<?=$confirmado?>">
                                                            <span class="percent"><?=$confirmado?></span>
                                                        </div>
                                                        <p class="text-center"><b>Porcentaje de Correspondencia confirmada</b></p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart red" data-percent="<?=$confirmado2?>">
                                                            <span class="percent"><?=$confirmado2?></span>
                                                        </div>
                                                        <p class="text-center"><b>Porcentaje de Correspondencia por confirmar</b></p>
                                                    </div>
                                                    <!--<div class="col-md-2">
                                                        <div class="easy-pie-chart red" data-percent="22">
                                                            <span class="percent">22</span>
                                                        </div>
                                                        <p class="text-center"><b>Porcentaje de Correspondencia Turnada y Solucionada</b></p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="easy-pie-chart yellow" data-percent="65">
                                                            <span class="percent">65</span>
                                                        </div>
                                                        <p class="text-center"><b>Porcentaje de Correspondencia Generada, Turnada y Solucionada</b></p>
                                                    </div>
                                                    -->
                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart green" data-percent="<?=$turnos?>">
                                                            <span class="percent"><?=$turnos?></span>
                                                        </div>
                                                        <p class="text-center"><b>Porcentaje de Turnos Solucionados</b></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="easy-pie-chart red" data-percent="<?=$turnos2?>">
                                                            <span class="percent"><?=$turnos2?></span>
                                                        </div>
                                                        <p class="text-center"><b>Porcentaje de Turnos No Solucionados</b></p>
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

                       

                        <?php
               //     }
                    ?>

                   

   
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->