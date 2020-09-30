
<?php include_once 'includes/templates/header.php';?>
    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Donec non tristique eros, a egestas nisi. Etiam consequat consectetur neque et rutrum. Praesent mattis felis quis felis egestas venenatis. Duis consectetur risus fringilla, faucibus libero ut, convallis urna. Mauris consequat scelerisque diam
            in mattis. Vestibulum quis sapien sit amet erat vulputate pretium ac et nisi. Praesent aliquam sed odio ut fermentum. Etiam id massa nunc. Cras erat ipsum, vulputate ac nulla quis, rutrum dapibus arcu. Sed suscipit erat urna, eu efficitur
            purus placerat ac. </p>

    </section>
    <!--Seccion-->
    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/img/bg-talleres.jpg">
               
              <source src="video/video.mp4" type="video/mp4"> 
                <source src="video/video.webm" type="video/webm">
                  <source src="video/video.ogv" type="video/ogg">
            </video>
        </div>
        <!--Contenedor video-->

         <!--Seccion de eventos-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>

                    <?php 
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = " SELECT * FROM `categoria_evento` ";
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    
                    
                    <nav class="menu-programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){?>
                            <?php 
                                $categoria_evento = $cat['cat_evento'];    
                            ?>
                            <a href="#<?php echo strtolower($categoria_evento) ?>">
                            <i class="fa <?php echo $cat['icono'] ?>"></i><?php echo $categoria_evento ?></a>
                        <?php }?>
                        
                    </nav>

                    <?php 
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM `eventos` ";
                            $sql .= " INNER JOIN `categoria_evento` ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN `invitados` ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 1 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM `eventos` ";
                            $sql .= " INNER JOIN `categoria_evento` ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN `invitados` ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 2 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM `eventos` ";
                            $sql .= " INNER JOIN `categoria_evento` ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN `invitados` ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 3 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM `eventos` ";
                            $sql .= " INNER JOIN `categoria_evento` ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN `invitados` ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 4 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM `eventos` ";
                            $sql .= " INNER JOIN `categoria_evento` ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN `invitados` ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 8 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                            
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>
                   

                    <?php $conn->multi_query($sql);?>
                    <?php do {
                        $resultado = $conn->store_result();
                        $row = $resultado->fetch_all(MYSQLI_ASSOC);?>

                    <?php $i = 0; ?>
                        <?php foreach ($row as $evento):  ?>
                            <?php if($i % 2 == 0) {?>
                            
                                <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                            <?php }?>
                                <div class="detalle-evento">
                                    <h3><?php echo $evento['nombre_evento'] ?></h3>
                                    <p><i class="far fa-clock"></i> <?php echo $evento['hora_evento']; ?></p>
                                    <p><i class="fas fa-calendar-alt"></i> <?php echo $evento['fecha_evento']; ?></p>
                                    <p><i class="fa fa-user"></i> <?php echo $evento['nombre_invitado']. " ". $evento['apellido_invitado']; ?></p>
                                </div>

                                
                                <?php if($i % 2 == 1) { ?>
                                    <a href="calendario.php" class="button float-right">Ver todos</a>
                                    </div>
                                    <!--Talleres-->
                                <?php } ?>
                           
                            <?php $i++; ?>
                        <?php endforeach;?>    
                        <?php $resultado->free(); ?>
                   <?php } while ($conn->more_results() && $conn->next_result());
                    ?>
 


                </div>
                <!--programa-evento-->
            </div>
            <!--contenedor-->
        </div>
        <!--contenido-programa-->
    </section>
    <!--.programa-->
    

    <div class="contador parallax">
        <div class="contenedor">
        
            <ul class="resumen-evento clearfix">
            
                <li>
                <?php 
                    $sql = "SELECT COUNT(invitado_id) AS invitado FROM invitados ";
                    $resultado = $conn->query($sql);
                    $invitados =  $resultado->fetch_assoc();
                ?>
                    <p class="numero"><?php echo $invitados['invitado'];?></p> Invitados</li>
                <li>
                <?php 
                    $sql = "SELECT COUNT(evento_id) AS evento FROM eventos ";
                    $resultado = $conn->query($sql);
                    $eventos =  $resultado->fetch_assoc();
                ?>
                    <p class="numero"><?php echo $eventos['evento'];?></p> Talleres</li>
                <li>
                
                    <p class="numero">3</p>Días</li>
                <li>
                <?php 
                    $sql = "SELECT COUNT(id_categoria) AS categoria FROM categoria_evento ";
                    $resultado = $conn->query($sql);
                    $categorias =  $resultado->fetch_assoc();
                ?>
                    <p class="numero"><?php echo $categorias['categoria'];?></p>Conferencias</li>
            </ul>
        </div>
    </div>
    <!--Contador parallax-->

    <?php include_once 'includes/templates/invitados.php'; ?> 

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li><i class="fas fa-check color-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check color-check"></i> Todas las conferencias</li>
                            <li class="li-margen"> <i class="fas fa-check color-check"></i>Todos los talleres</li>
                        </ul>
                        <a href="registro.php" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Todos los días</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li><i class="fas fa-check color-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check color-check"></i> Todas las conferencias</li>
                            <li class="li-margen"> <i class="fas fa-check color-check"></i>Todos los talleres</li>
                        </ul>
                        <a href="registro.php" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 días</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li><i class="fas fa-check color-check"></i> Bocadillos Gratis</li>
                            <li><i class="fas fa-check color-check"></i> Todas las conferencias</li>
                            <li class="li-margen"> <i class="fas fa-check color-check"></i>Todos los talleres</li>
                        </ul>
                        <a href="registro.php" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div id="mapa" class="mapa">

    </div>

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>
                        Ut ut orci vel mauris malesuada luctus nec vitae est. Sed eget egestas massa, ut rutrum nisl. Cras nec risus vel velit gravida malesuada sed nec mauris. Nulla lobortis convallis dolor, sit amet semper ex placerat ut. </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>
                        Ut ut orci vel mauris malesuada luctus nec vitae est. Sed eget egestas massa, ut rutrum nisl. Cras nec risus vel velit gravida malesuada sed nec mauris. Nulla lobortis convallis dolor, sit amet semper ex placerat ut. </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>
                        Ut ut orci vel mauris malesuada luctus nec vitae est. Sed eget egestas massa, ut rutrum nisl. Cras nec risus vel velit gravida malesuada sed nec mauris. Nulla lobortis convallis dolor, sit amet semper ex placerat ut. </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Testimonial-->
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Registrate al NewsLetter</p>
            <h3>GdlWebCamp</h3>
            <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
        </div>
        <!--Contenido-->
    </div>
    <!--NewsLetter-->

    <section class="seccion faltan-color">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">

                <li>
                    <p id="dias" class="numero"></p>Días</li>
                <li>
                    <p id="horas" class="numero"></p>Horas</li>
                <li>
                    <p id="minutos" class="numero"></p>Minutos</li>
                <li>
                    <p id="segundos" class="numero"></p>Segundos</li>
            </ul>
        </div>
    </section>
    
    <?php include_once 'includes/templates/footer.php';?>
   
    