<?php /* GALERIA DE FOTOS */ ?>

<div id="page">
			<div id="container">
				<h2><?php echo $row_modulo['titulo_cate']; ?> <a href="javascript:history.back()" style="font-size:22"> - <em>Regresar</em></a></h2>
				<!-- Start Advanced Gallery Html Containers -->
				<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container"></div>
				</div>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript">

                  <?php do { ?>
						<li>
							<a class="thumb" name="drop" href="mgpanel/modules/gfotos/<?php echo $row_modulo['ruta']; ?>" title="<?php echo $row_config['title_site'];?>">
								<img src="mgpanel/modules/gfotos/<?php echo $row_modulo['ruta']; ?>" alt="<?php echo $row_config['title_site'];?>" width="75" />
							</a>
							<div class="caption">
								&nbsp;
							</div>
						</li>
						 <?php } while ($row_modulo = mysql_fetch_assoc($modulo)); ?>
												


					</ul>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>