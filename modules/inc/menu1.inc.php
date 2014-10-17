					<ul class="menu1">
						<?php do { ?>	
							<?php if($row_menu1['tipo_link']==1) { ?>
							<li>
								<a href="index.php?mod=<?php echo $row_menu1['alias'];?>" ><?php echo $row_menu1['titulo_link']; ?></a>
								<!-- SUB MENUS -->
								
								<?php if($row_menu1['alias']=="clientes")  {?>
								<ul>
									<li><a href="index.php?mod=clientes">Clientes</a></li>
								   <li><a href="index.php?mod=testimoniales">Testimoniales</a></li>
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