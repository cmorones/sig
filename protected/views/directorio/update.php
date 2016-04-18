    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                    <li class="active">Dashboard</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">
                           
                            <div class="main-content">
                               

                              <a href="<?php echo CController::createUrl('directorioView/admin'); ?>" class="btn-sm btn btn-info pull-left"><i class="glyphicon glypicon-plus"></i>Regresar</a>


                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                      
<?php $this->renderPartial('_form2', array('model'=>$model)); ?>
                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->


