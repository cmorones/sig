<!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Bandeja</a></li>
                                    <li class="active">Entrada</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">
                            
                            <div class="main-content">
                               
<a href="<?php echo CController::createUrl('entradaView/admin'); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Regresar</a>



                            

                                <div class="row">
                                    <div class="col-md-12">
                                              <div class="widget widget-table">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-desktop"></i> COORESPONDENCIA DE ENTRADA</h3>
                                                <div class="btn-group widget-header-toolbar">
                                                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                                </div>
                                                <div class="btn-group widget-header-toolbar">
                                                   
                                                </div>
                                            </div>
                                            <div class="widget-content">
  <?php $this->renderPartial('_form3', array('model'=>$model,'id'=>$id)); ?>


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

