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
                            <div class="main-header">
                                <h3>Por confirmar</h3>
                                <em>Correspondencia por confirmar</em>
                            </div>
                            <div class="main-content">
                               

                            

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- WIDGET TABLE -->
                                        <div class="widget widget-table">
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'correspondencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_docto'); ?>
		<?php echo $form->textField($model,'id_docto'); ?>
		<?php echo $form->error($model,'id_docto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folio'); ?>
		<?php echo $form->textField($model,'folio'); ?>
		<?php echo $form->error($model,'folio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folio_inst'); ?>
		<?php echo $form->textField($model,'folio_inst'); ?>
		<?php echo $form->error($model,'folio_inst'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destinatario'); ?>
		<?php echo $form->textField($model,'destinatario'); ?>
		<?php echo $form->error($model,'destinatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_acuse'); ?>
		<?php echo $form->textField($model,'estado_acuse'); ?>
		<?php echo $form->error($model,'estado_acuse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_acuse'); ?>
		<?php echo $form->textField($model,'fecha_acuse'); ?>
		<?php echo $form->error($model,'fecha_acuse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caracter'); ?>
		<?php echo $form->textField($model,'caracter'); ?>
		<?php echo $form->error($model,'caracter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_rem'); ?>
		<?php echo $form->textField($model,'estado_rem'); ?>
		<?php echo $form->error($model,'estado_rem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_dest'); ?>
		<?php echo $form->textField($model,'estado_dest'); ?>
		<?php echo $form->error($model,'estado_dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_reg'); ?>
		<?php echo $form->textField($model,'fecha_reg'); ?>
		<?php echo $form->error($model,'fecha_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_mod'); ?>
		<?php echo $form->textField($model,'fecha_mod'); ?>
		<?php echo $form->error($model,'fecha_mod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_reg'); ?>
		<?php echo $form->textField($model,'user_reg'); ?>
		<?php echo $form->error($model,'user_reg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_mod'); ?>
		<?php echo $form->textField($model,'user_mod'); ?>
		<?php echo $form->error($model,'user_mod'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

                                        </div>
                                        <!-- END WIDGET TABLE -->

                                       
                                <!-- END WIDGET TICKET TABLE -->
                            </div>
                            <!-- /main-content -->
                        </div>
                        <!-- /main -->
                    </div>
                    <!-- /content-wrapper -->

<?php
/* @var $this CorrespondenciaController */
/* @var $model Correspondencia */
/* @var $form CActiveForm */
?>

