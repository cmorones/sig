    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                                    <li class="active">Correspondencia</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">
                           
                            <div class="main-content">
                               
<a href="<?php echo CController::createUrl('salidaView/admin'); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Regresar</a>

                            

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                      
<?php $this->renderPartial('_form2', array('model'=>$model,
										'caracter'=>$caracter,
                                        'acuse'=>$acuse,
                                        'idc'=>$idc,
									)); ?>
                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->
