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
                                      
<?php $this->renderPartial('_form', array('model'=>$model,
			//'id_area'=>$id_area,
			//'rem'=>$rem,
			//'listTurno'=>$listTurno,
			//'banderas'=>$banderas,
			//'caracter'=>$caracter,
			)); ?>
                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->



