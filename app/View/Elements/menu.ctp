<?php
	$cakeDescription = __d('cake_dev', 'COVID-19');
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
    <?php if($current_user['type_user_id'] != null): ?>
    <!--navbar-->
    <ul id='nav-mobile' class='sidenav sidenav-fixed blue-grey darken-4'>
        <li>
            <div class="user-view">
                <div class="background">
                    <!--<img src="../../img/fondo.png">-->
                    <?php
                     echo $this->Html->image('gob-fondo.png');
                     ?>
                </div>
            <!--<a><img class="circle" src="../../img/user.png"></a>-->
                <a><?php echo $this->Html->image('usuario.png', array('class'=>'circle')); ?></a>
                <a><span class="white-text name">Bienvenido <?php echo $current_user['username'] ?></span></a>
                <a><span class="white-text email"><?php echo $current_user['name'].' '.$current_user['last_name'] ?></span></a>
            </div>
        </li>
        <li class='no-padding'>
            <ul class='collapsible collapsible-accordion'>
                <li class='bold'><a class='collapsible-header waves-effect waves-grey white-text'><i class='white-text left material-icons'>account_circle</i><?php echo $current_user['username'] ?></a>
                    <div class='collapsible-body grey'>
                        <ul>
                            <li class='bold'><?php echo $this->Html->link('🖊️  EDITAR USUARIO', array('controller' => 'users', 'action' => 'edit', $current_user['id'])); ?></li>
                            <li class='bold'><?php echo $this->Html->link('✖️  CERRAR SESIÓN', array('controller' => 'users', 'action' => 'logout')); ?></li>
                        </ul>
                    </div>
                </li>
                <li class='divider'></li>

                <li class='bold'><a href='<?php echo $this->Html->url(array('controller'=>'pages','action'=>'home')) ?>' class='collapsible-header waves-effect waves-grey white-text'><i class='white-text left material-icons'>home</i>Inicio</a></li>
                
                <?php if($current_user['type_user_id'] == 1): ?>
                <li class='bold'><a class='collapsible-header waves-effect waves-grey white-text'><i class='white-text left material-icons'>group</i>Usuarios</a>
                    <div class='collapsible-body grey'>
                        <ul>
                            <li class='bold'><?php echo $this->Form->postButton('<i class="left material-icons">person_outline</i>usuarios', ['controller' => 'users', 'action' => 'index'], array('class'=>'btn-flat waves-effect waves-light')); ?></li>
                            <li class='bold'><?php echo $this->Form->postButton('<i class="left material-icons">people_outline</i>tipos', ['controller' => 'type_users', 'action' => 'index'], array('class'=>'btn-flat waves-effect waves-light')); ?></li>
                        </ul>
                    </div>
                </li>
                <?php endif ?>

                <li class='bold'><a class='collapsible-header waves-effect waves-grey white-text'><i class='white-text left material-icons'>medical_services</i>Resumen médico</a>
                    <div class='collapsible-body grey'>
                        <ul>
                            <li class='bold'><?php echo $this->Form->postButton('<i class="left material-icons">healing</i>Pacientes', ['controller' => 'patients', 'action' => 'index'], array('class'=>'btn-flat waves-effect waves-light')); ?></li>
                            <li class='bold'><?php echo $this->Form->postButton('<i class="left material-icons">description</i>Pronósticos', ['controller' => 'forecasts', 'action' => 'index'], array('class'=>'btn-flat waves-effect waves-light')); ?></li>
                        </ul>
                    </div>
                </li>

                <li class='bold'><a class='collapsible-header waves-effect waves-grey white-text'><i class='white-text left material-icons'>language</i>Comunidad</a>
                    <div class='collapsible-body grey'>
                        <ul>
                            <li class='bold'><?php echo $this->Form->postButton('<i class="left material-icons">feedback</i>Estados', ['controller' => 'states', 'action' => 'index'], array('class'=>'btn-flat waves-effect waves-light')); ?></li>
                            <li class='bold'><?php echo $this->Form->postButton('<i class="left material-icons">description</i>Recomendaciones', ['controller' => 'recommendations', 'action' => 'index'], array('class'=>'btn-flat waves-effect waves-light')); ?></li>
                        </ul>
                    </div>
                </li>
            <!--espacios-->
            <!--<li><a class="grey-text"></a></li>-->
                <!--
                <div class="divider"></div>-->
                <footer style="position:fixed; bottom: 55px; width:100%;">
                    <div class="divider"></div>
                    <li><a class="grey-text" href="#"><?php print('Copyright <span>©'.date(' Y ').'Control COVID-19</span>') ?></a></li>
                </footer>
            </ul>
        </li>
    </ul> 

    <div class='navbar-fixed'>
        <nav>
            <div class='nav-wrapper row col l11 s12 push-l3 blue-grey darken-4'>
                <a class='brand-logo center blue-grey-text text-lighten-3'>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $cakeDescription ?></a>
                <a href='#' data-target='nav-mobile' class='top-nav sidenav-trigger full hide-on-large-only'><i class='blue-grey-text text-lighten-3 material-icons'>menu</i></a>
            </div>
        </nav>
    </div>
    <!--fin navbar-->
    <?php endif ?>