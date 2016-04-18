   <?php
    $link = Yii::app()->request->baseUrl; ///docto/Manual_UsuarioSigedo_2016.pdf
   ?>

   <script>

   function alerta(){
                //un alert
                alertify.alert("<h1><b>Aviso importante!!!</b></h1> <h2>Se han habilitado los informes, se generán por criterios de busqueda y se pueden exportar a excel.</h2>", function () {
                    //aqui introducimos lo que haremos tras cerrar la alerta.
                    //por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
                    ok();
                });
            }

    function ok(){
                alertify.success("Consulta el manual de  <a href=\"<? echo Yii::app()->request->baseUrl;?>/docto/Manual_UsuarioSigedo_2016.pdf\" style=\"color:white;\" target=\"_blank\"><b>Usuario.</b></a>"); 
                return false;
            }

    alerta();
   </script>

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
                                            <!--<div class="widget-content">
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
                                            </div>-->
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