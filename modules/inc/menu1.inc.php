					<ul class="menu1">
				  <li><a href="index.php" ><img src="images/site/home.png" alt="" style="vertical-align:middle;" ></a></li>
						<?php do { ?>	
							<?php if($row_menu1['tipo_link']==1) { ?>
							<li>
								<a href="index.php?mod=<?php echo $row_menu1['alias'];?>" ><?php echo $row_menu1['titulo_link']; ?></a>
								<!-- SUB MENUS -->
								<?php if($row_menu1['alias']=="nosotros")  {?>
								<ul>
									<li><a href="index.php?mod=servicio">Servicio</a></li>
								   <li><a href="index.php?mod=filosofia">Filosofia</a></li>
								   <li><a href="index.php?mod=directivos">Directivos</a></li>
								</ul>
								<?php } ?>
								<?php if($row_menu1['alias']=="clientes")  {?>
								<ul>
									<li><a href="index.php?mod=clientes">Clientes</a></li>
								   <li><a href="index.php?mod=testimoniales">Testimoniales</a></li>
								</ul>
								<?php } ?>
								<?php if($row_menu1['alias']=="servicios")  {?>
								<ul>
									<li><a href="index.php?mod=marketing-360">Marketing 360</a></li>
								   <li><a href="index.php?mod=comunicacion-corporativa">Comunicaci&oacute;n Corporativa</a></li>
								   <li><a href="index.php?mod=redes-sociales">Redes Sociales</a></li>
								   <li><a href="index.php?mod=imagen-corporativa">Imagen Corporativa</a></li>
								   <li><a href="index.php?mod=eventos-y-btl">Eventos y BTL</a></li>
								   <li><a href="index.php?mod=creatividad-y-publicidad">Creatividad y publicidad</a></li>
								   <li><a href="index.php?mod=trade-marketing">Trade Marketing</a></li>
								   <li><a href="index.php?mod=inteligencia-de-mercado">Inteligencia de Mercado</a></li>
								</ul>
								<?php } ?>
							</li>
							<?php } ?>
							<?php if($row_menu1['tipo_link']==2) { ?>
							<li>
								<a href="javascript:cargarContenidos('modules/index/articulos_categoria.php?id_art_cate=<?php echo $row_menu1['id_art_cate'];?>')" onclick="document.location.href='#Link';" ><?php echo $row_menu1['titulo_link']; ?></a>
							</li>
							<?php } ?>
							<?php if($row_menu1['tipo_link']==3) { ?>
							<li>
								<a href="<?php echo $row_menu1['url_int'];?>"><?php echo $row_menu1['titulo_link']; ?></a>
							</li>
							<?php } ?>
							<?php if($row_menu1['tipo_link']==4) { ?>
							<li>
								<a href="http://<?php echo $row_menu1['url_ext'];?>" target="_blank"><?php echo $row_menu1['titulo_link']; ?></a>
							</li>
							<?php } ?>
						
						<?php  } while ($row_menu1 = mysql_fetch_assoc($menu1)); ?>
						
					</ul>
