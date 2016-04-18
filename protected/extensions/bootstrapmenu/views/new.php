
					<div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">

              			  <li >
              			  	<?
              			  		echo CHtml::link('Inicio',  array('/site/index/'));
              			  	?>
              			  </li>
                      <li >
                        <?
                          echo CHtml::link('¿Qué es?',  array('/site/present/'));
                        ?>
                      </li>
                        <?php
                        foreach ($items as $item) {

                        	echo CHtml::tag('li', array('class'=>"dropdown"));
	                        	echo CHtml::link($item['label'].CHtml::openTag('b',array('class'=>"caret")).CHtml::closeTag('b'), array($item['url']), array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
	                        		if (isset($item['items']) && is_array($item['items'])) {
			                        	echo CHtml::tag('ul', array('class'=>"dropdown-menu"));
					                        foreach ($item['items'] as $sub_item) {
					                        	echo CHtml::tag('li');
		                                        echo CHtml::link($sub_item['label'],  array('/site/main/'.$sub_item['url'].''));
		                                        echo CHtml::closeTag('li');
					                        }
	            				  		echo CHtml::closeTag('ul');
            				  		}
                   			 
                   			 echo CHtml::closeTag('li');
                   

                        }

                        ?>
                           
                             <li >
              			  	<?
              			  		echo CHtml::link('Apéndice',  array('/infografia/'));
              			  	?>
                        </ul>
					</div><!--/.nav-collapse -->