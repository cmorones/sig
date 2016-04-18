<div class="navbar navbar-default " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          
        </div>
        <div class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav">
                
                
                    <?php
echo CHtml::tag('li',array('class'=>'active'));
    echo CHtml::link('Inicio', array('/site/index'));
echo CHtml::closeTag('li');
?>

          
             <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nivel 1 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Nivel 2</a></li>
                        <li><a href="#">Nivel 2</a></li>
                        <li><a href="#">Nivel 2</a></li>
                        
                        <li><a href="#">Nivel 2</a></li>
                        
                        <li><a href="#">Nivel 2</a></li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nivel 2 con hijos</a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="#">Nivel 3</a></li>
                                <li><a href="#">Nivel 3</a></li>
                                
                                <li><a href="#">Nivel 3</a></li>
                                
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nivel 3 con hijos</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nivel4 con Hijos</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Nivel 5</a></li>
                                                <li><a href="#">Nivel 5</a></li>
                                                <li><a href="#">Nivel 5</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Nivel 5</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Nivel 5</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <?php

foreach ($items as $item) {

    echo CHtml::tag('li'); //Primer Nivel
        echo CHtml::link($item['label'].CHtml::openTag('b',array('class'=>"caret")).CHtml::closeTag('b'), array($item['url']), array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
        if (isset($item['items']) && is_array($item['items'])){
                echo CHtml::tag('ul', array('class'=>"dropdown-menu multi-level"));
                    foreach ($item['items'] as $sub_item) {
                        echo CHtml::tag('li');
                        echo CHtml::link($sub_item['label'], array('/site/main/'.$sub_item['url']));
                        if (isset($sub_item['items']) && is_array($sub_item['sub_item'])){
                               
                                    echo CHtml::tag('li', array('class'=>"dropdown-submenu"));
                                        foreach ($sub_item['items'] as $tercer_item) {
                                                echo CHtml::link($tercer_item['label'], '#', array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
                                                echo CHtml::tag('ul', array('class'=>"dropdown-menu"));
                                            
                                                          echo CHtml::tag('li');
                                                          echo CHtml::link($tercer_item['label'], array($tercer_item['url']));
                                                         echo CHtml::closeTag('li');
                                                    
                                                echo CHtml::closeTag('ul');
                                      }
                                    echo CHtml::closeTag('li');
                                


                        }






                        echo CHtml::closeTag('li');
                        }
   
                echo CHtml::closeTag('ul');
            }
                 
    echo CHtml::closeTag('li'); //Primer Nivel
}

                         //Aqui va el segundo menu
                    ?>
          
        
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

