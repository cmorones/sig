<?php
/* @var $this DocumentosController */
/* @var $model Documentos */
/* @var $form CActiveForm 

$('#nick').focusout( function(){
    if($('#nick').val()!= ""){
        $.ajax({
            type: "POST",
            url: "validar.php",
            data: "nick="+$('#nick').val(),
            beforeSend: function(){
              $('#msgUsuario').html('<img src="loader.gif"/> verificando');
            },
            success: function( respuesta ){
              if(respuesta == '1')
                $('#msgUsuario').html("Disponible");
              else
                $('#msgUsuario').html("No Disponible");
            }
        });
    }
});


     $('#btn').on('click', function () {
                                        $.confirm({
                                            title: 'Confirm!',
                                            content: 'Simple confirm!',
                                            confirm: function () {
                                                alert('Confirmed!');
                                            },
                                            cancel: function () {
                                                alert('Canceled!')
                                            }
                                        });
                                    });
 $.ajax({
                              type: 'POST',
                              url: 'index.php/api/buscar',
                              data: 'doc='+docform,
                              dataType: 'html',
                              error: function(){
                                    alert('error petición ajax');
                              },
                              success: function(data){                                                      
                                    $('#resultado').html(data);
                                    
                              }
                  });
*/


//$baseUrl = Yii::app()->request->baseUrl; 
//$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl.'/js/jquery-confirm.js');
$url_action = CHtml::normalizeUrl(array('api/acronimos'));
Yii::app()->clientScript->registerScript('btn', "
     
    var resultado;
    var existe=0;
    $(document).ready(function(){

    $('#rem').on('change', function() {
        
        $.getJSON('$url_action', function(result){
           $('#iddocto').val(result.acronimo);
        });
      
    });





    $('#documentos-form').on('submit', function(e){
        e.preventDefault();

        $('#btn').hide();

        var self = this;
        var rem = $('#rem').val();
        var dest = $('#dest').val();



        if(dest===rem){



                    $.alert({
                                    title: 'Aviso!!!!',
                                    content: 'Destinatario y remitente no pueden ser el mismo!!',
                                    confirmButton: 'Aceptar'
                                     
                      });
       $('#btn').show();
         return false;
        }



          



        

        var len = $('#iddocto').val().length;
        if (len == 0) {
            $.confirm({
                   title: 'No se ha registrado numero de oficio',
                    content: '<b>El sistema va generar un numero de documento??<b>',
                    confirmButton: 'Aceptar',
                      confirm: function () {
                       self.submit();
                      },
                      cancel: function () {
                                                $('#iddocto').focus();
                                                this.close();
                                                $('#btn').show();
                                                return false;
                                               
                                            }
                                        });
           
        } else {

             docform = $('#iddocto').val();

            $.ajax({
                url:'buscar',
                type: 'POST',
                data: {ajaxData: docform}, 
                success:function(result){
                    $('#resultado').text(result);
                     if(result=='1'){
                       

                            $.alert({
                                    title: 'Aviso!!!!',
                                    content: 'El documento ya ha sido registrado anteriormente!!',
                                    confirmButton: 'Aceptar',
                                    confirm: function () {
                                         $('#iddocto').focus();
                                          $('#btn').show();
                                         return false;
                                      },
                                    cancel: function(){
                                         $('#iddocto').focus();
                                         return false;
                                    }
                            });
                           
                            }else{
                              self.submit();  
                            }
                }
            });

        }


     
    });
});



", CClientScript::POS_READY);



?>
<div id="resultado"></div>

<?php if(Yii::app()->user->hasFlash('success')):?>
   

<div id='info2' class="alert alert-success">

<button class="close" type="button" data-dismiss="alert">×</button>
<strong> <?php echo Yii::app()->user->getFlash('success'); ?></strong>
</div>

<script type="text/javascript">
$("#info2").animate({opacity:1.0},10000).slideUp("slow");
</script>

<?php endif; ?>
<div id='info' >
 

</div>


    <!-- SUPPOR TICKET FORM -->
 <div class="widget">
                                            <div class="widget-header">
                                                <h3><i class="fa fa-edit"></i> Generar Correspondencia</h3>
                                            </div>
                                            <div class="widget-content">

                                                 

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'documentos-form',
    
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    //'enableAjaxValidation'=>true,
    //'enableClientValidation'=>true,
    'enableAjaxValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>true,
        ),
    'htmlOptions'=>array('class'=>'form-horizontal',
     'role'=>'form'),

)); ?>











                                         
                                                    <fieldset>
                                                        <legend>Informacion del Remitente</legend>
                                                        <div class="form-group">
                                                            <label for="ticket-type" class="col-sm-3 control-label"> <?php echo $form->labelEx($model,'remitente'); ?></label>
                                                            <div class="col-sm-9">
                                                               <?php 
 

/*      $baseUrl2 = YiiBase::getPathOfAlias("webroot");
        $menus= $baseUrl2.'/static/directorio.json';


        $datos = file_get_contents($menus);
        
        $destinatarios = json_decode($datos, true);*/
        

        $remitentes = array();
        $id_area = Yii::app()->user->id_area;

        
         if($id_area==32 || $id_area==453 || $id_area==437){

        $query ='SELECT
        "public".directorio."id",
        "public".directorio."cargo",
        "public".datos_personales.nombre,
        "public".datos_personales.apellido_p,
        "public".datos_personales.apellido_m
        FROM
        "public".directorio
        INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
        WHERE directorio.status=1 and directorio.id_area IN (2,3,4,5,6,7,8,9,18,24,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,71,72,79,83,114,117,420,453,437,511,512,1292,1293)'; //IN ('.$id_area.')';
    

    }else{

          $query ='SELECT
        "public".directorio."id",
        "public".directorio."cargo",
        "public".datos_personales.nombre,
        "public".datos_personales.apellido_p,
        "public".datos_personales.apellido_m
        FROM
        "public".directorio
        INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
        WHERE directorio.status=1 and directorio.id_area IN (2,3,4,5,6,7,8,9,10,18,24,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,71,72,79,83,114,117,420,453,437,511,512,1292,1293)'; //IN ('.$id_area.')';
    }

        $resultrem=Yii::app()->db->createCommand($query)->queryAll();


        $remitentes['falso'] = 'Seleccionar';

         foreach ($resultrem as $value) {
                    $remitentes[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
                }


        $this->widget('ext.widgets.select2.XSelect2', array(
        'model'=>$model,
        'attribute'=>'remitente',
        'data'=>$remitentes,
        'htmlOptions'=>array(
        'style'=>'width:600px',
        'id'=>'rem',
        
    ),
));
        ?>



       
        <?php echo $form->error($model,'remitente'); ?>
                                                            </div>

        
                                                        </div>


                                                     
       </fieldset>

                                                        <fieldset>
                                                        <legend>Informacion del Destinatario</legend>
                                                    

         <div class="form-group">
                                                            <label for="ticket-subject" class="col-sm-3 control-label">   <?php echo $form->labelEx($model,'destinatario'); ?></label>
                                                            <div class="col-sm-9">
                                                              
        <?php 

          $destinatarios = array();
        $id_area = Yii::app()->user->id_area;

        $query ='SELECT
        "public".directorio."id",
        "public".directorio."cargo",
        "public".datos_personales.nombre,
        "public".datos_personales.apellido_p,
        "public".datos_personales.apellido_m
        FROM
        "public".directorio
        INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
        WHERE "public".directorio.status = 1 and directorio.id_area IN (2,3,4,5,6,7,8,9,10,18,24,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,71,72,79,83,114,117,420,453,437,511,512,1292,1293)';

        $resultrem=Yii::app()->db->createCommand($query)->queryAll();


        $destinatarios['falso'] = 'Seleccionar';

         foreach ($resultrem as $value) {
                    $destinatarios[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
                }

      
        $this->widget('ext.widgets.select2.XSelect2', array(
        'model'=>$model,
        'attribute'=>'destinatario',
        'data'=>$destinatarios,
        'htmlOptions'=>array(
        'style'=>'width:600px',
        'id'=>'dest',
    ),
));
        ?>
        </div>
         <div class="col-sm-9">
        <?php echo $form->error($model,'destinatario'); ?>

                                                            </div>
                                                        </div>
                                                     
       </fieldset>


                                                    <fieldset>
                                                        <legend>Detalle</legend>
                                                         <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'documento'); ?></label>
                                                            <div class="col-sm-9">
                                                                
                                                                <?php echo $form->textField($model,'documento',array('id'=>'iddocto','placeholder'=>'Documento', 'class'=>"form-control")); ?>
        <?php echo $form->error($model,'documento'); ?>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'referencia'); ?></label>
                                                            <div class="col-sm-9">
                                                                
                                                                <?php echo $form->textField($model,'referencia',array('id'=>'referencia','placeholder'=>'Referencia', 'class'=>"form-control")); ?>
        <?php echo $form->error($model,'referencia'); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'tipo_docto'); ?></label>
                                                            <div class="col-sm-9">
                                                               

        <?php 

      if($id_area==6){
         $resultEjercicio = TipoDoc::model()->findAll();

      }else{
        $resultEjercicio = TipoDoc::model()->findAll('permiso=1');
      }
            
           
        
        $ejercicio = array();
        $ejercicio['false'] = 'Selecciona tipo de documento';
        foreach ($resultEjercicio as $key => $value) {
            $ejercicio[$value->id] = $value->nombre;
        }

        echo $form->dropDownList($model,'tipo_docto',$ejercicio,
        array(
                'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('documentos/tipocopia'), //url to call.
                //Style: CController::createUrl('currentController/methodToCall')
                'update'=>'#tipocopia', //selector to update
                //'data'=>'js:javascript statement' 
                //leave out the data key to pass all form values through
                ))
        ); ?>
        <?php echo $form->error($model,'tipo_docto'); ?>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'asunto'); ?></label>
                                                            <div class="col-sm-9">
                                                               
                                                                 <?php echo $form->textArea($model,'asunto',array('placeholder'=>'Descripcion del Asunto Breve...', 'class'=>"form-control", 'rows'=>4, 'cols'=>50, 'maxlength'=>300)); ?>
                                                            <?php echo $form->error($model,'asunto'); ?>
                 
                                                            </div>
                                                        </div>

                                                              <div class="form-group">
                                                            <label for="ticket-priority" class="col-sm-3 control-label"><?php echo $form->labelEx($model,'tipo_caracter'); ?></label>
                                                            <div class="col-sm-9">
                                                               

      
                        <?php echo $form->dropDownList($model, 'tipo_caracter', $caracter, array(
                        'id' => 'tipo_caracter'));?>
                        <?php echo $form->error($model, 'tipo_caracter'); ?>
                                                            </div>
                                                        </div


  <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'fecha'); ?></label>
                                                            <div class="col-sm-9">
                                                                
                                          
 <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'fecha',


                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'showAnim' => 'fold',
                                'changeMonth' => true,
                                'changeYear' => true,
                                'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                                'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                                'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                                'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                                'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                               // 'yearRange' => '2013:2014'
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:30px;width:100px;',
                                'id'=>'fecha',
                                //'class'=>'span12'
                               
                            ),
                        ));
                      
 ?>
        <?php echo $form->error($model,'fecha'); ?>
                                                            </div>
                                                        </div>


    </fieldset>

                         <fieldset>
                                                        <legend>Informacion de copias</legend>
                   <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"><?php echo $form->labelEx($model, 'copiasIds'); ?></label>
                                                            <div class="col-sm-9">
                                                                
                                          
     
        <?php
    $this->widget('ext.widgets.select2.XSelect2', array(
    'model'=>$model,
    'attribute'=>'copiasIds',
    'data'=>$destinatarios,
    'options'=>array(
        'maximumSelectionSize'=>20,
    ),
    'htmlOptions'=>array(
        'style'=>'width:700px',
        'multiple'=>'true',
        'class'=>'countries-select',
        'placeholder'=>'Descripcion del Asunto Breve...'
    ),
    'events'=>array(
        'selected'=>"js:function (element) {
            $('[data-copiasIds='+element.val+']').hide();
        }",
        'removed'=>"js:function (element) {
            $('[data-copiasIds='+element.val+']').show();
        }"
    ),
)); 

Yii::app()->clientScript->registerScript('select2interact', "
    var data=$('.countries-select').select2('val');
    $.each(data, function(index, value) {
        $('[data-country='+value+']').hide();
    });
    $('a.country').click(function(e) {
        e.preventDefault();
        var data=$('.countries-select').select2('val');
        if ($.isArray(data) && data.length >= 20) {
            alert('Nuemero maximo de copias es 20');
            return false;
        }
        var id=$(this).attr('data-country');
        $('.countries-select').val(data.concat(id)).trigger('change');
        $(this).hide();
    });
", CClientScript::POS_READY);

?>
                                                            </div>
                                                    
</div>
</fieldset>

<fieldset></fieldset>

  <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label"></label>
                                                            <div class="col-sm-6">
                                                                
                                          
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Generar' : 'Guardar',array('id'=>"btn",'class'=>"agregar btn btn-success pull-left")); ?>
                                                                                                                  
     

                                                            </div>
                                                        </div>
                                                      
     
                                                  
  </fieldset>                                                       
 
       

            <?php $this->endWidget(); ?>
                                        </div>
                                        <!-- END SUPPORT TICKET FORM --        if ($.isArray(data) && data.length >= 5) {
            alert('Maximum allowed number of countries is 5');
            return false;
        }
        var id=$(this).attr('data-country');
        $('.countries-select').val(data.concat(id)).trigger('change');
        $(this).hide();
    });
", CClientScript::POS_READY);

?>>




<div id="contenido"></div>
