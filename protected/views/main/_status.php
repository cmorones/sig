 <div class="span2"><span class="label label-success">Activo</span></div>
<?php /*if (Permisos::model()->find("id_perfil=:id_perfil AND id_menu=:id_menu", array(":id_menu" => $id_menu, ":id_persona" => $id_persona))) { ?>
    <div class="span2"><?php echo CHtml::ajaxLink('Desactivar', CController::createUrl('/main/activar', array("id_menu" => $id_menu, "id_persona" => $id_persona)), array('update' => '#permiso' . $id_menu . $id_persona), array("id" => "D". time() . $id_menu . $id_persona)); ?></div>
    <div class="span2"><span class="label label-success">Activo</span></div>
<?php } else { ?>
    <div class="span2"><?php echo CHtml::ajaxLink('Activar', CController::createUrl('/main/activar', array("id_menu" => $id_menu, "id_persona" => $id_persona)), array('update' => '#permiso' . $id_menu . $id_persona), array("id" => "A". time() . $id_menu . $id_persona)); ?></div>
    <div class="span2"><span class="label label-important">Inactivo</span></div>
<?php } */?>