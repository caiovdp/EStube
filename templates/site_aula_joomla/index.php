<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>

<jdoc:include type="head" />

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/reset.css" media="all" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/960.css" media="all" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" media="all" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/basico_joomla.css" media="all" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/estube.css" media="all" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script>
function slideSwitch() {
    var $active = $('#slideshow img.active');

	$active.addClass('last-active');
    var $next =  $active.next().length ? $active.next() : $('#slideshow img:first');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
	setInterval( "slideSwitch()", 5000 );
});

</script>

</head>

<body>

<?php 

if($this->countModules('right')) { 
  $centro = "centro-2";
}else{
  $centro = "centro";
}
?>

<div class="container_16" id="total">
	<div id="topo">
		<div id="logo" class="grid_11">
			<a href="<?php echo $this->baseurl ?>" title="Portal do Joomla Rio de Janeiro">
			      <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/estube.jpg" class="grid_5" alt="Estube" title="Estube" />
			</a>
		</div>
		
		<div id="sistema_busca" class="grid_5">
			<jdoc:include type="modules" name="user1" style="xhtml" />
		</div>
		<?php /* 
		<div id="menu_topo" class="grid_10">
			<jdoc:include type="modules" name="user2" style="xhtml" />
		</div>*/
		?>
	</div>
	
	<div class="clear"></div>
	
	<?php //banner ?>
	<?php if($this->countModules('banner')) { ?>
		
		<div id="banner">
			
			<jdoc:include type="modules" name="banner" style="xhtml" />
			
		</div><!--Final do Banner-->
		
	<?php }; ?>
	
	<div class="clear">&nbsp;</div><!--Separador de linha-->
	
	<div id="conteudo_total">
		<div class="border-top">
			<div class="top-border-left">
			</div>
			<div class="top-border-right">
			</div>
		</div>
		<div class="esquerda">
			<?php if($this->countModules('institucional')) { ?>
				<jdoc:include type="modules" name="institucional" style="xhtml" />
			<?php } ?><!--Final da coluna esquerda-->
		</div>
		<div class="<?PHP echo $centro; ?>">
		
			<?php if($this->countModules('banner_630')) { ?>
				<div id="slideshow">
					<jdoc:include type="modules" name="banner_630" style="xhtml" />
				</div>
			<?php } ?><!--Final da coluna esquerda-->
			<?php if($this->countModules('banner_300_1')) { ?>
				<div class="banner_300_1">
					<jdoc:include type="modules" name="banner_300_1" style="xhtml" />
				</div>
			<?php } ?>
			
			<?php if($this->countModules('banner_300_2')) { ?>
				<div class="banner_300_2">
					<jdoc:include type="modules" name="banner_300_2" style="xhtml" />
				</div>
				<div class="clear"></div>
			<?php } ?>
			<!--jdoc:include type="modules" name="top" style="xhtml" /-->
			<jdoc:include type="component" />
			<!--jdoc:include type="modules" name="user3" style="xhtml" /-->
			<div class="clear"></div>
		</div>
		<?php if($this->countModules('right')) { ?>
			<div class="direita">
				<jdoc:include type="modules" name="right" style="xhtml" />
			</div>
		<?php } ?>
		<div class="border-button">
			<div class="button-border-left">
			</div>
			<div class="button-border-right">
			</div>
		</div>
		<div class="clear"></div><!--Separador de linha-->
		
	</div>
</div>

<?php 
	//rodape
?>
<div id="footer">
<div class="container_16">
	<div>
		<div>
			<jdoc:include type="modules" name="footer" style="xhtml" />
		</div>
		<div class="clear">&nbsp;</div>
	</div>
</div>
</div>
</body>
</html>
