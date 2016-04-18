<?php
/**
 * Resposive Multilevel Flat Menu
 *
 * @author turi
 */
class BootsMenu extends CWidget {

    public $items = array();

    /**
     * Init widget
     */
    public function init() {
        parent::init();
 
        $cs=Yii::app()->getClientScript();
        $scriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.extensions.bootstrapmenu.resources'));
 
        //$cs->registerCssFile($scriptUrl . '/bootstrap.min.css');
        //$cs->registerCssFile($scriptUrl . '/bootsmenu.css');
       // $cs->registerCssFile($scriptUrl . '/jquery.smartmenus.bootstrap.css');
    
       // $cs->registerScriptFile($scriptUrl . '/jquery-1.10.2.min.js');
       // $cs->registerScriptFile($scriptUrl . '/bootstrap.min.js');
       // $cs->registerScriptFile($scriptUrl . '/jquery.smartmenus.js');
       // $cs->registerScriptFile($scriptUrl . '/jquery.smartmenus.bootstrap.js');
 }

    public function run() {
        $items = $this->items;

        $this->render('admin', array('items' => $items));
    }

}
?>
