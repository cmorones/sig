<div class="navbar navbar-default " role="navigation">
<div class="container">
    <div class="row">

    
     
        <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                Dropdown <span class="caret"></span>
            </a>
           <?php
        foreach ($items as $item) {
            //primer nivel
            echo CHtml::tag('li', array('class' => 'dropdown'));
            echo CHtml::link($item['label'].CHtml::openTag('span',array('class'=>"caret")).CHtml::closeTag('span'), $item['url'], array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown', 'role'=>"button", 'aria-expanded'=>"true")); 
            
            //segundo nivel
            if (isset($item['items']) && is_array($item['items'])) {
                echo CHtml::tag('ul', array('class'=>"dropdown-menu multi-level", 'role'=>"menu", 'aria-labelledby'=>"dropdownMenu"));
                foreach ($item['items'] as $sub_item) {
                   
                    echo CHtml::tag('li');
                    echo CHtml::link($sub_item['label'], $sub_item['url']);

                         // third level
                    if (isset($sub_item['items']) && is_array($sub_item['items'])) {
                         echo CHtml::tag('ul', array('class'=>"dropdown", 'role'=>"menu", 'aria-labelledby'=>"dropdownMenu"));
                

                        foreach ($sub_item['items'] as $third_sub_item) {
                            if (isset($third_sub_item['visible']) && !$third_sub_item['visible'])
                                continue;

                            echo CHtml::tag('li');
                            echo CHtml::link($third_sub_item['label'], $third_sub_item['url']);

                            echo CHtml::closeTag('li');
                        }

                        echo CHtml::closeTag('ul');
                    }


                     echo CHtml::closeTag('li');
                }

                echo CHtml::closeTag('ul');
            }

            echo CHtml::closeTag('li');
        }

          



              ?>
        </div>




    </div>
</div>
</div>
<?php
/*
<div class="navbar navbar-default " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">
           
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>

           <?php
        foreach ($items as $item) {
            //primer nivel
            echo CHtml::tag('li', array('class' => 'dropdown'));
            echo CHtml::link($item['label'].CHtml::openTag('span',array('class'=>"caret")).CHtml::closeTag('span'), $item['url'], array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown', 'role'=>"button", 'aria-expanded'=>"true")); 
            
            //segundo nivel
            if (isset($item['items']) && is_array($item['items'])) {
                echo CHtml::tag('ul', array('class'=>"dropdown-menu multi-level", 'role'=>"menu", 'aria-labelledby'=>"dropdownMenu"));
                foreach ($item['items'] as $sub_item) {
                   
                    echo CHtml::tag('li');
                    echo CHtml::link($sub_item['label'], $sub_item['url']);

                         // third level
                    if (isset($sub_item['items']) && is_array($sub_item['items'])) {
                         echo CHtml::tag('ul', array('class'=>"dropdown", 'role'=>"menu", 'aria-labelledby'=>"dropdownMenu"));
                

                        foreach ($sub_item['items'] as $third_sub_item) {
                            if (isset($third_sub_item['visible']) && !$third_sub_item['visible'])
                                continue;

                            echo CHtml::tag('li');
                            echo CHtml::link($third_sub_item['label'], $third_sub_item['url']);

                            echo CHtml::closeTag('li');
                        }

                        echo CHtml::closeTag('ul');
                    }


                     echo CHtml::closeTag('li');
                }

                echo CHtml::closeTag('ul');
            }

            echo CHtml::closeTag('li');
        }

          



              ?>

              </div>

</div>

</div>

*/

?>
            

           


