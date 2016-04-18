    <!-- content-wrapper -->
                    <div class="col-md-10 content-wrapper">
                        <div class="row">
                            <div class="col-md-4 ">
                                <ul class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                    <li class="active">Turnos</li>
                                </ul>
                            </div>
                       
                        </div>
                        <!-- main -->
                        <div class="content">

<button class="btn-sm btn btn-info pull-left" onclick="javascript:history.back();">Regresar</button>
<br>

                           
                            <div class="main-content">
                               

                            

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                      

<?php echo $this->renderPartial('_seg', array('model'=>$model)); ?>
                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->

