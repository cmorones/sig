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
Yii::app()->clientScript->registerScript('btn', "
     
    var resultado;
   



", CClientScript::POS_READY);

Yii::app()->clientScript->registerScript('copias', "

var ccp = [];



");
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

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documentos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>true,
        ),

)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'remitente'); ?>
		<?php 
 

 	//	$baseUrl2 = YiiBase::getPathOfAlias("webroot");
    //    $menus= $baseUrl2.'/static/directorio.json';


      //  $datos = file_get_contents($menus);
        
    //    $destinatarios = json_decode($datos, true);
	    

        $remitentes = array();
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
        WHERE "public".directorio.status = 38 and directorio.id_area IN ('.$id_area.')';

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


		<div class="row">
        <?php echo $form->labelEx($model,'destinatario'); ?>
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
        WHERE "public".directorio.status = 38 and directorio.id_area IN (2,3,4,5,6,7,8,9,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55)';

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
        <?php echo $form->error($model,'destinatario'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'documento'); ?>
		<?echo $model->documento; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'referencia'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'asunto'); ?>
		<?php echo $form->textArea($model,'asunto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>




		<div class="row">
				<?php echo $form->labelEx($model, 'tipo_caracter'); ?>
						<?php echo $form->dropDownList($model, 'tipo_caracter', $caracter, array(
						'id' => 'tipo_caracter'));?>
 						<?php echo $form->error($model, 'tipo_caracter'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		
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


		<div class="row">
		<?php echo $form->labelEx($model,'copiasIds'); ?>
		<?php
	$this->widget('ext.widgets.select2.XSelect2', array(
    'model'=>$model,
    'attribute'=>'copiasIds',
    'data'=>$destinatarios,
    'options'=>array(
        'maximumSelectionSize'=>5,
    ),
    'htmlOptions'=>array(
        'style'=>'width:700px',
        'multiple'=>'true',
        'class'=>'countries-select'
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
        if ($.isArray(data) && data.length >= 5) {
            alert('Maximum allowed number of countries is 5');
            return false;
        }
        var id=$(this).attr('data-country');
        $('.countries-select').val(data.concat(id)).trigger('change');
        $(this).hide();
    });
", CClientScript::POS_READY);

?>
	</div>

<div class="row">
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Generar' : 'Guardar',array('id'=>"btn",'class'=>"agregar btn btn-success pull-left")); ?>
	
    </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<div id="contenido"></div>