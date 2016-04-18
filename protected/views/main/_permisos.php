
<?php

$sample_text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
?>
<div class="page-header">
    <h3>Privilegios</h3>
</div>

<div class="row-fluid">

  <div class="span8">
  
  <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Privilegios del Sistema",
        ));
        
    ?>
    <div class="accordion" id="accordion2">
      <?php foreach ($menus_principales as $menu_principal) { ?>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $menu_principal->id; ?>">
            <?php echo $menu_principal->label; ?>
          </a>
        </div>
        <div id="<?php echo $menu_principal->id; ?>" class="accordion-body collapse">
          <div class="accordion-inner">
                        <div class="row-fluid">
                            <div class="span4"><?php echo $menu_principal->label; ?></div>
                            <div id="permiso<?php echo $menu_principal->id?>">
                                <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_principal->id), false, false); ?>
                            </div>
                        </div>
                          <?php $menus_nivel1 = Menu::model()->findAll('nivel=1  AND parent_id= ' . $menu_principal->id . '  ORDER BY position'); ?>
                        <?php foreach ($menus_nivel1 as $menu_nivel1) { ?>
                            <div class="row-fluid">
                                <div class="span1"><i class="icon-chevron-right pull-right"></i></div>
                                <div class="span4"><?php echo $menu_nivel1->label; ?></div>
                                <div id="permiso<?php echo $menu_nivel1->id; ?>">
                                    <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel1->id, 'id_persona'=>$id_persona), false, false); ?>
                                </div>
                            </div>
                        <?php $menus_nivel2 = Menu::model()->findAll('nivel=2  AND parent_id= ' . $menu_nivel1->id . '  ORDER BY position'); ?>
                            <?php foreach ($menus_nivel2 as $menu_nivel2) { ?>
                                <div class="row-fluid">
                                    <div class="span2"><i class="icon-chevron-right pull-right"></i></div>
                                    <div class="span4"><?php echo $menu_nivel2->label; ?></div>
                                    <div id="permiso<?php echo $menu_nivel2->id . $id_persona; ?>">
                                        <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel2->id, 'id_persona'=>$id_persona), false, false); ?>
                                    </div>
                                </div>
                         <?php } ?>
                        <?php } ?>
          </div>
        </div>
      </div>
        <?php } ?>

    </div>
    
    
    <?php $this->endWidget();?>
  </div>
</div>
