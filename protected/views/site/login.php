




        <div class="inner-page">
            
          
         <div class="subtitulo2" align="center">Sistema Integral de Gestión</div>

              
            <div class="login-box center-block">

                   <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                    'htmlOptions' => array('class' => 'form-horizontal', 'role'=>'form'),
                )); ?>

                
                    <p class="title">Acceso</p>
                    <div class="form-group">
                        <label for="username" class="control-label sr-only">Usuario</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                               <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'usuario')); ?>
                               <?php echo $form->error($model,'username'); ?>
                                
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                    <label for="password" class="control-label sr-only">Contraseña</label>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'password')); ?>
                                <?php echo $form->error($model,'password'); ?>
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-custom-primary btn-lg btn-block btn-auth"><i class="fa fa-arrow-circle-o-right"></i> Ingresar</button>
                 <?php $this->endWidget(); ?>

                
            </div>
        </div>

