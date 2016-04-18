
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/">Inicio</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Producción<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/produccion/indicador1.html">Valor agregado censal bruto</a>
                                    </li>
                                    <li>
                                        <a href="/produccion/indicador2.html">Participación en el PIB</a>
                                    </li>
                                    <li>
                                        <a href="/produccion/indicador2.html">PIB per capita</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/">Precios</a>
                            </li>
                            <li>
                                <a href="/">Empleo</a>
                            </li>
                            <li>
                                <a href="/">Salarios e Ingresos</a>
                            </li>
                            <li>
                                <a href="/">Empresas</a>
                            </li>
                            <li>
                                <a href="/">Inversión</a>
                            </li>
                            <li>
                                <a href="/">Finanzas</a>
                            </li>
                            <li>
                                <a href="/">Comercio</a>
                            </li>
                            <li>
                                <a href="/">Turismo</a>
                            </li>
                            <li>
                                <a href="/">Apéndice</a>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
              
<?php

    echo CHtml::tag('li'); //Primer Nivel
        echo CHtml::link('Nivel 1'.CHtml::openTag('b',array('class'=>"caret")).CHtml::closeTag('b'), array($item['url']), array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
            echo CHtml::tag('ul', array('class'=>"dropdown-menu multi-level"));
                echo CHtml::tag('li');
                    echo CHtml::link('Nivel2_1', array('/site/main/10'));
                echo CHtml::closeTag('li');
                echo CHtml::tag('li');
                     echo CHtml::link('Nivel2_2', array($sub_item['url']));
                echo CHtml::closeTag('li');
                
                echo CHtml::tag('li', array('class'=>"dropdown-submenu"));
                     //menu con hijos
                    echo CHtml::link('Nivel2-3 con hijos', '#', array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
                    echo CHtml::tag('ul', array('class'=>"dropdown-menu"));
                        echo CHtml::tag('li');
                        echo CHtml::link('Nivel3-1', array($sub_item['url']));
                        echo CHtml::closeTag('li');
                            echo CHtml::tag('li', array('class'=>"dropdown-submenu"));
                                echo CHtml::link('Nivel3-2 con hijos', '#', array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
                                echo CHtml::tag('ul', array('class'=>"dropdown-menu"));
                                    echo CHtml::tag('li', array('class'=>"dropdown-submenu"));
                                      echo CHtml::link('Participación en el PIB3', '#', array('class'=>"dropdown-toggle", 'data-toggle'=>'dropdown')); 
                                        echo CHtml::tag('ul', array('class'=>"dropdown-menu"));
                                              echo CHtml::tag('li');
                                                 echo CHtml::link($sub_item['label'], array($sub_item['url']));
                                              echo CHtml::closeTag('li');
                                        echo CHtml::closeTag('ul');
                                    echo CHtml::closeTag('li');
                                echo CHtml::closeTag('ul');
                            echo CHtml::closeTag('li');
                    echo CHtml::closeTag('ul');
                echo CHtml::closeTag('li');
            echo CHtml::closeTag('ul');
    echo CHtml::closeTag('li'); //Primer Nivel

    ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
