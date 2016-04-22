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


        var org =$('#copiasIds').val();
       if (org == null) {
              $.alert({
                                    title: 'Aviso!!!!',
                                    content: 'Debe seleccionar un destinatario!!',
                                    confirmButton: 'Aceptar'
                                     
                      });
               $('#btn').show();
               return false;
           
        }


          



        

        var len = $('#iddocto').val().length;
        if (len == 0) {
              $.alert({
                                    title: 'Aviso!!!!',
                                    content: 'Debe registrar el numero de Circular!!',
                                    confirmButton: 'Aceptar'
                                     
                      });
               $('#btn').show();
               return false;
           
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


        $resultado = Areas::model()->findAll((array(
        'condition'=>'status=1',
        'order'=>'id'
    )));
            $valores=array();
            foreach ($resultado as $key => $row) {

             $item = "$row[id]";
            
             $val= array_push($valores,$item);

                    
            }

;

$listAreas = Areas::model()->listaSimple($valores);


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
        WHERE "public".directorio.status = 1 and directorio.id_area IN ('.$listAreas.')';

        $resultrem=Yii::app()->db->createCommand($query)->queryAll();


       // $destinatarios['falso'] = 'Seleccionar';
        $destinatarios[-1] = 'Directores IEMS';
        $destinatarios[-2] = 'Subdirectores de coordinación de Plantel';
        $destinatarios[-3] = 'Subdirectores de Area';
        $destinatarios[-4] = 'Enlaces Técnicos Escolar';
        $destinatarios[-5] = 'Enlaces Técnicos Semiescolar';
        $destinatarios[-6] = 'Jefes de Servicios';
        $destinatarios[-7] = 'Jefes de Apoyo Técnico';
        $destinatarios[-8] = 'Jefes de Unidad Departamental';

         foreach ($resultrem as $value) {
                    $destinatarios[$value['id']] = "$value[nombre] $value[apellido_p] $value[apellido_m] - $value[cargo]";
                }

        //print_r($destinatarios);







        
         if($id_area==32 || $id_area==33 || $id_area==34 || $id_area==35 || $id_area==36 || $id_area==37 || $id_area==38 || $id_area==39 || $id_area==40 || $id_area==41 || $id_area==42 || $id_area==43 || $id_area==44 || $id_area==45 || $id_area==46 || $id_area==47 || $id_area==48 || $id_area==117 || $id_area==420 || $id_area==437){

        $query ='SELECT
        "public".directorio."id",
        "public".directorio."cargo",
        "public".datos_personales.nombre,
        "public".datos_personales.apellido_p,
        "public".datos_personales.apellido_m
        FROM
        "public".directorio
        INNER JOIN "public".datos_personales ON "public".directorio.id_dp = "public".datos_personales."id"
        WHERE directorio.status=1 and directorio.id_area IN ('.$id_area.')';
    

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
        WHERE directorio.status=1 and directorio.id_area IN ('.$listAreas.')'; //IN ('.$id_area.')';
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
        <?php echo $form->hiddenField($model,'destinatario',array('type'=>"hidden",'value'=>0)); ?>

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

   
        $resultEjercicio = TipoDoc::model()->findAll('permiso=2');
     
            
           
        
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
                                                        <legend>Destinatarios</legend>
                   <div class="form-group">
                                                            <label for="ticket-name" class="col-sm-3 control-label">Destinatarios Grupos y/o personas:</label>
                                                            <div class="col-sm-9">
                                                                
                                          
     
        <?php
    $this->widget('ext.widgets.select2.XSelect2', array(
    'model'=>$model,
    'attribute'=>'copiasIds',
    'data'=>$destinatarios,
    'options'=>array(
        'maximumSelectionSize'=>30,
    ),
    'htmlOptions'=>array(
        'id'=>'copiasIds',
        'style'=>'width:700px',
        'multiple'=>'true',
        'class'=>'countries-select',
        'placeholder'=>'Seleccionar grupos y/o personas...'
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
        $('[data-copiasIds='+value+']').hide();
    });
    $('a.country').click(function(e) {
        e.preventDefault();
        var data=$('.countries-select').select2('val');
        if ($.isArray(data) && data.length >= 30) {
            alert('Nuemero maximo de copias es 30');
            return false;
        }
        var id=$(this).attr('data-copiasIds');
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
