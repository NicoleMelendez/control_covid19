<nav class="nav-extended blue-grey darken-4">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Control COVID-19</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
            </ul>
            -->
        </div>
        <div class="nav-content blue-grey darken-2 hide-on-med-and-down">
            <div class="row container">
                <ul class="tabs tabs-transparent col m9 offset-m2 offset-l2">
                    <li class="tab"><a class="active" href="#inicio">Inicio</a></li>
                    <li class="tab"><a href="#comunicados">Decretos y comunicados</a></li>
                    <li class="tab"><a href="#sanciones">Sanciones</a></li>
                    <li class="tab"><a href="#consejos">Consejos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--
    <ul class="sidenav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
    </ul>
    -->
    <ul class="sidenav" id="mobile-demo">
        <li class="tab"><a class="active" href="#inicio">Inicio</a></li>
        <li class="tab"><a href="#comunicados">Decretos y comunicados</a></li>
        <li class="tab"><a href="#sanciones">Sanciones</a></li>
        <li class="tab"><a href="#consejos">Consejos</a></li>
    </ul>

    <!--home-->
    <div id="inicio" class="col s12 m10">
        <div class="row container">
            <br><br>
            <div class="col s12 m3 offset-m2">
                <div id="ChartGender" style="width: 380px; height: 650px;"></div>
            </div>
            <div class="col s12 m4 offset-m2">
                <h6 class="grey-text text-darken-1 center">&nbsp; &nbsp; &nbsp; &nbsp;CASOS CONFIRMADOS POR ORIGEN</h6>
                <div id="ChartOrigin" style="width: 511px; height: 315px;"></div>
            </div>
            <div class=" col s12 m4 offset-m2">
                <h6 class="grey-text text-darken-1 center">&nbsp; &nbsp; &nbsp; &nbsp;PRONÓSTICOS DE LOS PACIENTES</h6>
                <div id="ChartForecasts" style="width: 511px; height: 315px;"></div>
            </div>  
            <div class="col s12 m3 offset-m1">
                <h6 class="grey-text text-darken-1 center">&nbsp; &nbsp; &nbsp; &nbsp;CASOS CONFIRMADOS POR ESTADO</h6>
                <div id="ChartStates" style="width: 511px; height: 350px;"></div>
            </div>
            <div class=" col s12 m5 offset-m3">
                <h6 class="grey-text text-darken-1 center">&nbsp; &nbsp; &nbsp; &nbsp;CASOS INFECTADOS DE LOS ULTMOS 2 MESES EN CENTROAMERICA</h6>
                <div id="ChartPrueba2" style="width: 750px; height: 500px;"></div>
            </div>
          

            
           <div class=" col s12 m5 offset-m2">
                <div id="ChartAges" style="width: 511px; height: 350px;"></div>
            </div> 

            <div class=" col s12 m12 offset-m2">
                <div id="lineChartdepartments" style="width: 1000px; height: 600px;"></div>
            </div> 


            <!-- AQUI ESTAN LAS GRAFICAS QUE YO AGREGUE -->
            <div class=" col s12 m4 offset-m2">
            <h6 class="grey-text text-darken-1 center">MUERTES ASINTOMATICOS EN 1 AÑO</h6>
            <div id="MAsintomaticos" style="width: 510px; height: 500px;"></div>
            </div> 


            <div class=" col s12 m3 offset-m2">
            <center><h6 class="grey-text text-darken-1 center">NUEVOS CASOS ASINTOMATICOS EN 1 AÑO</h6></center>
            <div id="cifras" style="width: 550px; height: 500px;"></div>
            </div> 

            <div class=" col s12 m8 offset-m3">
                <h6 class="grey-text text-darken-1 center">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;VACUNADOS EN LOS ULTIMOS 6 MESES</h6>
              <div id="vacunados" style="width: 900px; height: 500px;"></div> 
            </div>

            
            <div class=" col s12 m4 offset-m3">
                <h6 class="grey-text text-darken-1 center">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</h6>
              <div id="Deceso" style="width: 900px; height: 500px;"></div> 
            </div>


    


            
           
            

        </div>
    </div>




    <!--end home-->

    <?php 
        $con_public = mysqli_connect("localhost","root","","control_covid19"); 
        $sql = "SELECT * FROM recommendations";
        ?>

    <!--decretos-->
    <div id="comunicados" class="row">
        <div class="">
        <br><br>
        <?php 
            $result = mysqli_query($con_public,$sql); 
            while($row = mysqli_fetch_assoc($result))
            {?>
                <div class="col s12 m4 offset-m1">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <?php echo $this->Html->image('decreto.jpg', array('class'=>'activator')); ?>
                        </div>
                        <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><p class="truncate"><?php echo $row['communique']; ?></p><i class="material-icons right">more_vert</i></span>
                        <p class="blue-text">Decretos y comunicados</p>
                        </div>
                        <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Comunicado<i class="material-icons right">close</i></span>
                        <p><?php echo $row['communique']; ?></p>
                        </div>
                    </div>
                </div>   
            <?php 
            } ?>
        </div>
    </div>
    <!--end decretos-->

    <!--sanciones-->
    <div id="sanciones" class="row">
        <div class="">
        <br><br>
        <?php 
            $result = mysqli_query($con_public,$sql); 
            while($row = mysqli_fetch_assoc($result))
            {?>
                <div class="col s12 m4 offset-m1">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <?php echo $this->Html->image('sanciones.png', array('class'=>'activator')); ?>
                        </div>
                        <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><p class="truncate"><?php echo $row['sanction']; ?></p><i class="material-icons right">more_vert</i></span>
                        <p class="blue-text">Sanciones</p>
                        </div>
                        <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Sanciones<i class="material-icons right">close</i></span>
                        <p><?php echo $row['sanction']; ?></p>
                        </div>
                    </div>
                </div>   
            <?php 
            } ?>
        </div>
    </div>
    <!--end sanciones-->

    <!--consejos-->
    <div id="consejos" class="row">
        <div class="">
        <br><br>
        <?php 
            $result = mysqli_query($con_public,$sql); 
            while($row = mysqli_fetch_assoc($result))
            {?>
                <div class="col s12 m10 offset-m1">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                        <span class="card-title">Consejo</span>
                        <p><?php echo $row['advice']; ?></p>
                        </div>
                    </div>
                </div> 
            <?php 
            } ?>
        </div>
    </div>
    <!--end consejos-->


   