				<div>
					<div class="rmm">
					<ul>
						<?php do { ?>	
							<?php if($row_menu2['tipo_link']==1) { ?>
							<li>
								<a href="index.php?mod=<?php echo $row_menu2['alias'];?>"><?php echo $row_menu2['titulo_link']; ?></a>
							</li>
							<?php } ?>
							<?php if($row_menu2['tipo_link']==2) { ?>
							<li>
								<a href="javascript:cargarContenidos('modules/index/articulos_categoria.php?id_art_cate=<?php echo $row_menu2['id_art_cate'];?>')" onclick="document.location.href='#Link';" ><?php echo $row_menu2['titulo_link']; ?></a>
							</li>
							<?php } ?>
							<?php if($row_menu2['tipo_link']==3) { ?>
							<li>
								<a href="<?php echo $row_menu2['url_int'];?>"><?php echo $row_menu2['titulo_link']; ?></a>
							</li>
							<?php } ?>
							<?php if($row_menu2['tipo_link']==4) { ?>
							<li>
								<a href="http://<?php echo $row_menu2['url_ext'];?>" target="_blank"><?php echo $row_menu2['titulo_link']; ?></a>
							</li>
							<?php } ?>
						<?php } while ($row_menu2 = mysql_fetch_assoc($menu2)); ?>
					</ul>
					</div>
			</div>